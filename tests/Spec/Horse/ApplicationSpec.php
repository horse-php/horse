<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Horse\Application');
    }

}

