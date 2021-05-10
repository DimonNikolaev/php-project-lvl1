<?php

namespace Brain\Games\Progression;

use function cli\prompt;
use function Brain\Engine\newGame;

function getTheAmountOfTheLengthOfTheSequence(): int
{
    return rand(5, 10);
}

function gameProgression(): array
{
    $result = [];
    $lengthSequence = getTheAmountOfTheLengthOfTheSequence();
    $stepBetweenNumbers = rand(0, 5);
    $firstNumberInTheSequence = rand(0, 100);
    $randomPositionInSequence = rand(0, $lengthSequence - 1);
    $hiddenElement = 0;
    $result[] = $firstNumberInTheSequence;

    for ($index = 0; $index < $lengthSequence; $index++) {
        $lastElement = intval($result[count($result) - 1]);
        $nextNumber = $lastElement + $stepBetweenNumbers;

        if ($index === $randomPositionInSequence) {
            $result[] = '..';
            $hiddenElement = $nextNumber;
            $result[] = $nextNumber + $stepBetweenNumbers;

            continue;
        }

        $result[] = $nextNumber;
    }

    $answer = prompt("Question: " . implode(" ", $result));

    return [$answer, $hiddenElement];
}

function getTextQuestion(): string
{
    return 'What number is missing in the progression?';
}


function game(): void
{
    newGame('Brain\Games\Progression\gameProgression', getTextQuestion());
}
