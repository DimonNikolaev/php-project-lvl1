<?php

namespace Brain\Games\Even;

use function cli\prompt;
use function Brain\Engine\newGame;

function isTheRandomValueEven(int $randomNumber): string
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function gameAnswerIsEven(): array
{
    $randomNumber = rand(0, 100);
    $answer = prompt("Question: " . $randomNumber);
    $correctAnswer = isTheRandomValueEven($randomNumber);

    return [$answer, $correctAnswer];
}


function game(): void
{
    $descriptionGame = 'Answer "yes" if the number is even, otherwise answer "no".';

    newGame('Brain\Games\Even\gameAnswerIsEven', $descriptionGame);
}
