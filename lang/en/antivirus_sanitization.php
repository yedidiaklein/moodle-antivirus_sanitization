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

$string['pluginname']= 'Sanitization antivirus';
$string['configcleanpath'] = 'Path to clean directory';
$string['cleanpath'] = 'Define full path to clean directory';
$string['configdirtypath'] = 'Path to dirty directory';
$string['dirtypath'] = 'Define full path to dirty directory';
$string['timeout'] = 'Timeout';
$string['configtimeout'] = 'Define timeout for scan to finish';
$string['virusfound'] = 'Virus found in file {$a}';