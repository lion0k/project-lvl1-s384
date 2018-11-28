<?php
/**
 * User: li0n0k
 * Date: 28.11.18
 * Time: 15:10
 */

namespace Project1;

// В диапазоне 1-100 всего 25% простых чисел, пусть минимум 1 простое
// число попадает в выборку пользователю, заскучает же.

// In the range of 1-100, only 25% of primes, let at least 1 simple
// the number is sampled by the user

function getFirstlyPrimeNumber()
{
    $startRandNumber = getRandomNumber(2, 97);
    $iter = function ($number, $div) use (&$iter) {
        if ($div === $number) {
            return $div;
        }
        if (($number % $div) === 0) {
            return $iter(--$number, 2);
        } else {
            return $iter($number, ++$div);
        }
    };

    return $iter($startRandNumber, 2);
}

function prepareNumbers()
{
    $numbers[] = getRandomNumber();
    $numbers[] = getRandomNumber();
    $numbers[] = getFirstlyPrimeNumber();
    shuffle($numbers);
    return $numbers;
}

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

    $numbers = prepareNumbers();

    $funcTask = function () use (&$numbers) {
        return array_pop($numbers);
    };

    $funcCorrectAnswer = function ($number) {
        return (isPrime($number)) ? 'yes' : 'no';
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
