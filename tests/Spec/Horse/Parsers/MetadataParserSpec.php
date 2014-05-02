<?php namespace Spec\Horse\Parsers;

use PhpSpec\ObjectBehavior;

class MetadataParserSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Parsers\MetadataParser');
    }

    function it_parses_a_single_element()
    {
        $this->parse('{name:optional:"Your name":\'John Doe\'}')->shouldReturn([
            'name', 'optional', 'Your name', 'John Doe'
        ]);

        $this->parse('{--country:required}')->shouldReturn([
            '--country', 'required'
        ]);

        $this->parse('{name:required:"foo:bar"}')->shouldReturn([
            'name', 'required', 'foo:bar'
        ]);
    }

    function it_parses_many_elements()
    {
        $string = '{name:required} {--age:optional:"Your age":18} {country:optional:"Your country"}';

        $this->parseMany($string)->shouldBe([
            ['name', 'required'],
            ['--age', 'optional', 'Your age', '18'],
            ['country', 'optional', 'Your country']
        ]);

        $this->parseMany(' {name:required}   {age:optional}  ')->shouldReturn([
            ['name', 'required'],
            ['age', 'optional']
        ]);
    }

}

