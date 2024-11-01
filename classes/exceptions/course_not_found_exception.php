<?php
namespace local_ws_courselist\exceptions;

defined('MOODLE_INTERNAL') || die();

class course_not_found_exception extends \moodle_exception {
    public function __construct() {
        parent::__construct('coursenotfound', 'local_ws_courselist', '', null, 'Course not found');
    }
}
