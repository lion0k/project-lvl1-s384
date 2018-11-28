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
        return rand(1, 50);
    };

    $funcCorrectAnswer = function ($number) {
        return (isEven($number)) ? 'yes' : 'no';
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
