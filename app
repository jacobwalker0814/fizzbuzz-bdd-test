#!/usr/bin/env php
<?php
// vim: filetype=php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new \JacobWalker0814\Commands\FizzBuzz());
$application->run();
