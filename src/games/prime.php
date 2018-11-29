<?php
/**
 * User: li0n0k
 * Date: 28.11.18
 * Time: 15:10
 */

namespace Project1;

function isPrime($number)
{
    if (isEven($number)) {
        return false;
    }

    $startDivider = ceil($number / 2);
    $iter = function ($currentNumberIter) use (&$iter, $number) {
        if ($currentNumberIter == 1) {
            return true;
        }
        if (($number % $currentNumberIter) === 0) {
            return false;
        }
        $currentNumberIter--;

        return $iter($currentNumberIter);
    };

    return $iter($startDivider);
}

function startGamePrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $funcTask = function () {
        return getRandomNumber();
    };

    $funcCorrectAnswer = function ($number) {
        return (isPrime($number)) ? 'yes' : 'no';
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
