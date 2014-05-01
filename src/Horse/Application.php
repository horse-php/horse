<?php namespace Horse;

use Symfony\Component\Console\Application as SymfonyApplication;
use Horse\Transformers\ClassTransformer;

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
     * The real application instance.
     *
     * @var SymfonyApplication
     */
    protected $application;

    /**
     * The class transformer instance.
     *
     * @var ClassTransformer
     */
    protected $transformer;

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
        $this->name        = $name;
        $this->version     = $version;
        $this->application = new SymfonyApplication($name, $version ?: 'UNKNOWN');
        $this->transformer = new ClassTransformer;
    }

    /**
     * Get the application name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the application version.
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
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

    /**
     * Set the real application instance.
     *
     * @param SymfonyApplication $application
     * @return void
     */
    public function setApplication(SymfonyApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Get the real application instance.
     *
     * @return SymfonyApplication
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Run the application.
     *
     * @return integer
     */
    public function run()
    {
        foreach ($this->getCommands() as $command)
        {
            $this->transformer->transform($command);

            $this->application->add($command);
        }

        return $this->application->run();
    }

}

