# Horse

Horse is a powerful `symfony/console` wrapper.

## Introduction 

Tired? Can't remember to type hint `Symfony\Component\Console\Output\OutputInterface`
or extend `Symfony\Component\Console\Command\Command`? Try Horse:


```php
<?php namespace Commands;

use Horse\Command, Horse\Input, Horse\Output;

/**
 * @name greet
 * @desc Greet a person
 * @sign {name:required:"Name of the person"}
 */
class GreetCommand extends Command {

    /**
     * Run the command.
     *
     * @param Input $input
     * @param Output $output
     * @return void
     */
    public function go(Input $input, Output $output)
    {
        $output('Hello '.$input('name'));
    }

}

```

That is awesome, right?

## Additional information

Horse is licensed under the MIT license and currently being developed.

