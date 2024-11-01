<?php
$functions = [
    'local_ws_courselist_get_courses' => [
        'classname'   => 'local_ws_courselist_external',
        'methodname'  => 'get_courses',
        'classpath'   => 'local/ws_courselist/externallib.php',
        'description' => 'Get a list of all courses on the platform, including category ID',
        'type'        => 'read',
        'capabilities'=> 'moodle/course:view,moodle/category:viewhiddencategories'
    ],
];

$services = [
    'List Courses Service' => [
        'functions' => ['local_ws_courselist_get_courses'],
        'restrictedusers' => 0,
        'enabled' => 1,
    ],
];
