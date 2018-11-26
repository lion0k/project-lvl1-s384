<?php
/**
 * User: li0n0k
 * Date: 26.11.18
 * Time: 19:09
 */

namespace Project1;

use function cli\line;

class BrainEven
{
    private $namePlayer;
    private $answerPlayer;
    private $currentNumber;
    private $rightAnswer;

    public function __construct()
    {
        line('Welcome to the Brain Game!');
        line('Answer "yes" if number even otherwise answer "no".' . PHP_EOL);
        $this->namePlayer = \cli\prompt('May I have your name?');
        line("Hello, %s!\n", $this->namePlayer);
    }

    public function startGame()
    {
        for ($i = 0; $i < 3; $i++) {
            $this->getRandomNumber();
            $this->question();
            $this->getRightAnswer();
            
            if (! $this->checkResult()) {
                $this->wrongAnswer();
                exit;
            }
            
            $this->success();
        }

        $this->endGame();
    }

    public function getRandomNumber()
    {
        $this->currentNumber = rand(1, 100);
    }

    public function question()
    {
        line("Question: {$this->currentNumber}");
        $this->answerPlayer = strtolower(\cli\prompt('Your answer'));
    }

    public function getRightAnswer()
    {
        $this->rightAnswer = ($this->currentNumber % 2 === 0) ? 'yes' : 'no';
    }

    public function checkResult()
    {
        if (preg_match('/^(yes|no)?$/', $this->answerPlayer) > 0) {
            return ($this->rightAnswer === $this->answerPlayer) ? true : false;
        }
        return false;
    }

    public function wrongAnswer()
    {
        line("'{$this->answerPlayer}' is wrong answer ;(. Correct answer was '{$this->rightAnswer}'.");
        line("Let's try again, {$this->namePlayer}!");
    }

    public function success()
    {
        line('Correct!');
    }

    public function endGame()
    {
        line("Congratulations, {$this->namePlayer}!");
    }
}
