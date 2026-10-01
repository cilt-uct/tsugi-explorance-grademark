<?php

$REGISTER_LTI2 = array(
    "name" => "Explorance GradeMark",
    "FontAwesome" => "fas fa-user-check",
    "short_name" => "GradeMark",
    "description" => "Based on Explorance evaluations assign a grade to an Amathuba course.",
    "messages" => array("launch", "launch_grade"),
    "privacy_level" => "anonymous",  // anonymous, name_only, public
    "license" => "Apache License 2.0",
    "tool_phase" => "new",
    "languages" => array(
        "English"
    ),
    "analytics" => array(
        "internal"
    ),
    "source_url" => "https://github.com/cilt-uct/tsugi-explorance-grademark",
    // For now Tsugi tools delegate this to /lti/store
    "placements" => array(
        /*
        "course_navigation", "homework_submission",
        "course_home_submission", "editor_button",
        "link_selection", "migration_selection", "resource_selection",
        "tool_configuration", "user_navigation"
        */
    ),
    "screen_shots" => array(
        // "store/screen-03.png",
        // "store/screen-analytics.png"
    )
);
