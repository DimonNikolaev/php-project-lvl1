<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function newGame(callable $gameResult, string $question): void
{
    line('Welcome to the Brain Game!');

    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);

    line($question);

    $numberOfCorrectAnswers = 0;
    $numberOfRepetitionsOfTheGame = 3;
    $passedGameMessage = "Congratulations, {$name}!";

    do {
        $gameRef = $gameResult();

        $answer = $gameRef[0];
        $correctAnswer = $gameRef[1];

        $isRightAnswer = (string) $answer === (string) $correctAnswer;

        if ($isRightAnswer) {
            line("Your answer: {$answer}");
            line(getAnswerCorrect());
            $numberOfCorrectAnswers++;
        } else {
            line("Your answer: {$answer}");

            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");

            line("Let's try again, ${$name}!");

            return;
        }
    } while ($numberOfCorrectAnswers < $numberOfRepetitionsOfTheGame);

    line($passedGameMessage);
}

function getAnswerCorrect(): string
{
    return "Correct!";
}
