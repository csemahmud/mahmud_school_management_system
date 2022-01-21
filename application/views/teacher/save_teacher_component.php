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
            <h2><?php 
            
            switch ($function){
            case 'Add':
            ?><i class="icon-plus"></i><?php
            break;
            case 'Update':
            ?><i class="icon-edit"></i><?php
            break;
            } ?> <?php echo $function; ?>   Teacher</h2>
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
            <form name="save_teacher_form" action="<?php 
            
                switch ($function){
                case 'Add':
                    echo base_url().'samsung_tc_controller/save_teacher';
                    break;
                case 'Update':
                    echo base_url().'samsung_tc_controller/update_teacher/'.$teacher_info->teacher_id;
                    break;
                case 'Profile':
                    echo base_url().'walton_controller/update_profile/'.$teacher_info->teacher_id;
                    break;
                }
            
                ?>" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" class="form-horizontal">
                <fieldset>
                    <legend><?php echo $function; ?>   Teacher</legend>
                    <?php 
                    
                    if(isset($teacher_info->teacher_image)){
                        if($teacher_info->teacher_image!=''){
                        ?>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Profile   Image</label>
                        <div class="controls">
                            <img id="teacher_image" height="200" src="<?php echo base_url().$teacher_info->teacher_image; ?>" >
                        </div>
                    </div>          
                        <?php
                    }}
                    elseif ($this->session->userdata('teacher_image')) {
                        ?>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Profile   Image</label>
                        <div class="controls">
                            <img id="teacher_image" height="200" src="<?php echo base_url().$this->session->userdata('teacher_image'); ?>" >
                        </div>
                    </div>
                        <?php
                    }
                    
                    ?>
                    
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Select   Profile    Image</label>
                        <div class="controls">
                            <input name="teacher_image" class="input-file uniform_on" id="fileInput" type="file" tabindex="1">
                        </div>
                    </div>          
                    <input type="hidden" name="teacher_image_value" value="<?php 
                            if(isset($teacher_info->teacher_image)){
                                echo $teacher_info->teacher_image;
                            }
                            elseif ($this->session->userdata('teacher_image')) {
                                echo $this->session->userdata('teacher_image');
                                $this->session->unset_userdata('teacher_image');
                            }
                            ?>" >
                    <div class="control-group">
                        <label class="control-label" for="typeahead">First   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="first_name" value="<?php 
                            if(isset($teacher_info->first_name)){
                                echo $teacher_info->first_name;
                            }
                            elseif ($this->session->userdata('first_name')) {
                                echo $this->session->userdata('first_name');
                                $this->session->unset_userdata('first_name');
                            }
                            ?>" required="required" tabindex="2" placeholder="Enter   First  Name   ....." id="first_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   First   Name   ....." data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Middle   Name : </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="middle_name" value="<?php 
                            if(isset($teacher_info->middle_name)){
                                echo $teacher_info->middle_name;
                            }
                            elseif ($this->session->userdata('middle_name')) {
                                echo $this->session->userdata('middle_name');
                                $this->session->unset_userdata('middle_name');
                            }
                            ?>" tabindex="3" placeholder="Enter   Middle  Name   ....." id="middle_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Middle   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Last   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="last_name" value="<?php 
                            if(isset($teacher_info->last_name)){
                                echo $teacher_info->last_name;
                            }
                            elseif ($this->session->userdata('last_name')) {
                                echo $this->session->userdata('last_name');
                                $this->session->unset_userdata('last_name');
                            }
                            ?>" required="required" tabindex="4" placeholder="Enter   Last  Name   ....." id="last_name" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Last   Name   ....." maxlength="25"  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">Activity   Status : (<span class="required">*</span>)</label>
                          <div class="controls">
                            <label class="radio">
                                  <input type="radio" name="activity_status" id="activity_status1" tabindex="5" value="1" <?php 

                                  if(isset($teacher_info->activity_status)){
                                      if($teacher_info->activity_status==1){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('activity_status')!=NULL){
                                      if($this->session->userdata('activity_status')==1){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('activity_status');
                                  }}
                                  else {
                                      ?>checked="checked"<?php
                                  }
                                  ?> >
                                  Active
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                  <input type="radio" name="activity_status" id="activity_status2" tabindex="6" value="0"<?php 
                                  if(isset($teacher_info->activity_status)){
                                      if($teacher_info->activity_status==0){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('activity_status')!=NULL) {
                                          if($this->session->userdata('activity_status')==0){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('activity_status');
                                  }}
                                  ?>>
                                  Inactive
                            </label>
                          </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">Publication   Status : (<span class="required">*</span>)</label>
                          <div class="controls">
                            <label class="radio">
                                  <input type="radio" name="publication_status" tabindex="7" id="publication_status1" value="1" <?php 

                                  if(isset($teacher_info->publication_status)){
                                      if($teacher_info->publication_status==1){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('publication_status')!=NULL){
                                      if($this->session->userdata('publication_status')==1){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('publication_status');
                                  }}
                                  else {
                                      ?>checked="checked"<?php
                                  }
                                  ?> >
                                  Published
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                  <input type="radio" name="publication_status" tabindex="8" id="publication_status2" value="0"<?php 
                                  if(isset($teacher_info->publication_status)){
                                      if($teacher_info->publication_status==0){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('publication_status')!=NULL) {
                                          if($this->session->userdata('publication_status')==0){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('publication_status');
                                  }}
                                  ?>>
                                  Unpublished
                            </label>
                          </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Father   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="father_name" value="<?php 
                            if(isset($teacher_info->father_name)){
                                echo $teacher_info->father_name;
                            }
                            elseif ($this->session->userdata('father_name')) {
                                echo $this->session->userdata('father_name');
                                $this->session->unset_userdata('father_name');
                            }
                            ?>" required="required" tabindex="9" placeholder="Enter   Father's  Name   ....." id="father_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Father's   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Mother   Name : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="mother_name" value="<?php 
                            if(isset($teacher_info->mother_name)){
                                echo $teacher_info->mother_name;
                            }
                            elseif ($this->session->userdata('mother_name')) {
                                echo $this->session->userdata('mother_name');
                                $this->session->unset_userdata('mother_name');
                            }
                            ?>" required="required" tabindex="10" placeholder="Enter   Mother's  Name   ....." id="mother_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Mother's   Name   ....."  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Date   of   Birth : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="birth_date" value="<?php 
                            if(isset($teacher_info->birth_date)){
                                echo $teacher_info->birth_date;
                            }
                            elseif ($this->session->userdata('birth_date')) {
                                echo $this->session->userdata('birth_date');
                                $this->session->unset_userdata('birth_date');
                            }
                            ?>" required="required" tabindex="11" id="birth_date" placeholder="Enter   yyyy-mm-dd   format   ....." data-provide="typeahead" data-items="4" >
                            <p class="help-block">Enter   yyyy-mm-dd   format   .....</p>
                        </div>
                    </div>
                    <div class="control-group">
                          <label class="control-label">Gender : (<span class="required">*</span>)</label>
                          <div class="controls">
                            <label class="radio">
                                  <input type="radio" name="gender" id="gender1" tabindex="12" value="m" <?php 

                                  if(isset($teacher_info->gender)){
                                      if($teacher_info->gender=='m'){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('gender')!=NULL){
                                      if($this->session->userdata('gender')=='m'){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('gender');
                                  }}
                                  else {
                                      ?>checked="checked"<?php
                                  }
                                  ?> >
                                  Male
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                  <input type="radio" name="gender" id="gender2" tabindex="13" value="f"<?php 
                                  if(isset($teacher_info->gender)){
                                      if($teacher_info->gender=='f'){
                                          ?>checked="checked"<?php
                                      }
                                  }
                                  elseif ($this->session->userdata('gender')!=NULL) {
                                          if($this->session->userdata('gender')=='f'){
                                          ?>checked="checked"<?php
                                          $this->session->unset_userdata('gender');
                                  }}
                                  ?>>
                                  Female
                            </label>
                          </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Religion : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <select name="religion" required="required" tabindex="14" exclude=" " err="Religion   is   a   required   field" id="religion">
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
                            if(isset($teacher_info->phone)){
                                echo $teacher_info->phone;
                            }
                            elseif ($this->session->userdata('phone')) {
                                echo $this->session->userdata('phone');
                                $this->session->unset_userdata('phone');
                            }
                            ?>" required="required" tabindex="15" placeholder="Enter   Phone   no   ....." id="phone" maxlength="15"  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Email : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" name="email" value="<?php 
                            if(isset($teacher_info->email)){
                                echo $teacher_info->email;
                            }
                            elseif ($this->session->userdata('email')) {
                                echo $this->session->userdata('email');
                            }
                            ?>" required="required" tabindex="16" regexp="JSVAL_RX_EMAIL" err="Plrase   Enter   Valid   Email   Address   ....." placeholder="Enter   Email   Address   ....." id="email"  maxlength="100" data-provide="typeahead" data-items="4" onblur="check_email(this.value,'email_exception')" >
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
                            if(isset($teacher_info->email)){
                                echo $teacher_info->email;
                            }
                            elseif ($this->session->userdata('email')) {
                                echo $this->session->userdata('email');
                                $this->session->unset_userdata('email');
                            }
                            ?>" required="required" tabindex="17" equals="email" err="Confirm   Email   Address   must   be   same   as   Email   Address" placeholder="Confirm   Email   Address   ....." id="confirm_email"  maxlength="100" data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                        <?php if($function=='Add'){ ?>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Password : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="password" class="span6 typeahead" name="password" value="<?php 
                            if(isset($teacher_info->password)){
                                echo $teacher_info->password;
                            }
                            elseif ($this->session->userdata('password')) {
                                echo $this->session->userdata('password');
                            }
                            ?>" required="required" tabindex="18" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Password   Must  be  Alpha  Numeric   without   Hyfane   ....." placeholder="Enter   Password   ....." id="password"  maxlength="32" data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Confirm Password : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <input type="password" class="span6 typeahead" value="<?php 
                            if(isset($teacher_info->password)){
                                echo $teacher_info->password;
                            }
                            elseif ($this->session->userdata('password')) {
                                echo $this->session->userdata('password');
                                $this->session->unset_userdata('password');
                            }
                            ?>" required="required" tabindex="19" equals="password" err="Confirm   Password   must   be   same   as   Password" placeholder="Confirm   Password   ....." id="confirm_password"  maxlength="32" onkeyup="match_value('confirm_password','password','password_match')" data-provide="typeahead" data-items="4" >
                            <p id="password_match"></p>
                            
                        </div>
                    </div>
                        <?php } ?>
                    <div class="control-group">
                        <label class="control-label" for="textarea2">Address : (<span class="required">*</span>)</label>
                        <div class="controls">
                            <textarea class="cleditor" name="address" required="required" tabindex="20" placeholder="Enter   Address   ....." id="address" rows="3" spellcheck="true"><?php 
                            if(isset($teacher_info->address)){
                                echo $teacher_info->address;
                            }
                            elseif ($this->session->userdata('address')) {
                                echo $this->session->userdata('address');
                                $this->session->unset_userdata('address');
                            }
                            ?></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="save_btn" tabindex="21" class="btn btn-primary" value="Save   Information">
                        <input type="reset" tabindex="22" class="btn" name="clear_btn" value="Clear">
                    </div>
                    <?php if(isset($teacher_info)) { ?>
                    <div class="form-actions">
                        <a href="<?php 
        
                            if($this->session->userdata('admin_id') != NULL)
                            {
                                echo base_url()."samsung_ql_controller/manage_qualification_component/".$teacher_info->teacher_id;
                            }

                            else if($this->session->userdata('admin_teacher_id') != NULL)
                            {
                                echo base_url()."walton_controller/manage_profile_qualification/".$teacher_info->teacher_id;;
                            }

                            ?>"  class="btn btn-primary">Manage   Qualifications</a>   |   
                        <a href="<?php 
        
                            if($this->session->userdata('admin_id') != NULL)
                            {
                                echo base_url()."samsung_ex_controller/manage_experience_component/".$teacher_info->teacher_id;
                            }

                            else if($this->session->userdata('admin_teacher_id') != NULL)
                            {
                                echo base_url()."walton_controller/manage_profile_experience/".$teacher_info->teacher_id;;
                            }

                            ?>"  class="btn btn-primary">Manage   Experiences</a>
                    </div>
                    <?php } 
                    elseif ($this->session->userdata('teacher_id') != NULL) { 
                        
                        $s_teacher_id = $this->session->userdata('teacher_id');
                        $this->session->unset_userdata('teacher_id');
                        
                        ?>
                        
                    <div class="form-actions">
                        <a href="<?php 
                            
                            echo base_url()."samsung_ql_controller/manage_qualification_component/".$s_teacher_id;
                            
                        ?>"  class="btn btn-primary">Manage   Qualifications</a>   |   
                        <a href="<?php 
                            
                            echo base_url()."samsung_ex_controller/manage_experience_component/".$s_teacher_id;
                            
                        ?>"  class="btn btn-primary">Manage   Experiences</a>
                    </div>
                        
                        <?php } ?>
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

function check_email(email, objID)
 {
        
        if(email == ''){
            alert('Email   Address   can  not  be  empty');
            document.getElementById(objID).innerHTML = '';
            return; 
        }
        
        <?php if($this->session->userdata('admin_id')!=NULL){ ?>
        
            var serverPage = "<?php echo base_url(); ?>samsung_tc_controller/";

            <?php if(isset($teacher_info->teacher_id)){ ?>
                serverPage=serverPage+"check_email_considering_id/"+email+"/"+"<?php echo $teacher_info->teacher_id; ?>";
            <?php }

            else {
                ?>
                serverPage=serverPage+"check_email/"+email;
                    <?php 
            }
        }
        elseif ($this->session->userdata('admin_teacher_id')!=NULL) { ?>
                
                var serverPage = "<?php echo base_url(); ?>walton_controller/check_profile_email/"+email+"/"+"<?php echo $this->session->userdata('admin_teacher_id'); ?>";
                
        <?php }
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
    
    function match_value(input_id1, input_id2, result_id){
        if(document.getElementById(input_id1).value.length<document.getElementById(input_id2).value.length){
            document.getElementById(result_id).innerHTML = "<span> Type   More  .... </span>";
        }
        else if(document.getElementById(input_id1).value!==document.getElementById(input_id2).value){
            document.getElementById(result_id).innerHTML = "<span class='exception'>"+input_id2+"  does  not  match</span>";
        }
        else{
            document.getElementById(result_id).innerHTML = "<span class='message'>"+input_id2+"  has  matched</span>";
        }
    }
    
    document.forms['save_teacher_form'].elements['religion'].value = '<?php 
    if(isset($teacher_info->religion)){
        echo $teacher_info->religion;
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