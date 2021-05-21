<?php

namespace Brain\Games\GCD;

use function Brain\Engine\newGame;

use const Brain\Engine\COUNT_GAMES;

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
    $resultOfThreeGames = [];

    for ($game = 0; $game < COUNT_GAMES; $game++) {
        $randomNumbers = [rand(1, 100), rand(1, 100)];

        $gcd = "{$randomNumbers[0]} {$randomNumbers[1]}";

        $greatestCommonDivisor = gcd($randomNumbers[0], $randomNumbers[1]);

        $resultOfThreeGames[$gcd] = $greatestCommonDivisor;
    }

    newGame($resultOfThreeGames, DESCRIPTION_GAME);
}
