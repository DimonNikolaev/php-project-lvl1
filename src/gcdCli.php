<?php


namespace Brain\Games\gcdCli;

use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function gameGCD()
{
    $randomNumber1 = rand(0, 100);
    $randomNumber2 = rand(0, 100);
    $question = "{$randomNumber1} {$randomNumber2}";

    $answer = prompt("Question: " . $question);

    $greatestCommonDivisor = gmp_strval(gmp_gcd($randomNumber1, $randomNumber2));

    return  [$answer, $greatestCommonDivisor];
}

function getQuestion(): string
{
    return 'Find the greatest common divisor of given numbers.';
}
