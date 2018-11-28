<?php
/**
 * User: li0n0k
 * Date: 26.11.18
 * Time: 12:03
 */

namespace Project1;

use function cli\line;

function run($description)
{
    line('Welcome to the Brain Game!');
    line($description . PHP_EOL);
    $name = \cli\prompt('May I have your name?');
    line("Hello, {$name}!\n");

    return $name;
}

function setQuestion($question)
{
    line("Question: {$question}");
    return \cli\prompt('Your answer');
}

function printWrongAnswer($answerPlayer, $namePlayer, $correctAnswer)
{
    line("'{$answerPlayer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
    line("Let's try again, {$namePlayer}!");
}

function printSuccessAnswer()
{
    line("Correct!\n");
}

function printEndGame($namePlayer)
{
    line("Congratulations, {$namePlayer}!");
}
