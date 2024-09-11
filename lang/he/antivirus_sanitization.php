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

$string['pluginname']= 'אנטיוירוס הלבנה';
$string['configcleanpath'] = 'הגדירו נתיב מלא לתיקיית נקיון'; 
$string['cleanpath'] = 'נתיב לתיקיית נקיון'; 
$string['configdirtypath'] = 'הגדירו נתיב מלא לתיקיית מלוכלכת';
$string['dirtypath'] = 'נתיב לתיקיית מלוכלכת';
$string['timeout'] = 'זמן המתנה';
$string['configtimeout'] = 'הגדירו את זמן ההמתנה המקסימלי לחזרת קבצים ממערכת ההלבנה';
$string['virusfound'] = 'קיים חשש לוירוס בקובץ {$a}';