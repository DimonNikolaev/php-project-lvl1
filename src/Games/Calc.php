<?php

namespace Brain\Games\Calc;

use function cli\prompt;
use function Brain\Engine\newGame;

function gameCalc(): array
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


function getTextQuestion(): string
{
    return 'What is the result of the expression?';
}


function game(): void
{
    newGame('Brain\Games\Calc\gameCalc', getTextQuestion());
}
