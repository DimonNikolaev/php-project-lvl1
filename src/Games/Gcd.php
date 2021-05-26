<?php

namespace Brain\Games\Gcd;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION_GAME = 'Find the greatest common divisor of given numbers.';

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
    $resultGame = [];

    for ($game = 0; $game < ROUNDS_COUNT; $game++) {
        $randomNumbers = [rand(1, 100), rand(1, 100)];

        $gcd = "{$randomNumbers[0]} {$randomNumbers[1]}";

        $greatestCommonDivisor = gcd($randomNumbers[0], $randomNumbers[1]);

        $resultGame[$gcd] = $greatestCommonDivisor;
    }

    newGame($resultGame, DESCRIPTION_GAME);
}
