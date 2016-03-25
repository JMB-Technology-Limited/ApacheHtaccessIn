<?php

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'JMBTechnologyLimited'.DIRECTORY_SEPARATOR.'ApacheHtaccessIn'.DIRECTORY_SEPARATOR.'Process.php';



$dir = isset($argv[1]) ? $argv[1] : getcwd();

if (!$dir) {
	$dir = getcwd();
}

$process = new \JMBTechnologyLimited\ApacheHtaccessIn\Process($dir);

print $process->getOutput();

