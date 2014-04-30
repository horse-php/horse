<?php namespace Horse;

use Symfony\Component\Console\Command\Command as SymfonyCommand;

abstract class Command extends SymfonyCommand {

    /**
     * Run the command (redirected to).
     *
     * @param mixed $input
     * @param mixed $output
     * @return void
     */
    public abstract function go($input, $output);

    /**
     * Run the command (for real).
     *
     * @param mixed $input
     * @param mixed $output
     * @return void
     */
    public function execute($input, $output)
    {
        return $this->go($input, $output);
    }

}

