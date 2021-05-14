<?php

namespace Brain\Games\Even;

use function Brain\Engine\newGame;

function isTheRandomValueEven(int $randomNumber): string
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function game(): void
{
    $descriptionGame = 'Answer "yes" if the number is even, otherwise answer "no".';

    $countGames = 3;
    $resultOfThreeGames = [];

    for ($game = 0; $game < $countGames; $game++) {
        $randomNumber = rand(0, 100);

        $resultOfThreeGames[$randomNumber] = isTheRandomValueEven($randomNumber);
    }

    newGame($resultOfThreeGames, $descriptionGame);
}
