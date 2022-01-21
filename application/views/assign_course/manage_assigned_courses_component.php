<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Grid</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-th"></i> Assigned  Course Manager  </h2>
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3 class="message">
                <?php
                $message = $this->session->userdata('message');
                if ($message) {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h3>
            <h3 class="exception">
                <?php
                $exception = $this->session->userdata('exception');
                if ($exception) {
                    echo $exception;
                    $this->session->unset_userdata('exception');
                }
                ?>

            </h3>
            
                        
            <form name="select_class_form" action="<?php echo base_url(); ?>samsung_ac_controller/manage_assigned_courses_component.aspx" method="post">
            <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" required="required" exclude=" " for="selectError3">Select   Class</label>
                        <div class="controls">
                            <select name="class" required="required" exclude=" " id="class">
                                <option value=" ">---   Select   Class   ---</option>
                                <script type="text/javascript">

                                    print_classes_options();

                                </script>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="span2">
                    <div class="form-actions">
                        <input type="submit" name="submit_btn" class="btn btn-primary" value="Select">
                    </div>
                </div>
                <div class="span7">
                </div>
            </div>
            </form>
            <script type="text/javascript">
            
            document.forms['select_class_form'].elements['class'].value = '<?php if(isset($class)){
                echo $class;
            }
            else {
                echo " ";
            }?>';
            
            </script>
            

            <?php  
            if(isset($all_assigned_courses)){
                if(count($all_assigned_courses)>0){?>
            <div class="row-fluid">
                <div class="span2"><h5>Course</h5></div>
                <div class="span3"><h5>Teacher</h5></div>
                <div class="span2"><h5>Term</h5></div>
                <div class="span2"><h5>Year</h5></div>
                <div class="span1"><h5>Action</h5></div>
                <div class="span2"><h5>Assigned   Status</h5></div>
            </div>                   
            <?php $form_row = 0;
            foreach ($all_assigned_courses as $v_course) {
                $form_row++;
                ?>
            <form name="update_assign_course_form<?php echo $form_row; ?>" action="<?php echo base_url(); ?>samsung_ac_controller/update_assigned_course/<?php echo $v_course->assign_course_id; ?>" method="post">
                
                <?php 
                
                $sdata = array();
                $sdata['class'] = $v_course->class;
                $this->session->set_userdata($sdata); 
                
                
                ?>
                <div class="row-fluid">
                    <div class="span2"><h6><?php echo $course_name[$v_course->course]; ?></h6></div>
                    <div class="span3"><div class="control-group">
                                <div class="controls">
                                    <select name="teacher_id" required="required" exclude=" " id="teacher_id">
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
                            </div></div>
                    <div class="span2">
                    <div class="control-group">
                        <div class="controls">
                            <select name="term" required="required" exclude=" " id="term">
                                <option value=" ">---Select   Term---</option>
                                <option value="1">Half - Yearly</option>
                                <option value="2">Final</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="span2">
                        <select name="year" class="full_width" required="required" exclude=" " id="year">
                                <option value=" ">---Select   Year---</option>
                                <?php 

                                    $start_year = date("Y")-5; 
                                    for($i=$start_year;$i<$start_year+10;$i++){

                                 ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                            </select>
                    </div>
                    <div class="span1">
                        <input type="submit" name="submit_btn" class="btn btn-primary full_width" value="Update"></div>
                    <div class="span2"><h6><?php switch ($v_course->assign_status){
                        
                        case '1':
                            ?>Assigned
                                
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_ac_controller/unassign_course/<?php echo $v_course->assign_course_id; ?>" title="Unassign" ><i class="icon-lock icon-black"></i></a>
                                
                                <?php
                            break;
                        case '0':
                            ?>Unassigned
                                
                                <a class="btn btn-success" href="<?php echo base_url(); ?>samsung_ac_controller/assign_course/<?php echo $v_course->assign_course_id; ?>/<?php echo $v_course->course; ?>" title="Assign" ><i class="icon-ok icon-white"></i></a>
                                
                                <?php
                            break;
                        
                    } ?>
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>samsung_ac_controller/delete_assigned_course/<?php echo $v_course->assign_course_id; ?>" title="Delete" onclick="return confirm('Are You Sure To Delete This ?')" ><i class="icon-trash icon-white"></i></a>
                        
                        </h6></div>
                </div>                   
            </form>
            <script type="text/javascript">
            
            document.forms['update_assign_course_form<?php echo $form_row; ?>'].elements['teacher_id'].value = '<?php echo $v_course->teacher_id; ?>';
            document.forms['update_assign_course_form<?php echo $form_row; ?>'].elements['term'].value = '<?php echo $v_course->term; ?>';
            document.forms['update_assign_course_form<?php echo $form_row; ?>'].elements['year'].value = '<?php echo $v_course->year; ?>';
            
            </script>
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
            <?php }
            
                else {
                    echo '<h1>No   Assigned  Course   to   show</h1>';
                }
            }
            else {
                echo '<h1>Select   class   at   first</h1>';
            }
            ?>
        </div>
    </div><!--/span-->
</div><!--/row-->

