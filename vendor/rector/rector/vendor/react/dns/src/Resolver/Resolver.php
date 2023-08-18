<?php

namespace RectorPrefix202308\React\Dns\Resolver;

use RectorPrefix202308\React\Dns\Model\Message;
use RectorPrefix202308\React\Dns\Query\ExecutorInterface;
use RectorPrefix202308\React\Dns\Query\Query;
use RectorPrefix202308\React\Dns\RecordNotFoundException;
/**
 * @see ResolverInterface for the base interface
 */
final readonly class Resolver implements ResolverInterface
{
    public function __construct(private ExecutorInterface $executor)
    {
    }
    public function resolve($domain)
    {
        return $this->resolveAll($domain, Message::TYPE_A)->then(fn(array $ips) => $ips[\array_rand($ips)]);
    }
    public function resolveAll($domain, $type)
    {
        $query = new Query($domain, $type, Message::CLASS_IN);
        $that = $this;
        return $this->executor->query($query)->then(fn(Message $response) => $that->extractValues($query, $response));
    }
    /**
     * [Internal] extract all resource record values from response for this query
     *
     * @return array
     * @throws RecordNotFoundException when response indicates an error or contains no data
     * @internal
     */
    public function extractValues(Query $query, Message $response)
    {
        // reject if response code indicates this is an error response message
        $code = $response->rcode;
        if ($code !== Message::RCODE_OK) {
            $message = match ($code) {
                Message::RCODE_FORMAT_ERROR => 'Format Error',
                Message::RCODE_SERVER_FAILURE => 'Server Failure',
                Message::RCODE_NAME_ERROR => 'Non-Existent Domain / NXDOMAIN',
                Message::RCODE_NOT_IMPLEMENTED => 'Not Implemented',
                Message::RCODE_REFUSED => 'Refused',
                default => 'Unknown error response code ' . $code,
            };
            throw new RecordNotFoundException('DNS query for ' . $query->describe() . ' returned an error response (' . $message . ')', $code);
        }
        $answers = $response->answers;
        $addresses = $this->valuesByNameAndType($answers, $query->name, $query->type);
        // reject if we did not receive a valid answer (domain is valid, but no record for this type could be found)
        if (0 === \count($addresses)) {
            throw new RecordNotFoundException('DNS query for ' . $query->describe() . ' did not return a valid answer (NOERROR / NODATA)');
        }
        return \array_values($addresses);
    }
    /**
     * @param \React\Dns\Model\Record[] $answers
     * @param string                    $name
     * @param int                       $type
     * @return array
     */
    private function valuesByNameAndType(array $answers, $name, $type)
    {
        // return all record values for this name and type (if any)
        $named = $this->filterByName($answers, $name);
        $records = $this->filterByType($named, $type);
        if ($records) {
            return $this->mapRecordData($records);
        }
        // no matching records found? check if there are any matching CNAMEs instead
        $cnameRecords = $this->filterByType($named, Message::TYPE_CNAME);
        if ($cnameRecords) {
            $cnames = $this->mapRecordData($cnameRecords);
            foreach ($cnames as $cname) {
                $records = \array_merge($records, $this->valuesByNameAndType($answers, $cname, $type));
            }
        }
        return $records;
    }
    private function filterByName(array $answers, $name)
    {
        return $this->filterByField($answers, 'name', $name);
    }
    private function filterByType(array $answers, $type)
    {
        return $this->filterByField($answers, 'type', $type);
    }
    private function filterByField(array $answers, $field, $value)
    {
        $value = \strtolower((string) $value);
        return \array_filter($answers, fn($answer) => $value === \strtolower((string) $answer->{$field}));
    }
    private function mapRecordData(array $records)
    {
        return \array_map(fn($record) => $record->data, $records);
    }
}
