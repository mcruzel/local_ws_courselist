<?php
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");

use local_ws_courselist\tools;
use local_ws_courselist\exceptions\course_not_found_exception;

class local_ws_courselist_external extends external_api {

    public static function get_courses_parameters() {
        return new external_function_parameters([]);
    }

    public static function get_courses() {
        global $DB;

        // Check permissions and context
        $context = context_system::instance();
        tools::validate_course_access($context);

        // Retrieve visible courses with their categoryid
        $courses = tools::get_visible_courses();

        if (!$courses) {
            throw new course_not_found_exception();
        }

        $result = [];
        foreach ($courses as $course) {
            $result[] = [
                'id' => $course->id,
                'fullname' => $course->fullname,
                'shortname' => $course->shortname,
                'categoryid' => $course->category,
            ];
        }
        return $result;
    }

    public static function get_courses_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                [
                    'id' => new external_value(PARAM_INT, 'Course ID'),
                    'fullname' => new external_value(PARAM_TEXT, 'Full name of the course'),
                    'shortname' => new external_value(PARAM_TEXT, 'Short name of the course'),
                    'categoryid' => new external_value(PARAM_INT, 'Category ID of the course'),
                ]
            )
        );
    }
}
