<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

            <?php //if(isset($all_students)){ 
                if(count($all_students)>0){?>
            <div class="row-fluid">
                <div class="span2"><h5>Select</h5></div>
                <div class="span1"><h5>Roll</h5></div>
                <div class="span3"><h5>Full Name</h5></div>
                <div class="span3"><h5>Phone</h5></div>
                <div class="span3"><h5>Action</h5></div>
            </div>                   
            <?php $class = ' ';
            foreach ($all_students as $v_student) {
                $class = $v_student->class;
                ?>
                <div class="row-fluid">
                    <div class="span2">
                        <div class="control-group">
                              <div class="controls">
                                <label class="checkbox inline">
                                    <input type="checkbox" name="<?php echo $v_student->student_id; ?>" id="inlineCheckbox1" value="on" > 
                                </label>
                              </div>
                        </div></div>
                    <div class="span1"><h6><?php echo $v_student->roll; ?></h6></div>
                    <div class="span3"><h6><?php echo $v_student->first_name.' '.$v_student->middle_name.' '.$v_student->last_name ?></h6></div>
                    <div class="span3"><h6>
                            <?php echo $v_student->phone ?></h6></div>
                    <div class="span3"><h6>
                            <a class="btn btn-info" href="<?php echo base_url(); ?>samsung_st_controller/edit_student/<?php echo $v_student->student_id; ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_st_controller/delete_student/<?php echo $v_student->student_id; ?>" title="Delete" onclick="return confirm('Are You Sure To Delete This ?')" ><i class="icon-trash icon-white"></i></a>
                            </h6></div>
                </div>                   
            <?php } ?>
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
<div class="row-fluid">
    <div class="span6"></div>
    <div class="span6">
        <div class="form-actions">
            <input type="submit" class="btn btn-primary"  onclick="return confirm('Are You Sure To Delete These   Selected   Students ?')" name="delete_btn" value="Delete   Selected   Students">
            <input type="reset" class="btn" value="Clear   Selected   Students">
        </div></div>
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
