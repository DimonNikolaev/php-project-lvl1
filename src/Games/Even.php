<?php

namespace Brain\Games\Even;

use function Brain\Engine\newGame;
use const Brain\Engine\countGames;

const descriptionGame = 'Answer "yes" if the number is even, otherwise answer "no".';


function isTheRandomValueEven(int $randomNumber): string
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function game(): void
{
    $resultOfThreeGames = [];

    for ($game = 0; $game < countGames; $game++) {
        $randomNumber = rand(0, 100);

        $resultOfThreeGames[$randomNumber] = isTheRandomValueEven($randomNumber);
    }

    newGame($resultOfThreeGames, descriptionGame);
}
