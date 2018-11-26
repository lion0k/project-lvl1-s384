<?php
/**
 * User: li0n0k
 * Date: 26.11.18
 * Time: 12:03
 */

namespace Project1;

use function cli\line;

function run()
{
    line('Welcome to the Brain Game!' . PHP_EOL);
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
}
