<?php

namespace Brain\Games\Prime;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUND_COUNT;

const DESCRIPTION_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function game(): void
{
    $resultGame = [];

    for ($game = 0; $game < ROUND_COUNT; $game++) {
        $randomNumber = rand(2, 100);
        $expectedAnswer = isPrime($randomNumber) ? 'yes' : 'no';

        $resultGame[$randomNumber] = $expectedAnswer;
    }

    newGame($resultGame, DESCRIPTION_GAME);
}
