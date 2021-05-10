<?php

namespace Brain\Games\prime;

use function cli\prompt;
use function Brain\Engine\newGame;

function gamePrimeNumber()
{
    $rightAnswer = '';
    $randomNumber = rand(0, 100);
    $answer = prompt("Question: " . $randomNumber);

    if (isPrime($randomNumber)) {
        $rightAnswer = 'yes';
        return [$answer, $rightAnswer];
    } else {
        $rightAnswer = 'no';
        return [$answer, $rightAnswer];
    }
}

function getTextQuestion(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function isPrime($num)
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
            break;
        }
    }
    return true;
}

function game()
{
    newGame('Brain\Games\prime\gamePrimeNumber', getTextQuestion());
}
