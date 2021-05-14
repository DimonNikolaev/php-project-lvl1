<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function newGame(array $gameResults, string $question): void
{
    line('Welcome to the Brain Game!');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($question);

    $passedGameMessage = "Congratulations, ${name}!";

    foreach ($gameResults as $answer => $correctAnswer) {
        $answerUser = prompt("Question: " . $answer);

        $isRightAnswer = (string) $correctAnswer === $answerUser;

        if ($isRightAnswer) {
            line("Your answer: {$answerUser}");
            line("Correct!");
        } else {
            line("Your answer: {$answerUser}");

            line("{$answerUser} is wrong answer ;(. Correct answer was {$correctAnswer}");

            line("Let's try again, ${name}!");

            return;
        }
    }

    line($passedGameMessage);
}

function getAnswerCorrect(): string
{
    return "Correct!";
}
