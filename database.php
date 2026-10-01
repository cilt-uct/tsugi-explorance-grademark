<?php

// The SQL to uninstall this tool
$DATABASE_UNINSTALL = array(
);

// The SQL to create the tables if they don't exist
$DATABASE_INSTALL = array(
    // array( "{$CFG->dbprefix}gradebook_upload",
    //        "CREATE TABLE {$CFG->dbprefix}gradebook_upload (
    //         `id` BIGINT NOT NULL AUTO_INCREMENT,
    //         `link_id` INT NOT NULL,
    //         `site_id` INT NOT NULL,
    //         `gradebook_id` INT,
    //         `gradebook_name` VARCHAR(255),
    //         `scheduled_date` DATETIME,
    //         `status` enum('init','waiting','running','done','failed') NOT NULL DEFAULT 'init',
    //         `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    //         `created_by` int NOT NULL DEFAULT '0',
    //         `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //         `modified_by` int DEFAULT NULL,
    //         PRIMARY KEY (`id`),
    //         INDEX `idx_link_id` (`link_id` ASC),
    //         INDEX `idx_user_id` (`user_id` ASC),
    //         INDEX `idx_gradebook_id` (`gradebook_id` ASC),
    //         INDEX `idx_scheduled_date` (`scheduled_date` ASC),
    //         INDEX `idx_status` (`status` ASC));")
);

$DATABASE_UPGRADE = function($oldversion) {
    global $CFG, $PDOX;

    return 202610011401;
};