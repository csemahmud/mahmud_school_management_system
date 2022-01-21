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
            <h2>Manage   Experience</h2>
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
                
            
            <h1>Experience   of   Teacher   :   <?php echo $teacher_name ?></h1>
            
            <?php 

            if(count($experiences) > 0)
            {
                echo "<h3>Edit Experience :- </h3>";
            }
            $i = 0;
            foreach ($experiences as $v_experience) 
                  { 
                $i++; ?>
            
            <fieldset>
                <legend>Experience : <?php echo $i; ?></legend>
                <h3 class="message">
                    <?php
                    $message = $this->session->userdata('message'.$v_experience->experience_id);
                    if ($message) {
                        echo $message;
                        $this->session->unset_userdata('message'.$v_experience->experience_id);
                    }
                    ?>
                </h3>
                <h3 class="exception">
                    <?php
                    $exception = $this->session->userdata('exception'.$v_experience->experience_id);
                    if ($exception) {
                        echo $exception;
                        $this->session->unset_userdata('exception'.$v_experience->experience_id);
                    }
                    ?>

                </h3>
                
                <form name="update_experience_form<?php echo $i; ?>" action="<?php 
        
                    if($this->session->userdata('admin_id') != NULL)
                    {
                        echo base_url()."samsung_ex_controller/update_experience/".$v_experience->experience_id;
                    }

                    else if($this->session->userdata('admin_teacher_id') != NULL)
                    {
                        echo base_url()."walton_controller/update_profile_experience/".$v_experience->experience_id;
                    }
                    
                    ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                        
                    
                    <input type="hidden" name="teacher_id" value="<?php echo $v_experience->teacher_id; ?>">
                    
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Institute : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="institute" value="<?php 
                                    echo $v_experience->institute;
                                ?>" required="required" placeholder="Enter   Institute   ....." id="institute" maxlength="200" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   a   Valid   Institute   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Designation : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="designation" value="<?php 
                                    echo $v_experience->designation;
                                ?>" required="required" placeholder="Enter   Designation   ....." id="designation" maxlength="50" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   Valid   Designation   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Years : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="years" value="<?php 
                                    echo $v_experience->years;
                                ?>" required="required" placeholder="Enter   Years   ....." id="years" maxlength="3" regexp="JSVAL_RX_NUMERIC" err="Plrase   Enter   Numeric   Value   for   Years   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <input type="submit" name="update_btn" class="btn btn-primary" value="Update">
                            <a href="<?php 
        
                            if($this->session->userdata('admin_id') != NULL)
                            {
                                echo base_url()."samsung_ex_controller/delete_experience/".$v_experience->experience_id.'/'.$v_experience->teacher_id;
                            }

                            else if($this->session->userdata('admin_teacher_id') != NULL)
                            {
                                echo base_url()."walton_controller/delete_profile_experience/".$v_experience->experience_id.'/'.$v_experience->teacher_id;
                            }

                            ?>" class="btn" onclick="return confirm('Are You Sure To Delete This ?')" >Delete</a>
                        </div>
                </form>
                
            </fieldset>   
                
            <?php } ?>
            
            <fieldset>
                <legend>Add   Experience</legend>
                
                <form name="add_experience_form" action="<?php 
        
                    if($this->session->userdata('admin_id') != NULL)
                    {
                        echo base_url()."samsung_ex_controller/save_experience/".$teacher_id;
                    }

                    else if($this->session->userdata('admin_teacher_id') != NULL)
                    {
                        echo base_url()."walton_controller/save_profile_experience/".$teacher_id;
                    }
                    
                    ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Institute : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="institute" required="required" placeholder="Enter   Institute   ....." id="institute" maxlength="200" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   a   Valid   Institute   Name   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Designation : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="designation" required="required" placeholder="Enter   Designation   ....." id="designation" maxlength="50" regexp="JSVAL_RX_ALPHA_WITH_AND" err="Plrase   Enter   Valid   Designation   ....."  data-provide="typeahead" data-items="4" >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Years : (<span class="required">*</span>)</label>
                            <div class="controls">
                                <input type="text" class="span6 typeahead" name="years" required="required" placeholder="Enter   Years   ....." id="years" maxlength="3" regexp="JSVAL_RX_NUMERIC" err="Plrase   Enter   Numeric   Value   for   Years   ....."  data-provide="typeahead" data-items="4" >

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
