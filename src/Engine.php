<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function newGame(array $gameResults, string $question): void
{
    line('Welcome to the Brain Game!');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($question);

    foreach ($gameResults as $answer => $correctAnswer) {
        $answerForQuestion = prompt("Question: " . $answer);
        $answerUser = "Your answer: {$answerForQuestion}";

        if ((string) $correctAnswer === $answerForQuestion) {
            line($answerUser);
            line("Correct!");
        } else {
            line($answerUser);

            line("{$answerForQuestion} is wrong answer ;(. Correct answer was {$correctAnswer}");

            line("Let's try again, ${name}!");

            exit();
        }
    }

    line("Congratulations, ${name}!");
}
