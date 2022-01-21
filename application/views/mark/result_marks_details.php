<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

            <?php //if(isset($all_students)){ 
                if(count($marks)>0){?>
                <h2><strong>Learn   Center</strong></h2>
                <ul>
                    <li><strong>Year : </strong><i><?php echo $marks[0]->year ?></i></li>
                    <li><strong>Term : </strong><i><?php echo $term ?></i></li>
                    <li><strong>Class : </strong><i><?php echo $marks[0]->class ?></i></li>
                    <li><strong>Course : </strong><i><?php echo $course ?></i></li>
                    <li><strong>Date : </strong><i><?php echo date("D - M - d - Y   H:i:s", 
                        strtotime(date("Y-m-d H.i.s").' + 4 hour')); ?></i></li>
                </ul>
                
                <table border="1" align="center" cellpadding="5px" cellspacing="1px">
                    <tr>
                        <th><h5>Roll</h5></th>
                        <th><h5>Name</h5></th>
                        <th><h5>First  Class  Test</h5></th>
                        <th><h5>Second  Class  Test</h5></th>
                        <th><h5>Third  Class  Test</h5></th>
                        <th><h5>Main   Exam   :   Out   of   100</h5></th>
                        <th><h5>Total   :   Out   of   120</h5></th>
                        <th><h5>Grade</h5></th>
                        <th><h5>Publication   Status</h5></th>
                    </tr>                   
            <?php 
            $i = 0;
            foreach ($marks as $v_mark) {
                
                ?>
                <tr>
                    <td><?php echo $v_mark->roll; ?></td>
                    <td><?php echo $v_mark->first_name.' '.$v_mark->middle_name.' '.$v_mark->last_name; ?></td>
                    <td><?php echo $v_mark->first_class_test; ?></td>
                    <td><?php echo $v_mark->second_class_test; ?></td>
                    <td><?php echo $v_mark->third_class_test; ?></td>
                    <td><?php echo $v_mark->main_exam; ?></td>
                    <td><?php echo $total_marks[$v_mark->mark_id]; ?></td>
                    <td><?php echo $grades[$v_mark->mark_id]; ?></td>
                    <td><?php echo $publication_status[$v_mark->mark_id]; ?></td>
                    
                </tr>                   
            <?php $i++;} ?>
                </table>
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
</div>-->
                
                <?php }
            
                else {
                    echo '<h1>Marks   are   not   still   submitted</h1>';
                }
            /*}
            else {
                echo '<h3>Select   Class   at  first</h3>';
            }*/
            ?>
