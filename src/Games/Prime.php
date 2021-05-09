<?php

namespace Brain\Games\prime;

use function cli\prompt;
use function Brain\Engine\newGame;

function gamePrimeNumber()
{
    $rightAnswer = '';
    $randomNumber = rand(0, 100);
    $answer = prompt("Question: " . $randomNumber);

    if (gmp_prob_prime($randomNumber) === 2) {
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

function game()
{
    newGame('Brain\Games\prime\gamePrimeNumber', getTextQuestion());
}
