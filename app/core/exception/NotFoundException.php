<?php

namespace app\core\exception;

class NotFoundException extends \Exception {
	public function __construct($entity) {
		parent::__construct($entity . " Not found", 404);
	}
}