<?php namespace Horse\Transformers;

use Horse\Command;
use Horse\Parsers\BlockParser;

class ClassTransformer {

    /**
     * The docblocks parser instance.
     *
     * @var BlockParser
     */
    protected $parser;

    /**
     * The constructor.
     *
     * @param BlockParser $parser
     * @return ClassTransformer
     */
    public function __construct(BlockParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Read the command metadata and apply it.
     *
     * @param Command $command
     * @return Command
     */
    public function transform(Command $command)
    {

    }

}

