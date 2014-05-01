<?php namespace Horse;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Command extends SymfonyCommand {

    /**
     * Run the command (redirected).
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public abstract function go(Input $input, Output $output);

    /**
     * Run the command (for real).
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        return $this->go(new Input($input), new Output($output));
    }

}

