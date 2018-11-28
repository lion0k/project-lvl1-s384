<?php
/**
 * User: li0n0k
 * Date: 27.11.18
 * Time: 17:49
 */

namespace Project1;

function getRandomNumber()
{
    return rand(1, 10);
}

function getRandomOperation()
{
    $operation = ['+', '-', '*'];
    return $operation[array_rand($operation)];
}

function startGameCalc()
{
    $description = 'What is the result of the expression?';

    $number1 = 0;
    $number2 = 0;
    $operation = '';

    $funcTask = function () use (&$number1, &$number2, &$operation) {
        $number1 = getRandomNumber();
        $number2 = getRandomNumber();
        $operation = getRandomOperation();
        return "{$number1} {$operation} {$number2}";
    };

    $funcCorrectAnswer = function () use (&$number1, &$number2, &$operation) {
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
