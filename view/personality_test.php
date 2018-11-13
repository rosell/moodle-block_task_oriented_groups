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
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.
require_once ('../../../config.php');
use block_task_oriented_groups\PersonalityQuestionnaire;

$PAGE->set_pagelayout('standard');
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('personality_test_title', 'block_task_oriented_groups'));
$PAGE->set_heading(get_string('personality_test_heading', 'block_task_oriented_groups'));
$PAGE->set_url($CFG->wwwroot . '/blocks/task_oriented_groups/view/personality_test.php');

require_login();
$answers = $DB->get_records('btog_personality_answers', array('userid' => $USER->id
), 'question', 'question,answer');
echo $OUTPUT->header();
?>
<div class="container personality-questions">
	<?php
for ($i = 0; $i < PersonalityQuestionnaire::countQuestions(); $i++) {
    $questionId = 'personalityQuestion_' . $i;
    ?>
		<div class="row personality-question<?php

    if ($i % 2 != 0) {
        echo ' bg-light';
    }
    ?>">
		<div class="container">
			<div class="row">
				<h4><?=PersonalityQuestionnaire::getQuestionTextOf($i)?><?php

    if (PersonalityQuestionnaire::hasQuestionHelp($i)) {
        echo '&nbsp;&nbsp;';
        echo $OUTPUT->help_icon(PersonalityQuestionnaire::getQuestionHelpIdentifier($i),
                'block_task_oriented_groups', '');
    }
    ?></h4>
			</div>
			<div class="row justify-content-center">
		<?php
    $selected = -1;
    foreach ($answers as $k => $answer) {
        if ($answer->question == $i) {
            $selected = $answer->answer;
            unset($answers[$k]);
            break;
        }
    }

    for ($j = 0; $j < PersonalityQuestionnaire::MAX_QUESTION_ANSWERS; $j++) {
        ?>
			<div class="form-check-inline col-md">
					<input
						class="form-check-input"
						type="radio"
						id="answer_<?=$j?>_for_personality_question_<?=$i?>"
						name="<?=$questionId?>"
						value="<?=PersonalityQuestionnaire::getAnswerQuestionValuetOf($i,$j)?>"
						<?php

        if ($selected == $j) {
            echo 'checked="checked"';
        }
        ?>
					><label
						class="form-check-label"
						for="answer_<?=$j?>_for_personality_question_<?=$i?>"
					><?=PersonalityQuestionnaire::getAnswerQuestionTextOf($i,$j)?></label>
				</div>
		<?php
    }
    ?>
			</div>
		</div>
	</div>
		<?php
}
?>

</div>
<?php
$PAGE->requires->js_call_amd('block_task_oriented_groups/personality_test', 'initialise');
echo $OUTPUT->footer();