<?php

namespace JMBTechnologyLimited\ApacheHtaccessIn;


/**
 *
 * @link https://github.com/JMB-Technology-Limited/ApacheHtaccessIn
 * @license https://raw.github.com/JMB-Technology-Limited/ApacheHtaccessIn/master/LICENSE.txt 3-clause BSD
 * @copyright (c) JMB Technology Limited, http://jmbtechnology.co.uk/
 * @author James Baster <james@jmbtechnology.co.uk>
 */
class Process {

	protected $directory;

	protected $output = null;

	function __construct( $directory ) {
		$this->directory = $directory;
	}

	protected function process() {
		if (!is_null($this->output)) {
			return false;
		}
		$this->output = '';
		$this->processDir($this->directory);
	}

	protected function processDir($dir) {
		foreach(scandir($dir) as $file) {
			if ($file == '.htaccess' && realpath($dir)) {
				$this->output .=
					'<DIRECTORY '.realpath($dir).'>'."\n".
			        file_get_contents($dir . DIRECTORY_SEPARATOR . $file).
			        "\n</DIRECTORY>\n";
			}
			if ($file != '.' && $file != '..' && is_dir($dir . DIRECTORY_SEPARATOR . $file)) {
				$this->processDir($dir . DIRECTORY_SEPARATOR . $file);
			}
		}
	}

	public function getOutput() {
		$this->process();
		return $this->output;
	}


}