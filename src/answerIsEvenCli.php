<?php

namespace Brain\Games\answerEvenCli;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\printHelloPromptUser;

function isRightAnswer(string $answer, string $rightAnswer): bool
{
    return $answer === $rightAnswer;
}


function printQuestionAnswerIsEvenUser()
{
    $count = 0;
    line("Answer 'yes' if the number is even, otherwise answer 'no' ");

    printHelloPromptUser();

    do {
        $randomNumber = rand(0, 100);
        $randomNumberEven = $randomNumber % 2 === 0 ? 'yes' : 'no';
        $answer = prompt("Question: " . $randomNumber);

        if (isRightAnswer($answer, $randomNumberEven)) {
            printAnswerCorrent();
            $count++;
        } elseif (!isRightAnswer($answer, $randomNumberEven)) {
            printWrongAnswer();

            return;
        }
    } while ($count < 3);

    printIfAllAnswersAreCorrect();
}

function printWrongAnswer()
{
    line('\'yes\' is wrong answer ;(. Correct answer was \'no\'');

    line('Let\'s try again, Bill!');
}

function printAnswerCorrent()
{
    line('Correct!');
}

function printIfAllAnswersAreCorrect()
{
    line('Congratulations, Bill!');
}
