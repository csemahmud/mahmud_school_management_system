<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
            <?php //if(isset($all_students)){ 
                if(count($assigned_courses)>0){?>
            <div class="row-fluid">
                <div class="span4"><h5>Course</h5></div>
                <div class="span4"><h5>Publication   Status</h5></div>
                <div class="span4"><h5>Action</h5></div>
            </div>                   
            <?php 
            $i = 0;
            foreach ($assigned_courses as $v_course) {
                
                ?>
                <div class="row-fluid">
                    <div class="span4"><h6><?php echo $course_name[$v_course->assign_course_id]; ?></h6></div>
                    <div class="span4"><h6><?php echo $publication_status[$i]; ?></h6></div>
                    
                    <div class="span4"><h6>
                            <a href="<?php echo base_url(); ?>samsung_mr_controller/view_marks_details/<?php echo $v_course->year; ?>/<?php echo $v_course->term; ?>/<?php echo $v_course->class; ?>/<?php echo $v_course->course; ?>">View   Details</a>
                            </h6></div>
                </div>                   
            <?php $i++;} ?>
<!--
<div class="pagination">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div>
-->

            <?php }
            
                else {
                    echo '<h1>No   Courses   to   show</h1>';
                }
            /*}
            else {
                echo '<h3>Select   Class   at  first</h3>';
            }*/
            ?>
