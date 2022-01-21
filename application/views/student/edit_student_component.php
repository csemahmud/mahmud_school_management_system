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
            <h2>Edit   <?php echo $type; ?></h2>
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
            <form name="save_student_form" action="<?php  
            
            if(isset($student_info->student_id)){
                echo base_url().'samsung_st_controller/update_student/'.$student_info->student_id;
            }
            elseif (isset ($student_info->admission_id)) {
                echo base_url().'samsung_ad_controller/update_applicant/'.$student_info->admission_id;
            }
            
             ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <legend>Edit   Student</legend>
                    <?php 
                    
                    if(isset($student_info->student_image)){
                        if($student_info->student_image!=''){
                        ?>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Profile   Image</label>
                        <div class="controls">
                            <img id="student_image" height="200" src="<?php echo base_url().$student_info->student_image; ?>" >
                        </div>
                    </div>          
                        <?php
                    }}
                    
                    ?>
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Select   Profile    Image</label>
                        <div class="controls">
                            <input name="student_image" class="input-file uniform_on" id="fileInput" type="file">
                        </div>
                    </div>          
                    <input type="hidden" name="student_image_value" value="<?php 
                            if(isset($student_info->student_image)){
                                echo $student_info->student_image;
                            }
                            ?>" >
                    <div class="control-group">
                        <label class="control-label" for="typeahead">First   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="first_name" value="<?php 
                            if(isset($student_info->first_name)){
                                echo $student_info->first_name;
                            }
                            ?>" required="required" tabindex="1" placeholder="Enter   First  Name   ....." id="first_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   First   Name   ....." data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Middle   Name : </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="middle_name" value="<?php 
                            if(isset($student_info->middle_name)){
                                echo $student_info->middle_name;
                            }
                            ?>" tabindex="2" placeholder="Enter   Middle  Name   ....." id="middle_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Middle   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Last   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="last_name" value="<?php 
                            if(isset($student_info->last_name)){
                                echo $student_info->last_name;
                            }
                            ?>" required="required" tabindex="3" placeholder="Enter   Last  Name   ....." id="last_name" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Last   Name   ....." maxlength="25"  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Class : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <select name="class" required="required" tabindex="8" exclude=" " err="Class   is   a   required   field" id="class">
                                <option value=" ">---Select   Class---</option>
                                    <script type="text/javascript">

                                        print_classes_options()();

                                    </script>
                            </select>
                        </div>
                    </div>
                    <?php if (isset($student_info->student_id)){ ?>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Roll : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="roll" value="<?php 
                            if(isset($student_info->roll)){
                                echo $student_info->roll;
                            }
                            ?>" required="required" tabindex="9" placeholder="Enter   Department   ....." id="roll" maxlength="3" regexp="JSVAL_RX_NUMERIC" err="Roll   must  be  numeric   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Father   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="father_name" value="<?php 
                            if(isset($student_info->father_name)){
                                echo $student_info->father_name;
                            }
                            ?>" required="required" tabindex="11" placeholder="Enter   Father's  Name   ....." id="father_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Father's   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Mother   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="mother_name" value="<?php 
                            if(isset($student_info->mother_name)){
                                echo $student_info->mother_name;
                            }
                            ?>" required="required" tabindex="12" placeholder="Enter   Mother's  Name   ....." id="mother_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Mother's   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Date   of   Birth : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="birth_date" value="<?php 
                            if(isset($student_info->birth_date)){
                                echo $student_info->birth_date;
                            }
                            ?>" required="required" tabindex="13" id="birth_date" placeholder="Enter   yyyy-mm-dd   format   ....." data-provide="typeahead" data-items="4" >
                            <p class="help-block">Enter   yyyy-mm-dd   format   .....</p>
                        </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">Gender : (<span class="required">*</span>)</label>
                          <div class="controls">
                            <label class="radio">
                                  <input type="radio" name="gender" id="gender1" tabindex="14" value="m" <?php 

                                  if(isset($student_info->gender)){
                                      if($student_info->gender=='m'){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  else {
                                      ?>checked="checked"<?php
                                  }
                                  ?> >
                                  Male
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                  <input type="radio" name="gender" id="gender2" tabindex="15" value="f"<?php 
                                  if(isset($student_info->gender)){
                                      if($student_info->gender=='f'){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  ?>>
                                  Female
                            </label>
                          </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Religion : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <select name="religion" required="required" tabindex="16" exclude=" " err="Religion   is   a   required   field" id="religion">
                                <option value=" ">---Select   Religion---</option>
                                    <script type="text/javascript">

                                        print_religions_options()

                                    </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Phone   No : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="phone" value="<?php 
                            if(isset($student_info->phone)){
                                echo $student_info->phone;
                            }
                            ?>" required="required" tabindex="17" placeholder="Enter   Phone   no   ....." id="phone" maxlength="15"  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <input type="hidden" name="registration_status" value="<?php if(isset($student_info->registration_status)){ echo $student_info->registration_status; } ?>">
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="email" value="<?php 
                            if(isset($student_info->email)){
                                echo $student_info->email;
                            }
                            ?>" <?php
                            if(isset($student_info->registration_status)){
                            if(($student_info->registration_status=='reg')||($student_info->registration_status=='pen')){
                                ?> required="required" onblur="check_student_email(this.value,'email_exception')" <?php 
                                
                            }} ?> tabindex="18" regexp="JSVAL_RX_EMAIL" err="Plrase   Enter   Valid   Email   Address   ....." placeholder="Enter   Email   Address   ....." id="email"  maxlength="100" data-provide="typeahead" data-items="4" >
                            <div id="email_exception" ></div>
                            <h3 id="session_email_exception" class="exception">
                                <?php
                                $email_exception = $this->session->userdata('email_exception');
                                if ($email_exception) {
                                    echo $email_exception;
                                    $this->session->unset_userdata('email_exception');
                                }
                                ?>

                            </h3>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Confirm Email : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" value="<?php 
                            if(isset($student_info->email)){
                                echo $student_info->email;
                            }
                            ?>" <?php if(isset($student_info->registration_status)){
                            if(($student_info->registration_status=='reg')||($student_info->registration_status=='pen')){
                                ?> required="required" <?php 
                                
                            }} ?> tabindex="19" equals="email" err="Confirm   Email   Address   must   be   same   as   Email   Address" placeholder="Confirm   Email   Address   ....." id="confirm_email"  maxlength="100" data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="textarea2">Address : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <textarea class="cleditor" name="address" required="required" tabindex="22" placeholder="Enter   Address   ....." id="address" rows="3" spellcheck="true"><?php 
                            if(isset($student_info->address)){
                                echo $student_info->address;
                            }
                            ?></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="save_btn" tabindex="23" class="btn btn-primary" value="Update">
                        <input type="reset" tabindex="24" class="btn" name="clear_btn" value="Clear">
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
    
//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
}

function check_student_email(email, objID)
 {
        
        if(email == ''){
            alert('Email   Address   can  not  be  empty');
            document.getElementById(objID).innerHTML = '';
            return; 
        }
        
        var serverPage = "<?php echo base_url(); ?>samsung_st_controller/";
        
        <?php if(isset($student_info->student_id)){ ?>
            serverPage=serverPage+"check_student_email_considering_id/"+email+"/"+"<?php echo $student_info->student_id; ?>";
        <?php }
        
        else {
            ?>
            return;
                <?php 
        }
        ?>
        //alert(serverPage);
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
	//alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
			document.getElementById(objID).innerHTML = xmlhttp.responseText;
			//document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                        document.getElementById("session_email_exception").innerHTML = '';
		 }
	}
xmlhttp.send(null);
}
    
    document.forms['save_student_form'].elements['class'].value = '<?php 
    if(isset($student_info->class)){
        echo $student_info->class;
    }
    else {
        echo " ";
   }
            ?>';
    document.forms['save_student_form'].elements['religion'].value = '<?php 
    if(isset($student_info->religion)){
        echo $student_info->religion;
    }
    elseif ($this->session->userdata('religion')) {
        echo $this->session->userdata('religion');
        $this->session->unset_userdata('religion');
    }
    else {
        echo " ";
   }
            ?>';

    $(document).ready(function () {
        $("#birth_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

</script>