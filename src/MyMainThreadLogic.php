<?php

/*
 * A simple demonstration of Tasque.
 *
 * https://github.com/nytris/tasque-simple-demo/
 *
 * Released under the MIT license.
 * https://github.com/nytris/tasque-simple-demo/raw/main/MIT-LICENSE.txt
 */

namespace App;

class MyMainThreadLogic
{
    public function getFirst(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'first from main thread';
    }

    public function getSecond(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'second from main thread';
    }

    public function getThird(): string
    {
        print __METHOD__ . PHP_EOL;

        return 'third from main thread';
    }
}
