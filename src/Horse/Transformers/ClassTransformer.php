<?php namespace Horse\Transformers;

use Horse\Command;
use Horse\Parsers\BlockParser;
use Horse\Parsers\MetadataParser;

class ClassTransformer {

    /**
     * The docblocks parser instance.
     *
     * @var BlockParser
     */
    protected $block;

    /**
     * The metadata parser instance.
     *
     * @var MetadataParser
     */
    protected $meta;

    /**
     * The element transformer instance.
     *
     * @var ElementTransformer
     */
    protected $element;

    /**
     * The constructor.
     *
     * @param BlockParser $block
     * @param MetadataParser $meta
     * @return ClassTransformer
     */
    public function __construct(
        BlockParser $block, MetadataParser $meta, ElementTransformer $element
    )
    {
        $this->block   = $block;
        $this->meta    = $meta;
        $this->element = $element;
    }

    /**
     * Read the command metadata and apply it.
     *
     * @param Command $command
     * @return Command
     */
    public function transform(Command $command)
    {
        $block = $this->block->reflector(new \ReflectionClass($command));
        $lines = [];

        foreach ($block->getLines() as $line)
        {
            $lines[] = $line->stripTag();
        }

        list($name, $description, $signature) = $lines;

        $command->setName($name);
        $command->setDescription($description);
        $command->setDefinition($this->getDefinition($signature));

        return $command;
    }

    /**
     * Transform the string to a valid command definition.
     *
     * @param string $signature
     * @return array
     */
    public function getDefinition($signature)
    {
        return [];
    }

}

