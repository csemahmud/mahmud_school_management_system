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
          <h2>Students   Log  In : </h2>
          <form name="student_login_form" id="ContactForm" action="<?php echo base_url(); ?>front_li_controller/student_login_check.aspx" method="post" onsubmit="return validateStandard(this);">
              <div>
              <div  class="wrapper"> <strong>Email: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="text" name="email" maxlength="100"  regexp="JSVAL_RX_EMAIL" err="Plrase   Enter   Valid   Email   Address   ....." class="input"  placeholder="Enter   Email   Address   .....">
                </div>
              </div>
              <div  class="wrapper"> <strong>Password: (<span class="required">*</span>)</strong>
                <div class="bg">
                    <input type="password" name="password" id="password" maxlength="32"  regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Password   Must  be  Alpha  Numeric   without   Hyfane   ....." placeholder="Enter   Password   ....." class="input" >
                </div>
              </div>
                <span><span><input type="submit" name="submit_btn" class="button student_btn" value="Log  In" ></span></span> 
                <span><span><input type="reset" name="reset_btn" class="button student_btn" value="Clear" ></span></span> 
              </div>
          </form>
        </div>
      </article>
    </div>
  </div>



