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
        BlockParser        $block   = null,
        MetadataParser     $meta    = null,
        ElementTransformer $element = null
    )
    {
        $this->block   = $block   ?: new BlockParser;
        $this->meta    = $meta    ?: new MetadataParser;
        $this->element = $element ?: new ElementTransformer;
    }

    /**
     * Read the command metadata and apply it.
     *
     * @param Command $command
     * @return void
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
    }

    /**
     * Transform the string to a valid command definition.
     *
     * @param string $signature
     * @return array
     */
    public function getDefinition($signature)
    {
        $elements = $this->meta->parseMany($signature);

        return \array_map([$this->element, 'transform'], $elements);
    }

}

