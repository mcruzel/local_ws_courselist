<?php
namespace local_ws_courselist;

defined('MOODLE_INTERNAL') || die();

class tools {

    public static function validate_course_access($context) {
        self::validate_context($context);
        require_capability('moodle/course:view', $context);
    }

    public static function get_visible_courses() {
        global $DB;

        // Retrieve only visible courses with their categories
        return $DB->get_records_select('course', 'visible = 1', null, '', 'id, fullname, shortname, category');
    }
}
