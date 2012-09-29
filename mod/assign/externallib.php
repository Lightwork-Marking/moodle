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
 * External assign API
 *
 * @package    mod_assign
 * @since      Moodle 2.3
 * @copyright  2012 Paul Charsley
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->libdir/externallib.php");

/**
 * Assign functions
 */
class mod_assign_external extends external_api {
    
    public static function export_submissions_parameters() {
        return new external_function_parameters(
            array(
                'assignmentid'   => new external_value(PARAM_INT, 'assignment id'),
                'submissionids'  => new external_multiple_structure(new external_value(PARAM_INT, 'submission id'), VALUE_OPTIONAL),
            	'status'		 => new external_value(PARAM_TEXT, 'status', VALUE_OPTIONAL)
            )
        );
        
    }
    
    public static function export_submissions($assignmentid, $submissionids, $status) {
        $params = self::validate_parameters(self::get_submission_files_parameters(),
                array('assignmentid' => $assignmentid, 'submissionids' => $submissionids, 'status' => $status));
        error_log('get_submission_files() - params: ' . var_export($params, TRUE));
        
//         $this->generate_submissions_file($assignmentid, $submissionids, $status);
		/*
		 * The logic flow should be:
		 * 1. Check whether the user has access privilege to the $assignmentid
		 * 2. If has access, lookup all submitted files in $submissionids
		 * 3. Arrange the file in structure as recognized by moodle
		 * 4. zip them into single file for download
		 * 5. Send it off
		 */
    	if ($this->has_valid_privilege($assignmentid)) {
    		
    	}
    	 
        $result = array();
        $result['filename'] = $filename;
        $result['path'] = '/moodle/moodledata' . $filename;
        $result['tempfile'] = true;
        
        return $result;
    }
    
    public static function export_submissions_returns() {
        return new external_file();
    }
       
    private static function has_valid_privilege($assignmentid) {
    	
    }
}