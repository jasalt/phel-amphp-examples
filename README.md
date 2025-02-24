# PHP Fibers & AMPHP testing with [Phel](https://phel-lang.org/)

Testing how concurrency with [PHP 8.1 Fibers](https://wiki.php.net/rfc/fibers) and async libraries available in [AMPHP](https://amphp.org/) project compare to [Janet](https://janet-lang.org/docs/fibers/index.html), NodeJS and other platforms.

## Working examples
See notes in files. Tested on:

- PHP 8.2.7 (Debian 12)
- Phel v0.16.1 (dev-main)

### Hello World `src/helloworld.phel`
- https://amphp.org/installation

```
$ composer install
$ vendor/bin/phel run src/helloworld.phel
Hello World from the future!%
```

### HTTP Server `src/httpserver.phel`
- https://github.com/amphp/http-server-router/blob/2.x/examples/hello-world.php

```
$ vendor/bin/phel run src/httpserver.phel
```

Starts server at http://localhost:1337.

- Does not work in Phel REPL as stdout logger makes it exit.
- How are webservers with Clojure(Script) set up to work with REPL that allow redefining functions or live reloading on the fly?
  - Something about AMPHP HTTP server cluster hotreloading: https://amphp.org/cluster#hot-reload-in-intellij--phpstorm

## TODO
### Channels (amphp/sync)
- https://github.com/amphp/sync?tab=readme-ov-file#channels
How to represent such code with Phel?
```
[$left, $right] = createChannelPair();

$future1 = async(function () use ($left): void {
    echo "Coroutine 1 started\n";
    delay(1); // Delay to simulate I/O.
    $left->send(42);
    $received = $left->receive();
    echo "Received ", $received, " in coroutine 1\n";
});
```
### Pipeline / ConcurrentIterator (amphp/pipeline)
- https://github.com/amphp/sync?tab=readme-ov-file#approach-4-concurrentiterator
- https://github.com/amphp/pipeline

Original template repo readme continues...
# Phel Cli Skeleton

[Phel](https://phel-lang.org/) is a functional programming language that compiles to PHP. 

This repository provides you the basic setup to start coding phel.

## Getting started

### Requirements

Phel requires at least PHP 8.2 and Composer.
You can either use it from your local machine OR using docker.
  - This repository contains the basic Dockerfile to run phel.

#### Locally (no Docker)

1. Ensure you have PHP >=8.2 (Some help about how to install multiple PHP versions locally on [linux](https://github.com/phpbrew/phpbrew) and [Mac](https://github.com/shivammathur/homebrew-php))
1. Ensure you have [composer](https://getcomposer.org/composer-stable.phar)
1. Clone this repo
1. Install the dependencies | `composer install`

#### Using Docker

1. Clone this repo
1. Build the image | `docker-compose up -d --build`
1. Go inside the console | `docker exec -ti -u dev phel_cli_skeleton bash`
1. Install the dependencies | `composer install`

### Phel code

1. Write your phel code in `src/`
1. Run your code with `vendor/bin/phel run src/main.phel`

#### Or run the executable transpiled PHP result

1. `vendor/bin/phel build`
1. `php out/main.php`

#### Tests

1. Write your phel tests in `tests/`
1. Execute your tests with `./vendor/bin/phel test`

## More about starting with phel

Find more information about how to start with phel in [getting started](https://phel-lang.org/documentation/getting-started/).
