<?php

namespace Brain\Games\prime;

use function Brain\Engine\newGame;

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
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $countGames = 3;
    $resultOfThreeGames = [];

    for ($game = 0; $game < $countGames; $game++) {
        $randomNumber = rand(0, 100);
        $expectedAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $resultOfThreeGames[$randomNumber] = $expectedAnswer;
    }

    newGame($resultOfThreeGames, $gameDescription);
}
