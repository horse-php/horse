<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Horse\Parsers\BlockParser;

class ClassTransformerSpec extends ObjectBehavior {

    function let(BlockParser $parser)
    {
        $this->beConstructedWith($parser);
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ClassTransformer');
    }

    function it_transforms_a_class()
    {

    }

}

