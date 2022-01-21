<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2>Manage   Qualification</h2>
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
                
            
            <h1>Qualification   of   Teacher   :   <?php echo $teacher_name ?></h1>
            
            <?php 

            if(count($qualifications) > 0)
            {
                echo "<h3>Edit Qualifications :- </h3>";
            }
            $i = 0;
            foreach ($qualifications as $v_qualification) 
                  { 
                $i++; ?>
            
            <fieldset>
                <legend>Qualification : <?php echo $i; ?></legend>
                <h3 class="message">
                    <?php
                    $message = $this->session->userdata('message'.$v_qualification->qualification_id);
                    if ($message) {
                        echo $message;
                        $this->session->unset_userdata('message'.$v_qualification->qualification_id);
                    }
                    ?>
                </h3>
                <h3 class="exception">
                    <?php
                    $exception = $this->session->userdata('exception'.$v_qualification->qualification_id);
                    if ($exception) {
                        echo $exception;
                        $this->session->unset_userdata('exception'.$v_qualification->qualification_id);
                    }
                    ?>

                </h3>
                
                <form name="update_qualification_form<?php echo $i; ?>" action="<?php 
        
                    if($this->session->userdata('admin_id') != NULL)
                    {
                        echo base_url()."samsung_ql_controller/update_qualification/".$v_qualification->qualification_id;
                    }

                    else if($this->session->userdata('admin_teacher_id') != NULL)
                    {
                        echo base_url()."walton_controller/update_profile_qualification/".$v_qualification->qualification_id;
                    }
                    
                    ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                        
                    
                    <input type="hidden" name="teacher_id" value="<?php echo $v_qualification->teacher_id; ?>">
                    
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Select   Major   Degree : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <select name="degree" required="required" exclude=" " err="Major  Degree   is   a   required   field" id="degree">
                                    <option value=" ">---Select   Degree---</option>
                                        <script type="text/javascript">

                                            print_degrees_options();

                                        </script>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Department : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="department" value="<?php 
                                    echo $v_qualification->department;
                                ?>" required="required" placeholder="Enter   Department   ....." id="department" maxlength="100" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   Valid   Department   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Institute : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="institute" value="<?php 
                                    echo $v_qualification->institute;
                                ?>" required="required" placeholder="Enter   Institute\University   ....." id="institute" maxlength="200" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   a   Valid   Institute   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <input type="submit" name="update_btn" class="btn btn-primary" value="Update">
                            <a href="<?php 
        
                            if($this->session->userdata('admin_id') != NULL)
                            {
                                echo base_url()."samsung_ql_controller/delete_qualification/".$v_qualification->qualification_id.'/'.$v_qualification->teacher_id;
                            }

                            else if($this->session->userdata('admin_teacher_id') != NULL)
                            {
                                echo base_url()."walton_controller/delete_profile_qualification/".$v_qualification->qualification_id.'/'.$v_qualification->teacher_id;
                            }

                            ?>" class="btn" onclick="return confirm('Are You Sure To Delete This ?')" >Delete</a>
                        </div>
                </form>
                
                <script type="text/javascript"> 
                
                document.forms['update_qualification_form<?php echo $i; ?>'].elements['degree'].value = '<?php 
                            echo $v_qualification->degree;
                            ?>';
                
                </script>
                
            </fieldset>   
                
            <?php } ?>
            
            <fieldset>
                <legend>Add   Qualification</legend>
                
                <form name="add_qualification_form" action="<?php 
        
                    if($this->session->userdata('admin_id') != NULL)
                    {
                        echo base_url()."samsung_ql_controller/save_qualification/".$teacher_id;
                    }

                    else if($this->session->userdata('admin_teacher_id') != NULL)
                    {
                        echo base_url()."walton_controller/save_profile_qualification/".$teacher_id;
                    }
                    
                    ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                        
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Select   Major   Degree : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <select name="degree" required="required" exclude=" " err="Major  Degree   is   a   required   field" id="degree">
                                    <option value=" ">---Select   Degree---</option>
                                        <script type="text/javascript">

                                            print_degrees_options();

                                        </script>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Department : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="department" required="required" placeholder="Enter   Department   ....." id="department" maxlength="100" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   Valid   Department   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Institute : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="institute" required="required" placeholder="Enter   Institute\University   ....." id="institute" maxlength="200" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   a   Valid   Institute   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <input type="submit" name="add_btn" class="btn btn-primary" value="Add">
                            <input type="reset" class="btn" name="clear_btn" value="Clear">
                        </div>
                </form>
                
            </fieldset>

        </div>
    </div><!--/span-->

</div><!--/row-->
