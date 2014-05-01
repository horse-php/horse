<?php namespace Horse;

class Output extends Proxy {

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

