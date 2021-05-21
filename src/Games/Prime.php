<?php

namespace Brain\Games\Prime;

use function Brain\Engine\newGame;
use const Brain\Engine\countGames;

const descriptionGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $resultOfThreeGames = [];

    for ($game = 0; $game < countGames; $game++) {
        $randomNumber = rand(2, 100);
        $expectedAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $resultOfThreeGames[$randomNumber] = $expectedAnswer;
    }

    newGame($resultOfThreeGames, descriptionGame);
}
