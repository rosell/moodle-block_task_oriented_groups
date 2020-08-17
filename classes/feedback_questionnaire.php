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
 * Data model for the feedback questionnaire.
 *
 * @package block_tog
 * @copyright 2018 - 2020 UDT-IA, IIIA-CSIC
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_tog;

defined( 'MOODLE_INTERNAL' ) || die();

/**
 * Class that represents the feedback questionnaire.
 *
 * @copyright 2018 - 2020 UDT-IA, IIIA-CSIC
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class feedback_questionnaire {

    /**
     * The number maximum of questions that form the questionnary.
     *
     * @var integer
     */
    const MAX_QUESTIONS = 4;

    /**
     * The number maximum of posible answers for each question.
     *
     * @var integer
     */
    const MAX_QUESTION_ANSWERS = 3;

    /**
     * Load user answers.
     */
    public function __construct() {
    }

    /**
     * Return the text associated to the question.
     *
     * @param int $index
     *            of the question to get the text.
     *
     * @return string the localized text for the question at the specified index.
     */
    public static function get_question_text_of($index) {
        return get_string( 'feedback_question_' . $index, 'block_tog' );
    }

    /**
     * Return the text associated to the specified answers in the question.
     *
     * @param int $index
     *            of the answer to get the text.
     *
     * @return string the localized text for the answer at the specified index.
     */
    public static function get_answer_question_text_of($index) {
        return get_string( 'feedback_question_answer_' . $index, 'block_tog' );
    }

    /**
     * Return the value associated to the specified answers in the question.
     *
     * @param int $index
     *            of the answer to get the value.
     *
     * @return double the value associated to teh answer at the specified index.
     */
    public static function get_answer_question_value_of($index) {
        switch ($index) {
            case 0 :
                return - 1;
            case 1 :
                return 0;
            default :
                return 1;
        }
    }
}
