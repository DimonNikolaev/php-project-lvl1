<?php

namespace Brain\Games\prime;

use function cli\prompt;
use function Brain\Engine\newGame;

function gamePrimeNumber(): array
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

function isPrime(int $num): bool
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function game(): void
{
    newGame('Brain\Games\prime\gamePrimeNumber', getTextQuestion());
}
