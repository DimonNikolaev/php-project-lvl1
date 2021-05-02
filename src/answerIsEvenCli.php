<?php

namespace Brain\Games\answerEvenCli;

use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

function getQuestion(): string
{
    return "Answer 'yes' if the number is even, otherwise answer 'no' ";
}

function getAnswerCorrect(): string
{
    return "Correct";
}


function isTheRandomValueEven(int $randomNumber): string
{
    return $randomNumber % 2 === 0 ? 'yes' : 'no';
}

function getTextQuestion(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function gameAnswerIsEven()
{
    $randomNumber = rand(0, 100);
    $answer = prompt("Question: " . $randomNumber);
    $correctAnswer = isTheRandomValueEven($randomNumber);

    // if (isRightAnswer($answer, $correctAnswer)) {
    //     return true;
    // } elseif (!isRightAnswer($answer, $correctAnswer)) {
    //     return false;
    // }

    return [$answer, $correctAnswer];
}


function isRightAnswer(string $answer, string $rightAnswer): bool
{
    return $answer === $rightAnswer;
}

function printIfAllAnswersAreCorrect($name)
{
    line("Congratulations, %s", $name);
}
