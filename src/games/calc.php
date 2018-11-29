<?php
/**
 * User: li0n0k
 * Date: 27.11.18
 * Time: 17:49
 */

namespace Project1;

function getRandomOperation()
{
    $operation = ['+', '-', '*'];
    return $operation[array_rand($operation)];
}

function startGameCalc()
{
    $description = 'What is the result of the expression?';

    $funcTask = function () {
        $number1 = getRandomNumber(1, 10);
        $number2 = getRandomNumber(1, 10);
        $operation = getRandomOperation();

        $correctAnswer = function () use ($number1, $operation, $number2) {
            switch ($operation) {
                case '+':
                    return $number1 + $number2;
                    break;

                case '-':
                    return $number1 - $number2;
                    break;

                case '*':
                    return $number1 * $number2;
                    break;

                default:
                    return '';
            }
        };

        return ['question' => "{$number1} {$operation} {$number2}", 'correctAnswer' => $correctAnswer()];
    };

    startPlay($description, $funcTask);
}
