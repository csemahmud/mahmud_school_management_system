<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
              <h2 class="pad_bot1">Our Teachers</h2>
            </div>
              <?php 
                if(count($teachers)>0){
                    $i = 0;
              foreach ($teachers as $v_teacher){?>
            <div class="wrapper pad_bot2">
                <?php if($v_teacher->teacher_image != '') { ?>
                <figure class="left marg_right1"><img height="120" src="<?php echo base_url().$v_teacher->teacher_image; ?>" alt=""></figure>
                <?php } ?>
                <p class="pad_top2"><strong><?php echo $v_teacher->first_name.' '.$v_teacher->middle_name.' '.$v_teacher->last_name; ?> </strong><br></p>
                <?php $teacher_qualifications = $all_qualifications[$i];
                
                foreach ($teacher_qualifications as $v_qualification) {
                
                ?>
                <p class="pad_left1 pad_bot1"><strong><?php  echo $v_qualification->degree.' | '.$v_qualification->department; ?></strong><br/><?php echo $v_qualification->institute; ?> </p>
                
                <?php } $i++; ?>
                
                <p class="pad_bot1"><a href="<?php echo base_url() ?>front_controller/details_teacher_component/<?php echo $v_teacher->teacher_id ?>" class="button"><span><span>View   Details   Information</span></span></a></p>
              <p class="pad_bot1"><a href="<?php echo base_url() ?>front_controller/assigned_courses_component/<?php echo $v_teacher->teacher_id ?>" class="button"><span><span>View   Assigned   Courses</span></span></a></p>
            </div>
                <?php }
              }
                else {
                  echo '<h1>No   Teacher  to  show   !!!</h1>';
                }
              ?>
          </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
              <h2>New Programs</h2>
            </div>
            <ul class="list1">
              <li><a href="#">International Studies</a></li>
              <li><a href="#">Models &amp; Language Reaching</a></li>
              <li><a href="#">Public School Facts</a></li>
              <li><a href="#">State Testing Data</a></li>
              <li><a href="#">Education Jobs</a></li>
            </ul>
            <div class="pad_left1">
              <h2>Testimonials</h2>
              <p class="quot"> <span><strong><a href="#">William Horner</a></strong></span> <span class="color1">Managing Director</span> <span class="color2 pad_bot1">Company Name</span> Nam libero tempore, cum soluta nobis esteligendi optio cumque nihil impedit quo minusid quod maxime voluptas assumenda estmnis dolor repellendus. </p>
              <div class="pad_top2">
                <p class="quot"> <span><strong><a href="#">Lily Mason</a></strong></span> <span class="color1">Company President</span> <span class="color2 pad_bot1">Company Name</span> Nam libero tempore, cum soluta nobis esteligendi optio cumque nihil impedit quo minusid quod maxime voluptas assumenda estmnis dolor repellendus.</p>
              </div>
            </div>
            <a href="#" class="button marg_top1"><span><span>&nbsp;&nbsp; View All &nbsp;&nbsp;</span></span></a> </article>
        </div>
      </div>