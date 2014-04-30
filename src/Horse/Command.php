<?php namespace Horse;

use Symfony\Component\Console\Command\Command as SymfonyCommand;

abstract class Command extends SymfonyCommand {

    /**
     * Run the command.
     *
     * @param mixed $input
     * @param mixed $output
     * @return void
     */
    public abstract function go($input, $output);

}

