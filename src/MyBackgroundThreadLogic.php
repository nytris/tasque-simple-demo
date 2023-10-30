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

class MyBackgroundThreadLogic
{
    public function __construct(
        private readonly int $threadId
    ) {
    }

    public function getFirst(): string
    {
        print __METHOD__ . ' (thread #' . $this->threadId . ')' . PHP_EOL;

        return 'first from background thread #' . $this->threadId;
    }

    public function getSecond(): string
    {
        print __METHOD__ . ' (thread #' . $this->threadId . ')' . PHP_EOL;

        return 'second from background thread #' . $this->threadId;
    }

    public function getThird(): string
    {
        print __METHOD__ . ' (thread #' . $this->threadId . ')' . PHP_EOL;

        return 'third from background thread #' . $this->threadId;
    }
}
