<?php

namespace Brain\Games\Prime;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i === 0 || $num === 0 || $num === 1) {
            return false;
        }
    }
    return true;
}

function game(): void
{
    $gameData = [];

    for ($game = 0; $game < ROUNDS_COUNT; $game++) {
        $randomNumber = rand(2, 100);
        $expectedAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $gameData[$randomNumber] = $expectedAnswer;
    }

    newGame($gameData, DESCRIPTION_GAME);
}
