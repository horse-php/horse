<?php namespace Horse;

class Application {

    /**
     * The application name.
     *
     * @var string
     */
    protected $name;

    /**
     * The application version.
     *
     * @var mixed
     */
    protected $version;

    /**
     * All commands added to the application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * The constructor.
     *
     * @param string $name
     * @param mixed $version
     * @return Application
     */
    public function __construct($name, $version = null)
    {
        $this->name    = $name;
        $this->version = $version;
    }

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
