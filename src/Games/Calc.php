<?php

namespace Brain\Games\Calc;

use function Brain\Engine\newGame;

use const Brain\Engine\COUNT_GAMES;

const DESCRIPTION_GAME = 'What is the result of the expression?';


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


function game(): void
{
    $resultOfThreeGames = [];

    for ($game = 0; $game < COUNT_GAMES; $game++) {
        $randomNumbers = [rand(1, 100), rand(1, 100)];

        $mathOperators = ['+', '*', '-'];

        $randomMathOperatorKey = array_rand($mathOperators);

        $randomMathOperator = $mathOperators[$randomMathOperatorKey][0];

        $correctExpressionAnswer = getMathExpressionResult($randomNumbers[0], $randomNumbers[1], $randomMathOperator);
        $mathExpression = getMathExpression($randomNumbers[0], $randomNumbers[1], $randomMathOperator);

        $resultOfThreeGames[$mathExpression] = $correctExpressionAnswer;
    }

    newGame($resultOfThreeGames, DESCRIPTION_GAME);
}
