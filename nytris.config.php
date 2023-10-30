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

use Nytris\Boot\BootConfig;
use Nytris\Boot\PlatformConfig;
use Tasque\Core\Scheduler\ContextSwitch\NTockStrategy;
use Tasque\TasquePackage;

$bootConfig = new BootConfig(new PlatformConfig(__DIR__ . '/var/cache/nytris/'));

$bootConfig->installPackage(new TasquePackage(schedulerStrategy: new NTockStrategy(1)));

return $bootConfig;
