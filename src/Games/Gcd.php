<?php

namespace Brain\Games\GcdGame;

use function Brain\Engine\newGame;

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
    $descriptionGame = 'Find the greatest common divisor of given numbers.';

    $countGames = 3;
    $resultOfThreeGames = [];

    for ($game = 0; $game < $countGames; $game++) {
        $randomNumbers = [rand(1, 100), rand(1, 100)];

        $gcd = "{$randomNumbers[0]} {$randomNumbers[1]}";

        $greatestCommonDivisor = gcd($randomNumbers[0], $randomNumbers[1]);

        $resultOfThreeGames[$gcd] = $greatestCommonDivisor;
    }

    newGame($resultOfThreeGames, $descriptionGame);
}
