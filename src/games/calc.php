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
        return "{$number1} {$operation} {$number2}";
    };

    $funcCorrectAnswer = function ($question) {
        list($number1, $operation, $number2) = explode(' ', $question);
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

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
