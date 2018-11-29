<?php
/**
 * User: li0n0k
 * Date: 26.11.18
 * Time: 19:09
 */

namespace Project1;

function startGameEven()
{
    $description = 'Answer "yes" if number even otherwise answer "no".';

    $funcTask = function () {
        $number = getRandomNumber(1, 50);
        $correctAnswer = function () use ($number) {
            return (isEven($number)) ? 'yes' : 'no';
        };

        return ['question' => $number, 'correctAnswer' => $correctAnswer()];
    };

    startPlay($description, $funcTask);
}
