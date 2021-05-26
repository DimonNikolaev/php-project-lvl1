<?php

namespace Brain\Games\Calc;

use function Brain\Engine\newGame;

use const Brain\Engine\ROUNDS_COUNT;

const DESCRIPTION_GAME = 'What is the result of the expression?';


function getMathExpression(int $firstOperand, int $secondOperand, string $mathOperator): string
{
    return "{$firstOperand} {$mathOperator} {$secondOperand}";
}

function getMathExpressionResult(int $firstOperand, int $secondOperand, string $mathOperator): int
{
    $expressionResult = 0;

    switch ($mathOperator) {
        case '+':
            $expressionResult = $firstOperand + $secondOperand;
            break;
        case '-':
            $expressionResult = $firstOperand - $secondOperand;
            break;
        case '*':
            $expressionResult = $firstOperand * $secondOperand;
            break;
    }

    return $expressionResult;
}


function game(): void
{
    $resultGame = [];

    for ($game = 0; $game < ROUNDS_COUNT; $game++) {
        $randomNumbers = [rand(1, 100), rand(1, 100)];

        $mathOperators = ['+', '*', '-'];

        $randomMathOperatorKey = array_rand($mathOperators);

        $randomMathOperator = $mathOperators[$randomMathOperatorKey][0];

        $correctExpressionAnswer = getMathExpressionResult($randomNumbers[0], $randomNumbers[1], $randomMathOperator);
        $mathExpression = getMathExpression($randomNumbers[0], $randomNumbers[1], $randomMathOperator);

        $resultGame[$mathExpression] = $correctExpressionAnswer;
    }

    newGame($resultGame, DESCRIPTION_GAME);
}
