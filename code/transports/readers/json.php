<?php
namespace Quaff\Transports\JSON\Readers;

use Quaff\Interfaces\Buffer;
use Quaff\Exceptions\Transport as Exception;

trait json
{
	/**
	 * @return Buffer
	 */
	abstract public function getBuffer();
	
	abstract public function valid();
	
	abstract static public function is_ok($responseCode);
	
	/**
	 * Reads whole stream content and decodes as json.
	 *
	 * @return array
	 * @throws Exception
	 */
	public function read(&$responseCode = null)
	{
		$json = json_decode(
			$this->getBuffer()->readAll($responseCode),
			true,
			512
		);
		
		if (is_null($json) || !$this->is_ok($responseCode)) {
			$message = "Failed to load json from response raw data";
			if ($error = json_last_error()) {
				$message .= ": '$error'";
			}
			throw new Exception($message);
		}
		return $json;
	}
	
}