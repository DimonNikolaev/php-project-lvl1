<?php

namespace Brain\Games\Progression;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION_GAME = 'What number is missing in the progression?';

function game(): void
{
    $resultGame = [];

    for ($game = 0; $game < ROUNDS_COUNT; $game++) {
        $result = [];
        $lengthSequence = rand(5, 10);
        $stepBetweenNumbers = rand(0, 5);
        $firstNumberInTheSequence = rand(0, 100);
        $randomPositionInSequence = rand(0, $lengthSequence - 1);
        $hiddenElement = 0;
        $result[] = $firstNumberInTheSequence;
        $sequence = '';

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

        $sequence = implode(" ", $result);

        $resultGame[$sequence] = $hiddenElement;
    }

    newGame($resultGame, DESCRIPTION_GAME);
}
