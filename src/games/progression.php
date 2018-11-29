<?php
/**
 * User: li0n0k
 * Date: 28.11.18
 * Time: 13:28
 */

namespace Project1;

const MAX_LENGTH_SEQUENCE = 10;

function getRandomStepProgression($maxNumber)
{
    return getRandomNumber(1, $maxNumber);
}

function getSequence($startNumber, $stepSeq, $lengthSeq = MAX_LENGTH_SEQUENCE)
{
    $iter = function ($acc, $currStep, $number) use (&$iter, $stepSeq, $lengthSeq) {
        if ($currStep === $lengthSeq) {
            return array_reverse($acc);
        }
        $currNumber = $number - $stepSeq;
        $acc[] = $currNumber;
        $currStep++;

        return $iter($acc, $currStep, $currNumber);
    };

    return $iter([], 0, $startNumber);
}

function startGameProgression()
{
    $description = 'What number is missing in the progression?';

    $funcTask = function () {
        $startNumber = getRandomNumber();
        $stepProgression = getRandomStepProgression(10);
        $seq = getSequence($startNumber, $stepProgression);
        $keyFoundNumber = array_rand($seq);
        $seq[$keyFoundNumber] = '..';
        return implode(' ', $seq);
    };

    $funcCorrectAnswer = function ($task) {
        $seq = explode(' ', $task);
        $keyEmpty = array_search('..', $seq);
        if (isset($seq[$keyEmpty + 1]) && isset($seq[$keyEmpty - 1])) {
            return (($seq[$keyEmpty + 1] - $seq[$keyEmpty - 1]) / 2 + $seq[$keyEmpty - 1]);
        }
        if (! isset($seq[$keyEmpty + 1])) {
            return (($seq[$keyEmpty - 1] - $seq[$keyEmpty - 2]) + $seq[$keyEmpty - 1]);
        } else {
            return ($seq[$keyEmpty + 1] - ($seq[$keyEmpty + 2] - $seq[$keyEmpty + 1]));
        }
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
