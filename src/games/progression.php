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
    return getRandomNumber($maxNumber);
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

    $number = 0;

    $funcTask = function () use (&$number) {
        $startNumber = getRandomNumber(100);
        $stepProgression = getRandomStepProgression(20);
        $seq = getSequence($startNumber, $stepProgression);
        $keyFoundNumber = array_rand($seq);
        $number = $seq[$keyFoundNumber];
        $seq[$keyFoundNumber] = '..';
        return implode(' ', $seq);
    };

    $funcCorrectAnswer = function () use (&$number) {
        return $number;
    };

    startPlay($description, $funcTask, $funcCorrectAnswer);
}
