<?php
namespace Quaff\Transports;

use Quaff\Transports\Buffers\passthru as buffer;
use Quaff\Transports\JSON\passthru as reader;
use Quaff\Transports\Stream\Stream;

/**
 * Convenience transport with a passthru buffer and a json reader.
 *
 * @package Quaff\Transports
 */
class JSON extends Stream  {
	use buffer;
	use reader;
}