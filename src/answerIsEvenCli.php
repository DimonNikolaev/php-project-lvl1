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

function isRightAnswer(string $answer, string $rightAnswer): bool
{
    return $answer === $rightAnswer;
}


function printQuestionAnswerIsEvenUser()
{
    $name = readline_info()['line_buffer'];
    $count = 0;
    line("Answer 'yes' if the number is even, otherwise answer 'no' ");

    do {
        $randomNumber = rand(0, 100);
        $randomNumberEven = $randomNumber % 2 === 0 ? 'yes' : 'no';
        $answer = prompt("Question: " . $randomNumber);

        if (isRightAnswer($answer, $randomNumberEven)) {
            printAnswerCorrent();
            $count++;
        } elseif (!isRightAnswer($answer, $randomNumberEven)) {
            printWrongAnswer($name);

            return;
        }
    } while ($count < 3);

    printIfAllAnswersAreCorrect($name);
}

function printWrongAnswer($name)
{
    line('\'yes\' is wrong answer ;(. Correct answer was \'no\'');

    line("Let's try again, %s!", $name);
}

function printAnswerCorrent()
{
    line('Correct!');
}

function printIfAllAnswersAreCorrect($name)
{
    line("Congratulations, %s", $name);
}
