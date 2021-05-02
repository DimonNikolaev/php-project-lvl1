<?php

namespace Brain\Games\Engine;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use function cli\line;

function getName(): string
{
    return readline_info()['line_buffer'];
}

function printIfAllAnswersAreCorrect($name)
{
    line("Congratulations, %s", $name);
}

function newGame($gameResult, string $question)
{
    $numberOfCorrectAnswers = 0;

    line($question);

    do {
        $gameRef = $gameResult();

        $answer = $gameRef[0];
        $correctAnswer = $gameRef[1];

        if (isRightAnswer($answer, $correctAnswer)) {
            line(getAnswerCorrect());
            $numberOfCorrectAnswers++;
        } else {
            gameFalse(getName(), $answer, $correctAnswer);
            return;
        }
    } while ($numberOfCorrectAnswers < 3);

    printIfAllAnswersAreCorrect(getName());
}

function getAnswerCorrect(): string
{
    return "Correct";
}

function gameFalse(string $name, $wrongAnswer, $correctAnswer)
{
    line("{$wrongAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}");

    line("Let's try again, %s!", $name);
}


function isRightAnswer(string $answer, string $rightAnswer): bool
{
    print_r($answer, PHP_EOL);
    print_r($rightAnswer, PHP_EOL);

    return $answer === $rightAnswer;
}
