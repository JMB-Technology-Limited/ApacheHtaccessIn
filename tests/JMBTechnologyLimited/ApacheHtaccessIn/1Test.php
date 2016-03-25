<?php


namespace JMBTechnologyLimited\ApacheHtaccessIn;

/**
 * A Basic test
 *
 * @package JMBTechnologyLimited\ApacheHtaccessIn
 * @link https://github.com/JMB-Technology-Limited/ApacheHtaccessIn
 * @license https://raw.github.com/JMB-Technology-Limited/ApacheHtaccessIn/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 * @author James Baster <james@jmbtechnology.co.uk>
 */
class Test1  extends \PHPUnit_Framework_TestCase {

	function test1() {

		$process = new Process(__DIR__.DIRECTORY_SEPARATOR.'1');
		$out = $process->getOutput();

		$dir = realpath(__DIR__);

		$expected =
			"<DIRECTORY ".$dir."/1>\n".
			"CATS\n".
			"</DIRECTORY>\n".
			"<DIRECTORY ".$dir."/1/dir_a>\n".
			"DOGS\n".
			"</DIRECTORY>\n";

		$this->assertEquals($expected, $out);

	}

}

