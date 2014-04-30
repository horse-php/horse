<?php namespace Horse\Testing;

use Horse\Command;

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

