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
            <h2><i class="icon-th"></i> Student  Registration Manager  </h2>
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
            
                        
            <form name="select_class_form" action="<?php echo base_url(); ?>samsung_rg_controller/manage_registration_component.aspx" method="post">
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
            if(isset($students)){
                if(count($students)>0){?>
            <div class="row-fluid">
                <div class="span1"><h5>Roll</h5></div>
                <div class="span3"><h5>Name</h5></div>
                <div class="span3"><h5>Email</h5></div>
                <div class="span2"><h5>Registration   Status</h5></div>
                <div class="span3"><h5>Action</h5></div>
            </div>                   
            <?php $form_row = 0;
            foreach ($students as $v_student) {
                $form_row++;
                ?>
            
                
                <?php 
                
                $sdata = array();
                $sdata['class'] = $v_student->class;
                $this->session->set_userdata($sdata); 
                
                
                ?>
                <div class="row-fluid">
                    <div class="span1"><h6><?php echo $v_student->roll; ?></h6></div>
                    <div class="span3"><h6><?php echo $v_student->first_name.' '.$v_student->middle_name.' '.$v_student->last_name; ?></h6></div>
                    <div class="span3"><strong><?php echo $v_student->email; ?></strong></div>
                    <div class="span2"><h6><?php switch ($v_student->registration_status){
                                case 'pen':
                                    echo "Inactive";
                                    break;
                                case 'reg':
                                    echo "Active";
                                    break;
                    }; ?></h6>
                    </div>
                    <div class="span3"><h6><?php
                            if($v_student->registration_status=='pen'){
                            ?>
                                
                                <a class="btn btn-success" href="<?php echo base_url(); ?>samsung_rg_controller/register_student/<?php echo $v_student->student_id; ?>" title="Register" ><i class="icon-ok icon-white"></i></a>
                                
                                <?php } ?>
                                
                                <a class="btn btn-danger" onclick="return confirm('Are You Sure To Cancel ?')" href="<?php echo base_url(); ?>samsung_rg_controller/cancel_registration/<?php echo $v_student->student_id; ?>" title="Cancel   Registration" ><i class="icon-remove icon-black"></i></a>
                                
                                
                        </h6>
                    </div>
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

            <?php }
            
                else {
                    echo '<h1>No   Student   to   show</h1>';
                }
            }
            else {
                echo '<h1>Select   class   at   first</h1>';
            }
            ?>
        </div>
    </div><!--/span-->
</div><!--/row-->

