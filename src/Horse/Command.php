<?php namespace Horse;

use Symfony\Component\Console\Command\Command as SymfonyCommand;

abstract class Command extends SymfonyCommand {

    /**
     * Run the command (redirected).
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public abstract function go($input, $output);

    /**
     * Run the command (for real).
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function execute($input, $output)
    {
        return $this->go($input, $output);
    }

}

