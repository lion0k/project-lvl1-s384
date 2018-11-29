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
        $number = $seq[$keyFoundNumber];
        $seq[$keyFoundNumber] = '..';

        return ['question' => implode(' ', $seq), 'correctAnswer' => $number];
    };

    startPlay($description, $funcTask);
}
