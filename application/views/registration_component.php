<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
            <h1 class="message">
                <?php
                $message = $this->session->userdata('message');
                if ($message) {
                    echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </h1>
            <h1 class="exception">
                <?php
                $exception = $this->session->userdata('exception');
                if ($exception) {
                    echo $exception;
                    $this->session->unset_userdata('exception');
                }
                ?>

            </h1>

    <div class="box1">
    <div class="wrapper">
      <article class="col1">
        <div class="pad_left1">
          <h2>Students   Registration  to   see   Half - Yearly   and   Final   Examination   Result : </h2>
          <form name="student_registration_form" id="ContactForm" action="<?php echo base_url(); ?>front_controller/register_student.aspx" method="post" onsubmit="return validateStandard(this);">
            <div>
              <div  class="wrapper"> <strong>Roll: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="text" name="roll" id="roll" maxlength="3" value="<?php if ($this->session->userdata('email')) {
                                echo $this->session->userdata('roll');
                                $this->session->unset_userdata('roll');
                                } ?>" regexp="JSVAL_RX_NUMERIC" err="Plrase   Enter   Only  Number   ....." onblur="check_existing_student('student_exception')" required="required" class="input" tabindex="1" placeholder="Enter   Roll   ....." >
                </div>
              </div>
              <div  class="wrapper"> <strong>Class : (<span class="required">*</span>)</strong>
                <div class="bg">
                    <select name="class" id="class" required="required" onchange="check_existing_student('student_exception')" exclude=" " tabindex="2" err="Class  is  a  required   field">

                        <option value=" ">---   Select   Class   ---</option>
                        <script type="text/javascript">

                            print_classes_options();

                        </script>

                    </select>
                </div>
              </div>
                  <div id="student_exception" ></div>
              <div  class="wrapper"> <strong>Email: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="text" name="email" maxlength="100" value="<?php if ($this->session->userdata('email')) {
                                echo $this->session->userdata('email');
                            } ?>" regexp="JSVAL_RX_EMAIL" err="Plrase   Enter   Valid   Email   Address   ....." class="input" tabindex="3"  placeholder="Enter   Email   Address   ....." onblur="check_student_email(this.value,'email_exception')">
                </div>
                  <div id="email_exception" ></div>
                    <h4 id="session_email_exception" class="exception">
                        <?php
                        $email_exception = $this->session->userdata('email_exception');
                        if ($email_exception) {
                            echo $email_exception;
                            $this->session->unset_userdata('email_exception');
                        }
                        ?>

                    </h4>
              </div>
              <div  class="wrapper"> <strong>Confirm  Email: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="text" maxlength="100" value="<?php if ($this->session->userdata('email')) {
                                echo $this->session->userdata('email');
                                $this->session->unset_userdata('email');
                            } ?>" equals="email" err="Confirm   Email   Address   must   be   same   as   Email   Address" placeholder="Confirm   Email   Address   ....." class="input" tabindex="4" >
                </div>
              </div>
              <div  class="wrapper"> <strong>Password: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="password" name="password" id="password" maxlength="32" value="<?php if ($this->session->userdata('password')) {
                                echo $this->session->userdata('password');
                            } ?>" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Password   Must  be  Alpha  Numeric   without   Hyfane   ....." placeholder="Enter   Password   ....." class="input" tabindex="5" >
                </div>
              </div>
              <div  class="wrapper"> <strong>Confirm Password: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="password" id="confirm_password" maxlength="32"value="<?php if ($this->session->userdata('password')) {
                                echo $this->session->userdata('password');
                                $this->session->unset_userdata('password');
                            } ?>" equals="password" err="Confirm   Password   must   be   same   as   Password" placeholder="Confirm   Password   ....." onkeyup="match_value('confirm_password','password','password_match')" class="input" tabindex="6" >
                </div>
                  <p id="password_match"></p>
              </div>
                <span><span><input type="submit" name="submit_btn" class="button student_btn" value="Apply" tabindex="7"></span></span> 
                <span><span><input type="reset" name="reset_btn" class="button student_btn" value="Clear" tabindex="8"></span></span> </div>
          </form>
        </div>
      </article>
    </div>
  </div>

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

function check_existing_student(objID)
 {
        var roll = document.getElementById('roll').value;
        var st_class = document.getElementById('class').value;
        
        if((roll == '')||(st_class == ' ')){
            document.getElementById(objID).innerHTML = '';
            return; 
        }
        
        var serverPage = "<?php echo base_url(); ?>front_controller/";
        
        
        serverPage=serverPage+"check_existing_student/"+roll+"/"+st_class;
                
        //alert(serverPage);
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
	//alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
			document.getElementById(objID).innerHTML = xmlhttp.responseText;
		 }
	}
xmlhttp.send(null);
}

function check_student_email(email, objID)
 {
        
        if(email == ''){
            alert('Email   Address   can  not  be  empty');
            document.getElementById(objID).innerHTML = '';
            return; 
        }
        
        var roll = document.getElementById('roll').value;
        var st_class = document.getElementById('class').value;
        
        var serverPage = "<?php echo base_url(); ?>front_controller/";
        
        
        serverPage=serverPage+"check_student_email/"+email+"/"+roll+"/"+st_class;
                
        //alert(serverPage);
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
	//alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
			document.getElementById(objID).innerHTML = xmlhttp.responseText;
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

document.forms['student_registration_form'].elements['class'].value = '<?php 
if ($this->session->userdata('class')) {
    echo $this->session->userdata('class');
    $this->session->unset_userdata('class');
}
else {
    echo " ";
   }
?>';
</script>

