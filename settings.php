<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin settings for the antivirus_sanitization plugin.
 *
 * @package   antivirus_sanitization
 * @copyright 2024, Yedidia Klein, OpenApp LTD.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if ($ADMIN->fulltree) {
    //clean path
    $settings->add(
        new admin_setting_configtext(
            'antivirus_sanitization/cleanpath',
            get_string('cleanpath', 'antivirus_sanitization'),
            get_string('configcleanpath', 'antivirus_sanitization'),
            '',
        )
    );
    //dirty path
    $settings->add(
        new admin_setting_configtext(
            'antivirus_sanitization/dirtypath',
            get_string('dirtypath', 'antivirus_sanitization'),
            get_string('configdirtypath', 'antivirus_sanitization'),
            '',
        )
    );
    // timeout on wait for the scan to finish
    $settings->add(
        new admin_setting_configtext(
            'antivirus_sanitization/timeout',
            get_string('timeout', 'antivirus_sanitization'),
            get_string('configtimeout', 'antivirus_sanitization'),
            50,
            PARAM_INT
        )
    );

}