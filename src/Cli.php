<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

$name = 'fff';

function printHelloPromptUser()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');

    $GLOBALS['name'] = $name;

    line("Hello, %s!", $name);
}

function getName()
{
    global $name;

    return $name;
}
