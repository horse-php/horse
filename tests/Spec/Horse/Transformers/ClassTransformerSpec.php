<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Horse\Parsers\BlockParser;
use Horse\Testing\DummyCommand;
use Horse\Parsers\MetadataParser;
use Horse\Transformers\ElementTransformer;

class ClassTransformerSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ClassTransformer');
    }

    function it_transforms_a_class()
    {
        $this->transform(new DummyCommand);
    }

}

