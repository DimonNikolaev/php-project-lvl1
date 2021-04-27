<?php

namespace Brain\Games\Cli;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function cli\line;

function printHelloPromptUser()
{
    line('Welcome to the Brain Game!');
    $name = readline('May I have your name?');
    readline_add_history($name);

    line("Hello, %s!", $name);
}
