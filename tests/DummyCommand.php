<?php namespace Horse\Testing;

use Horse\Command;

/**
 * @name dummy-command
 * @desc Very dummy command
 * @sign {name:required} {--age:optional:"Your age":18}
 */
class DummyCommand extends Command {

    /**
     * Run the command.
     *
     * @param mixed $input
     * @param mixed $output
     * @return void
     */
    public function go($input, $output)
    {
        return 'foobar';
    }

}

