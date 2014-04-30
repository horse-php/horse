<?php namespace Spec\Horse\Parsers;

use PhpSpec\ObjectBehavior;

class MetadataParserSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Parsers\MetadataParser');
    }

    function it_parsers_a_single_element()
    {
        $this->parse('{name:optional:"Your name":\'John Doe\'}')->shouldReturn([
            'name', 'optional', 'Your name', 'John Doe'
        ]);

        $this->parse('{--country:required}')->shouldReturn([
            '--country', 'required'
        ]);
    }

}

