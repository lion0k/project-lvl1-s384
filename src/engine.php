<?php
/**
 * User: li0n0k
 * Date: 27.11.18
 * Time: 17:04
 */

namespace Project1;

const COUNT_TRY = 3;

function startPlay($description, $funcTask, $countTry = COUNT_TRY)
{
    $namePlayer = run($description);

    $iter = function ($cnt = 0) use ($countTry, $namePlayer, $funcTask, &$iter) {
        if ($cnt === $countTry) {
            return true;
        }
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $funcTask();
        $answerPlayer = setQuestion($question);

        if ($answerPlayer != $correctAnswer) {
            printWrongAnswer($answerPlayer, $namePlayer, $correctAnswer);
            return false;
        }
        printSuccessAnswer();
        $cnt++;

        return $iter($cnt);
    };

    if ($iter()) {
        printEndGame($namePlayer);
    }
}

function getRandomNumber($minNumber = 1, $maxNumber = 100)
{
    return rand($minNumber, $maxNumber);
}

function isEven($number)
{
    return ($number % 2) === 0;
}
