<?php

namespace RectorPrefix202308\Illuminate\Contracts\Database;

class ModelIdentifier
{
    /**
     * The relationships loaded on the model.
     *
     * @var array
     */
    public $relations;
    /**
     * The class name of the model collection.
     *
     * @var string|null
     */
    public $collectionClass;
    /**
     * Create a new model identifier.
     *
     * @param  string  $class
     * @return void
     */
    public function __construct(public $class, public mixed $id, array $relations, public mixed $connection)
    {
        $this->relations = $relations;
    }
    /**
     * Specify the collection class that should be used when serializing / restoring collections.
     *
     * @param  string|null  $collectionClass
     * @return $this
     */
    public function useCollectionClass(?string $collectionClass)
    {
        $this->collectionClass = $collectionClass;
        return $this;
    }
}
