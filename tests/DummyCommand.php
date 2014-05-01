<?php namespace Horse\Testing;

use Horse\Command, Horse\Input, Horse\Output;

/**
 * @name dummy-command
 * @desc Very dummy command
 * @sign {name:required} {--age::value_optional:"Your age":18}
 */
class DummyCommand extends Command {

    /**
     * The constructor.
     *
     * @return DummyCommand
     */
    public function __construct()
    {
        $this->setName('dummy-command');

        parent::__construct();
    }

    /**
     * Run the command.
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function go(Input $input, Output $output)
    {
        return 'foobar';
    }

}

