<?php namespace Horse;

use Symfony\Component\Console\Output\OutputInterface;

class Output extends Proxy {

    /**
     * Get the wrapped output object.
     *
     * @return OutputInterface
     */
    public function getOutput()
    {
        return $this->object;
    }

    /**
     * Alias for writeln().
     *
     * @param string $content
     * @return void
     */
    public function __invoke($content)
    {
        $this->object->writeln($content);
    }

}

