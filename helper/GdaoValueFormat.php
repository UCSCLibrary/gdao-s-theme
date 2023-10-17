<?php
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

class GdaoValueFormat extends AbstractHelper {

    public function __invoke($value) {

        if ($this->endsWith($value, '-00-00T00:00:00Z')) {
			return substr($value, 0, 4);
		}
		else if ($this->endsWith($value, '-00T00:00:00Z')) {
			return substr($value, 0, 7);
		}
		else if ($this->endsWith($value, 'T00:00:00Z')) {
			return substr($value, 0, 10);
		}

		$time = strtotime($value);

		if ($time == true) {
			return date('Y-m-d', $time);
		}

		return $value;
	}

	private function endsWith($haystack, $needle) {
		$length = strlen($needle);

		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}
}
