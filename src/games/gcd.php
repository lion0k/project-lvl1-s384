<?php
/**
 * User: li0n0k
 * Date: 28.11.18
 * Time: 10:07
 */

namespace Project1;

function findGcd($number1, $number2)
{
    if ($number1 % $number2) {
        return findGcd($number2, $number1 % $number2);
    } else {
        return $number2;
    }
}

function startGameGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $funcTask = function () {
        $number1 = getRandomNumber();
        $number2 = getRandomNumber();

        return "{$number1} {$number2}";
    };

    $funcCorrectAnswer = function ($question) {
        list($number1, $number2) = explode(' ', $question);

        return findGcd($number1, $number2);
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
