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
<?php if($message==NULL) { ?>
        <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
              <h2>Apply   for   Admission</h2>
              <form id="ContactForm" action="<?php echo base_url(); ?>front_controller/save_application.aspx" method="post" onsubmit="return validateStandard(this);" enctype="multipart/form-data" >
                <div>
                  <div  class="wrapper"> <strong>First   Name: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" name="first_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   First   Name   ....." required="required" class="input" tabindex="1" placeholder="Enter   First  Name   ....." >
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Middle    Name:</strong>
                    <div class="bg">
                        <input type="text" name="middle_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Middle   Name   ....." class="input" tabindex="2"  placeholder="Enter   Middle  Name   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Last   Name: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" name="last_name" maxlength="25" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Last   Name   ....." required="required" class="input" tabindex="3"  placeholder="Enter   Last  Name   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Apply   for   class : (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <select name="class" required="required" exclude=" " tabindex="4" err="Class  is  a  required   field">
                            
                            <option value=" ">---   Select   Class   ---</option>
                            <script type="text/javascript">
                            
                                print_classes_options();
                            
                            </script>
                            
                        </select>
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Father's Name: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" name="father_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Father's   Name   ....." required="required" class="input" tabindex="5"  placeholder="Enter   Father's  Name   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Mother's   Name: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" name="mother_name" maxlength="100" regexp="JSVAL_RX_ALPHA" err="Plrase   Enter   Valid   Mother's   Name   ....." required="required" class="input" tabindex="6"  placeholder="Enter   Mother's  Name   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Date   of   Birth: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" id="birth_date" name="birth_date" required="required" class="input" tabindex="7"  placeholder="Enter   yyyy-mm-dd   format   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Gender: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="radio" name="gender" tabindex="8" value="m" checked="checked">Male
                        <input type="radio" name="gender" tabindex="9" value="f">Female
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Religion: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <select name="religion" required="required" exclude=" " tabindex="10" err="Religion   is   a   required   field">
                            
                            <option value=" ">---   Select   Religion   ---</option>
                            <script type="text/javascript">
                            
                                print_religions_options()
                            
                            </script>
                            
                        </select>
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Phone: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <input type="text" name="phone" maxlength="15" required="required" class="input" tabindex="11" placeholder="Enter   Phone   no   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Email:</strong>
                    <div class="bg">
                        <input type="text" name="email" maxlength="100" regexp="JSVAL_RX_EMAIL" err="Plrase   Enter   Valid   Email   Address   ....." class="input" tabindex="12"  placeholder="Enter   Email   Address   .....">
                    </div>
                  </div>
                  <div  class="wrapper"> <strong>Profile   Image: </strong>
                    <div class="bg">
                        <input name="student_image" class="input-file uniform_on" id="fileInput" type="file" tabindex="13">
                    </div>
                  </div>
                  <div  class="textarea_box"> <strong>Address: (<span class="required">*</span>)</strong>
                    <div class="bg">
                        <textarea name="address" required="required" cols="1" rows="1" tabindex="14" placeholder="Enter   Address   ....." spellcheck="true"></textarea>
                    </div>
                  </div>
                    <span><span><input type="submit" name="submit_btn" class="button student_btn" value="Apply" tabindex="15"></span></span> 
                    <span><span><input type="reset" name="reset_btn" class="button student_btn" value="Clear" tabindex="16"></span></span> </div>
              </form>
            </div>
          </article>
        </div>
      </div>

<script type="text/javascript">

    $(document).ready(function () {
        $("#birth_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

</script>

<?php }

 else {
     ?>
         
<table>
    
    <tr>
        
        <td><strong>First   Name : </strong></td>
        <td><?php echo $this->session->userdata('first_name'); 
        $this->session->unset_userdata('first_name');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Middle   Name : </strong></td>
        <td><?php echo $this->session->userdata('middle_name'); 
        $this->session->unset_userdata('middle_name');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Last   Name : </strong></td>
        <td><?php echo $this->session->userdata('last_name'); 
        $this->session->unset_userdata('last_name');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Applied   For   Class : </strong></td>
        <td><?php echo $this->session->userdata('class'); 
        $this->session->unset_userdata('class');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Father's   Name : </strong></td>
        <td><?php echo $this->session->userdata('father_name'); 
        $this->session->unset_userdata('father_name');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Mother's   Name : </strong></td>
        <td><?php echo $this->session->userdata('mother_name'); 
        $this->session->unset_userdata('mother_name');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Date   of   Birth : </strong></td>
        <td><?php echo $this->session->userdata('birth_date'); 
        $this->session->unset_userdata('birth_date');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Gender : </strong></td>
        <td><?php $gender = $this->session->userdata('gender');
        switch ($gender){
        case 'm':
            echo 'Male';
            break;
        case 'f':
            echo 'Female';
            break;
        }
        $this->session->unset_userdata('gender');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Religion : </strong></td>
        <td><?php $religion = $this->session->userdata('religion');
        switch ($religion){
        case 'i':
            echo 'Islam';
            break;
        case 'h':
            echo 'Hindu';
            break;
        case 'b':
            echo 'Buddhist';
            break;
        case 'c':
            echo 'Christian';
            break;
        case 'o':
            echo 'Others';
            break;
        }
        $this->session->unset_userdata('religion');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Phone : </strong></td>
        <td><?php echo $this->session->userdata('phone'); 
        $this->session->unset_userdata('phone');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Email : </strong></td>
        <td><?php echo $this->session->userdata('email'); 
        $this->session->unset_userdata('email');
        ?></td>
        
    </tr>
    <tr>
        
        <td><strong>Address : </strong></td>
        <td><?php echo $this->session->userdata('address'); 
        $this->session->unset_userdata('address');
        ?></td>
        
    </tr>
    
</table>
         
         <?php
}

?>