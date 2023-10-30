# Tasque Demo

A demo of using [Tasque][1] to run PHP background [green threads][2] concurrently.

## Usage
Install with Composer:

```shell
$ composer install
```

and execute the test script, for example via the CLI SAPI:

```shell
php index.php
```

The output should then demonstrate pre-emptive context switches between threads:

```
$ php index.php
App\MyMainThreadLogic::getFirst
App\MyMainThreadLogic::getSecond
App\MyBackgroundThreadLogic::getFirst (thread #1)
App\MyBackgroundThreadLogic::getFirst (thread #2)
App\MyMainThreadLogic::getThird
App\MyBackgroundThreadLogic::getSecond (thread #1)
App\MyBackgroundThreadLogic::getSecond (thread #2)
App\MyBackgroundThreadLogic::getThird (thread #1)
App\MyBackgroundThreadLogic::getThird (thread #2)
Main thread result: "first from main thread second from main thread third from main thread"
Background thread #1 result: "first from background thread #1 second from background thread #1 third from background thread #1"
Background thread #2 result: "first from background thread #2 second from background thread #2 third from background thread #2"
```

[1]: https://github.com/nytris/tasque
[2]: https://en.wikipedia.org/wiki/Green_thread
