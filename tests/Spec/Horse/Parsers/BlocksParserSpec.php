<?php namespace Spec\Horse\Parsers;

use PhpSpec\ObjectBehavior;

class BlocksParserSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Parsers\BlocksParser');
    }



}
