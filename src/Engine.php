<?php

namespace Brain\Engine;

// phpcs:disable

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function cli\line;
use function cli\prompt;

function printIfAllAnswersAreCorrect(string $name): void
{
    line("Congratulations, %s!", $name);
}

function newGame(callable $gameResult, string $question): void
{
    $numberOfCorrectAnswers = 0;

    line('Welcome to the Brain Game!');

    $name = prompt('May I have your name? ');
    line("Hello, %s!", $name);

    line($question);

    do {
        $gameRef = $gameResult();

        $answer = $gameRef[0];
        $correctAnswer = $gameRef[1];

        if (isRightAnswer($answer, $correctAnswer)) {
            printAnswerUser($answer);
            line(getAnswerCorrect());
            $numberOfCorrectAnswers++;
        } else {
            printAnswerUser($answer);
            gameFalse($name, $answer, $correctAnswer);
            return;
        }
    } while ($numberOfCorrectAnswers < 3);

    printIfAllAnswersAreCorrect($name);
}

function printAnswerUser(string $answer): void
{
    line("Your answer: {$answer}");
}

function getAnswerCorrect(): string
{
    return "Correct!";
}

function gameFalse(string $name, string $wrongAnswer, string $correctAnswer): void
{
    line("{$wrongAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}");

    line("Let's try again, %s!", $name);
}


function isRightAnswer(string $answer, string $rightAnswer): bool
{
    return $answer === $rightAnswer;
}
