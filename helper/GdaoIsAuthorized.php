<?php
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

class GdaoIsAuthorized extends AbstractHelper {

    public function __invoke() {

	    // Our production sits behind a cache so needs to check headers
	    $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'], 1) : array("");
	    $ip = trim($ip[0]);

	    // Our development has no cache and needs to check client IP
	    if ($ip == '') {
        	$ip = $_SERVER['REMOTE_ADDR'];
    	}

	    if ($this->startsWith($ip, '128.114.') || $this->startsWith($ip, '169.233.')) {
	    	return true;
	    }

	    return false;
	}

	private function startsWith($haystack, $needle) {
    	$length = strlen($needle);
    	return (substr($haystack, 0, $length) === $needle);
	}
}
