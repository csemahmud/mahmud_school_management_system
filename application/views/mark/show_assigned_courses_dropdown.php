<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
                    
<div class="control-group">
    <label class="control-label" for="selectError3">Select   Course : </label>
    <div class="controls">
        <select name="course" required="required" exclude=" " onchange="show_examinee_grid()" id="course">
            <option value=" ">---Select   Course---</option>
            <?php foreach ($assigned_courses as $v_course){ ?>
            <option value="<?php echo $v_course->course; ?>"><?php echo $course_name[$v_course->course]; ?></option>
            <?php } ?>
        </select>
    </div>
</div>
