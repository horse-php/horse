<?php namespace Horse;

class Application {

    /**
     * All commands added to the application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Add a new command.
     *
     * @param Command $command
     * @return void
     */
    public function addCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    /**
     * Get all registered commands.
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

}
