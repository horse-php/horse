<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;

class ClassTransformerSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ClassTransformer');
    }

    function it_transforms_a_class()
    {

    }

}

