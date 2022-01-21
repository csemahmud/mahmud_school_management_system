<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
                    <?php
                        for($i = 0;$i<$course_count;$i++){
                     ?>
                    
                    <div class="row-fluid">
                        
                        <div class="span6">
                    
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Select   Teacher : </label>
                                <div class="controls">
                                    <select name="teacher_id<?php echo $i; ?>" required="required" exclude=" " id="teacher_id<?php echo $i; ?>">
                                        <option value=" ">---Select   Teacher---</option>
                                        <?php 
                                        
                                            foreach ($all_active_teachers as $v_teacher){
                                                ?>
                                                    
                                        <option value="<?php echo $v_teacher->teacher_id ?>"> <?php echo $v_teacher->first_name.' '.$v_teacher->middle_name.' '.$v_teacher->last_name ?> </option>
                                                    
                                                    <?php
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="span6">
                    
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Select   Course : </label>
                                <div class="controls">
                                    <select name="course<?php echo $i; ?>" required="required" exclude=" " id="course<?php echo $i; ?>">
                                        <option value=" ">---Select   Course---</option>
                                        <?php echo $assign_course_options; ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <?php }?>
                    
                    <div class="form-actions">
                        <input type="submit" name="assign_btn" class="btn btn-primary" value="Assign">
                        <input type="reset" class="btn" name="clear_btn" value="Clear">
                    </div>
