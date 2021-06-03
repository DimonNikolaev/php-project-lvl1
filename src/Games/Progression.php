<?php

namespace Brain\Games\Progression;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION_GAME = 'What number is missing in the progression?';

function game(): void
{
    $gameData = [];

    for ($game = 0; $game < ROUNDS_COUNT; $game++) {
        $result = [];
        $lengthSequence = rand(5, 10);
        $stepBetweenNumbers = rand(0, 5);
        $firstNumberInTheSequence = rand(0, 100);
        $hiddenElement = rand(0, $lengthSequence - 1);
        $result[] = $firstNumberInTheSequence;
        $sequence = '';

        for ($index = 0; $index < $lengthSequence; $index++) {
            $lastElement = intval($result[count($result) - 1]);
            $nextNumber = $lastElement + $stepBetweenNumbers;

            if ($index === $hiddenElement) {
                $result[] = '..';
                $hiddenElement = $nextNumber;
                $result[] = $nextNumber + $stepBetweenNumbers;
            } else {
                $result[] = $nextNumber;
            }
        }

        $sequence = implode(" ", $result);

        $gameData[$sequence] = $hiddenElement;
    }

    newGame($gameData, DESCRIPTION_GAME);
}
