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
use block_task_oriented_groups\Intelligences;

$PAGE->set_pagelayout('standard');
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('intelligences_title', 'block_task_oriented_groups'));
$PAGE->set_heading(get_string('intelligences_heading', 'block_task_oriented_groups'));
$PAGE->set_url($CFG->wwwroot . '/blocks/task_oriented_groups/view/intelligences.php');
$PAGE->add_body_class('block_task_oriented_group');

require_login();
$intelligences = Intelligences::getIntelligencesOfCurrentUser();
echo $OUTPUT->header();
?>
<div class="container">
	<div class="row">
		<p><?=get_string('intelligences_msg', 'block_task_oriented_groups')?></p>
	</div>
	<div class="row">
		<ul>
			<li><b><?=get_string('intelligences_verbal_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->verbal)?></li>
			<li><b><?=get_string('intelligences_logic_mathematics_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->logic_mathematics)?></li>
			<li><b><?=get_string('intelligences_visual_spatial_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->visual_spatial)?></li>
			<li><b><?=get_string('intelligences_kinestesica_corporal_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->kinestesica_corporal)?></li>
			<li><b><?=get_string('intelligences_musical_rhythmic_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->musical_rhythmic)?></li>
			<li><b><?=get_string('intelligences_intrapersonal_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->intrapersonal)?></li>
			<li><b><?=get_string('intelligences_interpersonal_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->interpersonal)?></li>
			<li><b><?=get_string('intelligences_naturalist_environmental_factor', 'block_task_oriented_groups')?>:</b>&nbsp;<?=Intelligences::valueToString($intelligences->naturalist_environmental)?></li>
		</ul>
	</div>
	<div class="row justify-content-md-center">
		<a
			class="btn btn-primary"
			href="<?=$CFG->wwwroot . '/blocks/task_oriented_groups/view/intelligences_test.php'?>"
			role="button"
		><?=get_string('intelligences_go_to_test', 'block_task_oriented_groups')?></a>
	</div>
</div>
<?php
echo $OUTPUT->footer();