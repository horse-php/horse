<?php namespace Spec\Horse\Parsers;

use PhpSpec\ObjectBehavior;
use ReflectionClass;

class BlockParserSpec extends ObjectBehavior {

    function let(ReflectionClass $reflector)
    {
        $this->beConstructedWith($reflector);
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Parsers\BlockParser');
    }



}

