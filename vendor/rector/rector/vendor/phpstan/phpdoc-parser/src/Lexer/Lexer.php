<?php

declare (strict_types=1);
namespace PHPStan\PhpDocParser\Lexer;

use function implode;
use function preg_match_all;
use const PREG_SET_ORDER;
/**
 * Implementation based on Nette Tokenizer (New BSD License; https://github.com/nette/tokenizer)
 */
class Lexer
{
    final public const TOKEN_REFERENCE = 0;
    final public const TOKEN_UNION = 1;
    final public const TOKEN_INTERSECTION = 2;
    final public const TOKEN_NULLABLE = 3;
    final public const TOKEN_OPEN_PARENTHESES = 4;
    final public const TOKEN_CLOSE_PARENTHESES = 5;
    final public const TOKEN_OPEN_ANGLE_BRACKET = 6;
    final public const TOKEN_CLOSE_ANGLE_BRACKET = 7;
    final public const TOKEN_OPEN_SQUARE_BRACKET = 8;
    final public const TOKEN_CLOSE_SQUARE_BRACKET = 9;
    final public const TOKEN_COMMA = 10;
    final public const TOKEN_VARIADIC = 11;
    final public const TOKEN_DOUBLE_COLON = 12;
    final public const TOKEN_DOUBLE_ARROW = 13;
    final public const TOKEN_EQUAL = 14;
    final public const TOKEN_OPEN_PHPDOC = 15;
    final public const TOKEN_CLOSE_PHPDOC = 16;
    final public const TOKEN_PHPDOC_TAG = 17;
    final public const TOKEN_DOCTRINE_TAG = 18;
    final public const TOKEN_FLOAT = 19;
    final public const TOKEN_INTEGER = 20;
    final public const TOKEN_SINGLE_QUOTED_STRING = 21;
    final public const TOKEN_DOUBLE_QUOTED_STRING = 22;
    final public const TOKEN_DOCTRINE_ANNOTATION_STRING = 23;
    final public const TOKEN_IDENTIFIER = 24;
    final public const TOKEN_THIS_VARIABLE = 25;
    final public const TOKEN_VARIABLE = 26;
    final public const TOKEN_HORIZONTAL_WS = 27;
    final public const TOKEN_PHPDOC_EOL = 28;
    final public const TOKEN_OTHER = 29;
    final public const TOKEN_END = 30;
    final public const TOKEN_COLON = 31;
    final public const TOKEN_WILDCARD = 32;
    final public const TOKEN_OPEN_CURLY_BRACKET = 33;
    final public const TOKEN_CLOSE_CURLY_BRACKET = 34;
    final public const TOKEN_NEGATED = 35;
    final public const TOKEN_ARROW = 36;
    final public const TOKEN_LABELS = [self::TOKEN_REFERENCE => '\'&\'', self::TOKEN_UNION => '\'|\'', self::TOKEN_INTERSECTION => '\'&\'', self::TOKEN_NULLABLE => '\'?\'', self::TOKEN_NEGATED => '\'!\'', self::TOKEN_OPEN_PARENTHESES => '\'(\'', self::TOKEN_CLOSE_PARENTHESES => '\')\'', self::TOKEN_OPEN_ANGLE_BRACKET => '\'<\'', self::TOKEN_CLOSE_ANGLE_BRACKET => '\'>\'', self::TOKEN_OPEN_SQUARE_BRACKET => '\'[\'', self::TOKEN_CLOSE_SQUARE_BRACKET => '\']\'', self::TOKEN_OPEN_CURLY_BRACKET => '\'{\'', self::TOKEN_CLOSE_CURLY_BRACKET => '\'}\'', self::TOKEN_COMMA => '\',\'', self::TOKEN_COLON => '\':\'', self::TOKEN_VARIADIC => '\'...\'', self::TOKEN_DOUBLE_COLON => '\'::\'', self::TOKEN_DOUBLE_ARROW => '\'=>\'', self::TOKEN_ARROW => '\'->\'', self::TOKEN_EQUAL => '\'=\'', self::TOKEN_OPEN_PHPDOC => '\'/**\'', self::TOKEN_CLOSE_PHPDOC => '\'*/\'', self::TOKEN_PHPDOC_TAG => 'TOKEN_PHPDOC_TAG', self::TOKEN_DOCTRINE_TAG => 'TOKEN_DOCTRINE_TAG', self::TOKEN_PHPDOC_EOL => 'TOKEN_PHPDOC_EOL', self::TOKEN_FLOAT => 'TOKEN_FLOAT', self::TOKEN_INTEGER => 'TOKEN_INTEGER', self::TOKEN_SINGLE_QUOTED_STRING => 'TOKEN_SINGLE_QUOTED_STRING', self::TOKEN_DOUBLE_QUOTED_STRING => 'TOKEN_DOUBLE_QUOTED_STRING', self::TOKEN_DOCTRINE_ANNOTATION_STRING => 'TOKEN_DOCTRINE_ANNOTATION_STRING', self::TOKEN_IDENTIFIER => 'type', self::TOKEN_THIS_VARIABLE => '\'$this\'', self::TOKEN_VARIABLE => 'variable', self::TOKEN_HORIZONTAL_WS => 'TOKEN_HORIZONTAL_WS', self::TOKEN_OTHER => 'TOKEN_OTHER', self::TOKEN_END => 'TOKEN_END', self::TOKEN_WILDCARD => '*'];
    final public const VALUE_OFFSET = 0;
    final public const TYPE_OFFSET = 1;
    final public const LINE_OFFSET = 2;
    private ?string $regexp = null;
    public function __construct(private readonly bool $parseDoctrineAnnotations = \false)
    {
    }
    /**
     * @return list<array{string, int, int}>
     */
    public function tokenize(string $s) : array
    {
        if ($this->regexp === null) {
            $this->regexp = $this->generateRegexp();
        }
        preg_match_all($this->regexp, $s, $matches, PREG_SET_ORDER);
        $tokens = [];
        $line = 1;
        foreach ($matches as $match) {
            $type = (int) $match['MARK'];
            $tokens[] = [$match[0], $type, $line];
            if ($type !== self::TOKEN_PHPDOC_EOL) {
                continue;
            }
            $line++;
        }
        $tokens[] = ['', self::TOKEN_END, $line];
        return $tokens;
    }
    private function generateRegexp() : string
    {
        $patterns = [
            self::TOKEN_HORIZONTAL_WS => '[\\x09\\x20]++',
            self::TOKEN_IDENTIFIER => '(?:[\\\\]?+[a-z_\\x80-\\xFF][0-9a-z_\\x80-\\xFF-]*+)++',
            self::TOKEN_THIS_VARIABLE => '\\$this(?![0-9a-z_\\x80-\\xFF])',
            self::TOKEN_VARIABLE => '\\$[a-z_\\x80-\\xFF][0-9a-z_\\x80-\\xFF]*+',
            // '&' followed by TOKEN_VARIADIC, TOKEN_VARIABLE, TOKEN_EQUAL, TOKEN_EQUAL or TOKEN_CLOSE_PARENTHESES
            self::TOKEN_REFERENCE => '&(?=\\s*+(?:[.,=)]|(?:\\$(?!this(?![0-9a-z_\\x80-\\xFF])))))',
            self::TOKEN_UNION => '\\|',
            self::TOKEN_INTERSECTION => '&',
            self::TOKEN_NULLABLE => '\\?',
            self::TOKEN_NEGATED => '!',
            self::TOKEN_OPEN_PARENTHESES => '\\(',
            self::TOKEN_CLOSE_PARENTHESES => '\\)',
            self::TOKEN_OPEN_ANGLE_BRACKET => '<',
            self::TOKEN_CLOSE_ANGLE_BRACKET => '>',
            self::TOKEN_OPEN_SQUARE_BRACKET => '\\[',
            self::TOKEN_CLOSE_SQUARE_BRACKET => '\\]',
            self::TOKEN_OPEN_CURLY_BRACKET => '\\{',
            self::TOKEN_CLOSE_CURLY_BRACKET => '\\}',
            self::TOKEN_COMMA => ',',
            self::TOKEN_VARIADIC => '\\.\\.\\.',
            self::TOKEN_DOUBLE_COLON => '::',
            self::TOKEN_DOUBLE_ARROW => '=>',
            self::TOKEN_ARROW => '->',
            self::TOKEN_EQUAL => '=',
            self::TOKEN_COLON => ':',
            self::TOKEN_OPEN_PHPDOC => '/\\*\\*(?=\\s)\\x20?+',
            self::TOKEN_CLOSE_PHPDOC => '\\*/',
            self::TOKEN_PHPDOC_TAG => '@(?:[a-z][a-z0-9-\\\\]+:)?[a-z][a-z0-9-\\\\]*+',
            self::TOKEN_PHPDOC_EOL => '\\r?+\\n[\\x09\\x20]*+(?:\\*(?!/)\\x20?+)?',
            self::TOKEN_FLOAT => '[+\\-]?(?:(?:[0-9]++(_[0-9]++)*\\.[0-9]*+(_[0-9]++)*(?:e[+\\-]?[0-9]++(_[0-9]++)*)?)|(?:[0-9]*+(_[0-9]++)*\\.[0-9]++(_[0-9]++)*(?:e[+\\-]?[0-9]++(_[0-9]++)*)?)|(?:[0-9]++(_[0-9]++)*e[+\\-]?[0-9]++(_[0-9]++)*))',
            self::TOKEN_INTEGER => '[+\\-]?(?:(?:0b[0-1]++(_[0-1]++)*)|(?:0o[0-7]++(_[0-7]++)*)|(?:0x[0-9a-f]++(_[0-9a-f]++)*)|(?:[0-9]++(_[0-9]++)*))',
            self::TOKEN_SINGLE_QUOTED_STRING => '\'(?:\\\\[^\\r\\n]|[^\'\\r\\n\\\\])*+\'',
            self::TOKEN_DOUBLE_QUOTED_STRING => '"(?:\\\\[^\\r\\n]|[^"\\r\\n\\\\])*+"',
            self::TOKEN_WILDCARD => '\\*',
        ];
        if ($this->parseDoctrineAnnotations) {
            $patterns[self::TOKEN_DOCTRINE_TAG] = '@[a-z_\\\\][a-z0-9_\\:\\\\]*[a-z_][a-z0-9_]*';
            $patterns[self::TOKEN_DOCTRINE_ANNOTATION_STRING] = '"(?:""|[^"])*+"';
        }
        // anything but TOKEN_CLOSE_PHPDOC or TOKEN_HORIZONTAL_WS or TOKEN_EOL
        $patterns[self::TOKEN_OTHER] = '(?:(?!\\*/)[^\\s])++';
        foreach ($patterns as $type => &$pattern) {
            $pattern = '(?:' . $pattern . ')(*MARK:' . $type . ')';
        }
        return '~' . implode('|', $patterns) . '~Asi';
    }
}
