<?php

namespace Brain\Games\gcdGame;

use function cli\prompt;
use function Brain\Engine\newGame;

function gameGCD(): array
{
    $randomNumber1 = rand(0, 100);
    $randomNumber2 = rand(0, 100);
    $question = "{$randomNumber1} {$randomNumber2}";

    $answer = prompt("Question: " . $question);

    $greatestCommonDivisor = gcd($randomNumber1, $randomNumber2);

    return  [$answer, $greatestCommonDivisor];
}

function getTextQuestion(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function gcd(int $firstNumber, int $secondNumber): int
{
    while (true) {
        if ($firstNumber == $secondNumber) {
            return $secondNumber;
        }
        if ($firstNumber > $secondNumber) {
            $firstNumber -= $secondNumber;
        } else {
            $secondNumber -= $firstNumber;
        }
    }
}

function game(): void
{
    newGame('Brain\Games\gcdGame\gameGCD', getTextQuestion());
}
