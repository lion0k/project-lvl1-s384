<?php
/**
 * User: li0n0k
 * Date: 27.11.18
 * Time: 17:04
 */

namespace Project1;

const COUNT_TRY = 3;

function startPlay($description, $funcTask, $funcCorrectAnswer, $countTry = COUNT_TRY)
{
    $namePlayer = run($description);

    $iter = function ($cnt = 0) use ($countTry, $namePlayer, $funcTask, $funcCorrectAnswer, &$iter) {
        if ($cnt === $countTry) {
            return true;
        }
        $task = $funcTask();
        $answerPlayer = setQuestion($task);
        $correctAnswer = $funcCorrectAnswer($task);

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

function getRandomNumber($maxNumber)
{
    return rand(1, $maxNumber);
}
