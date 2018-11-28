<?php
/**
 * User: li0n0k
 * Date: 28.11.18
 * Time: 10:07
 */

namespace Project1;

function findSimpleDividers($number)
{
    $iter = function ($acc, $currDiv) use ($number, &$iter) {
        if ($number === $currDiv) {
            return $acc;
        }
        if (($number % $currDiv) === 0) {
            $acc[] = $currDiv;
        }
        $currDiv++;
        return $iter($acc, $currDiv);
    };

    return $iter([], 2);
}

function startGameGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $number1 = 0;
    $number2 = 0;

    $funcTask = function () use (&$number1, &$number2) {
        $number1 = getRandomNumber();
        $number2 = getRandomNumber();

        return "{$number1} {$number2}";
    };

    $funcCorrectAnswer = function () use (&$number1, &$number2) {
        $simpleDivNumber1 = findSimpleDividers($number1);
        $simpleDivNumber2 = findSimpleDividers($number2);
        $equalDividers = array_intersect($simpleDivNumber1, $simpleDivNumber2);

        return array_reduce($equalDividers, function ($acc, $item) {
            return $acc * $item;
        }, 1);
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
