<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

            <?php //if(isset($all_students)){ 
                if(count($students)>0){?>
            <div class="row-fluid">
                <div class="span1"><h5>Roll</h5></div>
                <div class="span3"><h5>Full Name</h5></div>
                <div class="span2"><h5>Class   Test   1</h5></div>
                <div class="span2"><h5>Class   Test   2</h5></div>
                <div class="span2"><h5>Class   Test   3</h5></div>
                <div class="span2"><h5>Main   Exam   :   Out   of   100</h5></div>
            </div>                   
            <?php $i = 0;
            foreach ($students as $v_student) {
                $i++;
                ?>
                <input type="hidden" name="student_id<?php echo $i; ?>" value="<?php echo $v_student->student_id; ?>">
                <div class="row-fluid">
                    <div class="span1"><h6><?php echo $v_student->roll; ?></h6></div>
                    <div class="span3"><h6><?php echo $v_student->first_name.' '.$v_student->middle_name.' '.$v_student->last_name ?></h6></div>
                    <div class="span2 red_background">
                        <input class="full_width" type="text" name="first_class_test<?php echo $i; ?>"  required="required" >
                            
                    </div>
                    <div class="red_background span2">
                            <input class="full_width" type="text" name="second_class_test<?php echo $i; ?>" required="required" >
                            
                        
                    </div>
                    <div class="span2 red_background">
                            <input class="full_width" type="text" name="third_class_test<?php echo $i; ?>" required="required" >
                            
                        
                    </div>
                    <div class="red_background span2">
                            <input class="full_width" type="text" name="main_exam<?php echo $i; ?>"  required="required" >
                            
                        
                    </div>
                </div>                   
            <?php } ?>
            <input type="hidden" name="total_students_no" value="<?php echo $i; ?>">
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
                    <div class="form-actions">
                        <input type="submit" name="submit_btn" class="btn btn-primary" value="submit">
                        
                    </div>

            <?php }
            
                else {
                    echo '<h1>No   Students   to   show</h1>';
                }
            /*}
            else {
                echo '<h3>Select   Class   at  first</h3>';
            }*/
            ?>