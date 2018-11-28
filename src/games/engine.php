<?php
/**
 * User: li0n0k
 * Date: 27.11.18
 * Time: 17:04
 */

namespace Project1;

const COUNT_TRY = 3;

function startPlay($description, $funcTask, $funcCorrectAnswer)
{
    $namePlayer = run($description);

    for ($i = 0; $i < COUNT_TRY; $i++) {
        $task = $funcTask();

        $answerPlayer = setQuestion($task);
        $correctAnswer = $funcCorrectAnswer($task);
        if ($answerPlayer != $correctAnswer) {
            printWrongAnswer($answerPlayer, $namePlayer, $correctAnswer);
            exit;
        }
        printSuccessAnswer();
    }
    printEndGame($namePlayer);
}
