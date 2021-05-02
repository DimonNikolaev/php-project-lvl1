<?php

namespace Brain\Games\answerIsCorrectExpressionResult;

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
    return 'What is the result of the expression?';
}


function wrongAnswer(string $wrongAnswer, string $correctAnswer): string
{
    return "{$wrongAnswer} is wrong answer ;(. Correct answer was {$correctAnswer}.";
}

// function getWrongAswer(): string
// {

// }

function gameCalc()
{
    $randomNumber1 = rand(0, 100);
    $randomNumber2 = rand(0, 100);

    $mathOperators = ['+', '*', '-'];
    $randomMathOperatorKey = array_rand($mathOperators);
    $randomMathOperator = $mathOperators[$randomMathOperatorKey][0];

    $correctExpressionAnswer = getMathExpressionResult($randomNumber1, $randomNumber2, $randomMathOperator);
    $mathExpression = getMathExpression($randomNumber1, $randomNumber2, $randomMathOperator);

    $answer = prompt("Question: " . $mathExpression);

    return [$answer, $correctExpressionAnswer];
}

function getMathExpression(int $firstOperand, int $secondOperand, string $mathOperator): string
{
    return "{$firstOperand} {$mathOperator} {$secondOperand}";
}

function getMathExpressionResult(int $firstOperand, int $secondOperand, string $mathOperator): int
{
    $expressionResult = 0;

    if ($mathOperator === '+') {
        $expressionResult = $firstOperand + $secondOperand;
    } elseif ($mathOperator === '-') {
        $expressionResult = $firstOperand - $secondOperand;
    } elseif ($mathOperator === '*') {
        $expressionResult = $firstOperand * $secondOperand;
    }

    return $expressionResult;
}
