<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

            <?php //if(isset($all_students)){ 
                if(count($marks)>0){?>
                <h3><strong>Year : </strong><i><?php echo $marks[0]->year ?></i></h3>
                <h3><strong>Term : </strong><i><?php echo $term ?></i></h3>
                <h3><strong>Class : </strong><i><?php echo $marks[0]->class ?></i></h3>
                <h3><strong>Course : </strong><i><?php echo $course ?></i></h3>
            <div class="row-fluid">
                <div class="span1"><h5>Roll</h5></div>
                <div class="span2"><h5>Name</h5></div>
                <div class="span1"><h5>First  Class  Test</h5></div>
                <div class="span1"><h5>Second  Class  Test</h5></div>
                <div class="span1"><h5>Third  Class  Test</h5></div>
                <div class="span1"><h5>Main   Exam : Out of 100</h5></div>
                <div class="span2"><h5>Total : Out of 120</h5></div>
                <div class="span1"><h5>Grade</h5></div>
                <div class="span2"><h5>Publication   Status</h5></div>
            </div>                   
            <?php 
            $i = 0;
            foreach ($marks as $v_mark) {
                
                ?>
                <div class="row-fluid">
                    <div class="span1"><h6><?php echo $v_mark->roll; ?></h6></div>
                    <div class="span2"><h6><?php echo $v_mark->first_name.' '.$v_mark->middle_name.' '.$v_mark->last_name; ?></h6></div>
                    <div class="span1"><h6><?php echo $v_mark->first_class_test; ?></h6></div>
                    <div class="span1"><h6><?php echo $v_mark->second_class_test; ?></h6></div>
                    <div class="span1"><h6><?php echo $v_mark->third_class_test; ?></h6></div>
                    <div class="span1"><h6><?php echo $v_mark->main_exam; ?></h6></div>
                    <div class="span2"><h6><?php echo $total_marks[$v_mark->mark_id]; ?></h6></div>
                    <div class="span1"><h6><?php echo $grades[$v_mark->mark_id]; ?></h6></div>
                    <div class="span2"><h6><?php echo $publication_status[$v_mark->mark_id]; ?></h6></div>
                    
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
</div>--><?php if($marks[0]->publication_status!='a'){?>
                <form action="<?php echo base_url(); ?>samsung_mr_controller/update_marks" method="post">
                    
                    <input type="hidden" name="year" value="<?php echo $marks[0]->year; ?>">
                    <input type="hidden" name="term" value="<?php echo $marks[0]->term; ?>">
                    <input type="hidden" name="class" value="<?php echo $marks[0]->class; ?>">
                    <input type="hidden" name="course" value="<?php echo $marks[0]->course; ?>">
                    
                    <div class="form-actions">
                        <input type="submit" name="accept_btn" class="btn btn-primary" value="Accept">
                        <input type="submit" name="deny_btn" onclick="return confirm('Are You Sure To Deny   all   these   Marks  ?')" class="btn" value="Deny">
                    </div>
                    
                </form>
                <?php } ?>
                
                <div class="form-actions">
                    
                    <a href="<?php echo base_url(); ?>samsung_mr_controller/make_pdf_marks/<?php echo $marks[0]->year; ?>/<?php echo $marks[0]->term; ?>/<?php echo $marks[0]->class; ?>/<?php echo $marks[0]->course; ?>" class="btn btn-primary">Download   PDF</a>
                    
                       |   
                    
                       <a href="<?php echo base_url(); ?>samsung_mr_controller/result_pie_chart/<?php echo $marks[0]->year; ?>/<?php echo $marks[0]->term; ?>/<?php echo $marks[0]->class; ?>/<?php echo $marks[0]->course; ?>" class="btn btn-primary" target="_blank">View   Pie   Chart</a>
                    
                </div>
                <?php }
            
                else {
                    echo '<h1>Marks   are   not   still   submitted</h1>';
                }
            /*}
            else {
                echo '<h3>Select   Class   at  first</h3>';
            }*/
            ?>
