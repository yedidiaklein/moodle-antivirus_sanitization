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
 * Antivirus scanner for the antivirus_sanitization plugin.
 *
 * @package   antivirus_sanitization
 * @copyright  2024 Yedidia Klein, OpenApp LTD.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace antivirus_sanitization;

/**
 * Antivirus scanner for the antivirus_sanitization plugin.
 */
class scanner extends \core\antivirus\scanner {

    /**
     * Checking if plugin is confgiured and if directories exists.
     */
    public function is_configured() {
        // Check if the clean and dirty directories exists.
        if (!is_dir($this->get_config('cleanpath'))) {
            debugging('Clean directory does not exist.');
            return false;
        }
        if (!is_dir($this->get_config('dirtypath'))) {
            debugging('Dirty directory does not exist.');
            return false;
        }
        return true;
    }

    /**
     * Scanning a file using the sanitization scanner tool.
     *
     * @param string $file The full path to the file to scan.
     * @param string $filename The real name of the file to scan.
     * @throws \core\antivirus\scanner_exception If a virus is found.
     */
    public function scan_file($file, $filename) {
        if (!is_readable($file)) {
            // This should not happen.
            debugging('File is not readable.');
            return;
        }

        // Execute the scan using the fictitious sanitization tool.
        // In this case the tool returns:
        // - 0 if no virus is found
        // - 1 if a virus was found
        // - [int] on error.
        $return = $this->scan_file_using_sanitization_scanner_tool($file, $filename);

        if ($return == 0) {
            // Perfect, no problem found, file is clean.
            return;
        } else if ($return == 1) {
            // Infection found.
            if ($deleteinfected) {
                unlink($file);
            }
            throw new \core\antivirus\scanner_exception(
                get_string('virusfound', 'antivirus_sanitization', $filename),
                '',
                ['filename' => $filename]
            );
        } else {
            // Unknown problem.
            debugging('Error occurred during file scanning.');
            return;
        }
    }

    /**
     * Scanning a file using the sanitization scanner tool.
     *
     * @param string $file The full path to the file to scan.
     * @param string $filename The real name of the file to scan.
     * @return int The result of the scan.
     */
    public function scan_file_using_sanitization_scanner_tool($file, $filename): int {
        // Scanning routine using antivirus own tool goes here..
        // You should choose a return value appropriate for your tool.
        // These must match the expected values in the scan_file() function.
        // In this example the following are returned:
        // - 0: No virus found
        // - 1: Virus found.
        global $CFG;
        debugging("Scanning file $file");
        debugging("copying to dirty dir $file");
        copy($file, $this->get_config('dirtypath') . '/' . $filename);
        // Waiting for the file to appear in the clean directory.
        $timeout = $this->get_config('timeout');
        $start = time();
        while (!file_exists($this->get_config('cleanpath') . '/' . $filename)) {
            $now = time();
            if ($now - $start > $timeout) {
                // File didn't appear in clean directory after timeout.
                debugging("Virus found in file $file !!, time is $now started at $start");
                return 1;
            }
            sleep(1);
        }
        // Make sure that file arrived to clean directory.
        if (file_exists($this->get_config('cleanpath') . '/' . $filename)) {
            file_put_contents($CFG->dataroot . '/sanitization.log', "Virus not found in file $filename\n", FILE_APPEND);
            // Copy clean file to original location.
            copy($this->get_config('cleanpath') . '/' . $filename, $file);
            // Delete the file from clean directory.
            unlink($this->get_config('cleanpath') . '/' . $filename);
            return 0;
        }
    }
}
