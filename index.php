<?php

/*
 * A simple demonstration of Tasque.
 *
 * https://github.com/nytris/tasque-simple-demo/
 *
 * Released under the MIT license.
 * https://github.com/nytris/tasque-simple-demo/raw/main/MIT-LICENSE.txt
 */

declare(strict_types=1);

use App\MyBackgroundThreadLogic;
use App\MyMainThreadLogic;
use Tasque\Tasque;

require_once __DIR__ . '/vendor/autoload.php';

$tasque = new Tasque();

$backgroundThread1 = $tasque->createThread(
    function () {
        $bgThreadLogic = new MyBackgroundThreadLogic(1);

        return $bgThreadLogic->getFirst() . ' ' . $bgThreadLogic->getSecond() . ' ' . $bgThreadLogic->getThird();
    }
);
$backgroundThread1->start();

$backgroundThread2 = $tasque->createThread(
    function () {
        $bgThreadLogic = new MyBackgroundThreadLogic(2);

        return $bgThreadLogic->getFirst() . ' ' . $bgThreadLogic->getSecond() . ' ' . $bgThreadLogic->getThird();
    }
);
$backgroundThread2->start();

$mainThreadLogic = new MyMainThreadLogic();

$mainThreadResult = $mainThreadLogic->getFirst() . ' ' . $mainThreadLogic->getSecond() . ' ' . $mainThreadLogic->getThird();

// Wait for the background threads to complete and capture their results.
$backgroundThread1->join();
$bgThread1Result = $backgroundThread1->getReturn();
$backgroundThread2->join();
$bgThread2Result = $backgroundThread2->getReturn();

print 'Main thread result: "' . $mainThreadResult . '"' . PHP_EOL;
print 'Background thread #1 result: "' . $bgThread1Result . '"' . PHP_EOL;
print 'Background thread #2 result: "' . $bgThread2Result . '"' . PHP_EOL;
