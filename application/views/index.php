<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

      <div class="wrapper">
        <div class="pad1 pad_top1">
          <article class="cols marg_right1">
            <figure><a href="#"><img src="<?php echo base_url(); ?>images/page1_img1.jpg" alt=""></a></figure>
            <span class="font1">Our Mission Statement</span> </article>
          <article class="cols marg_right1">
            <figure><a href="#"><img src="<?php echo base_url(); ?>images/page1_img2.jpg" alt=""></a></figure>
            <span class="font1">Performance Report</span> </article>
          <article class="cols">
            <figure><a href="#"><img src="<?php echo base_url(); ?>images/page1_img3.jpg" alt=""></a></figure>
            <span class="font1">Prospective Parents</span> </article>
        </div>
      </div>
      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <div class="pad_left1">
              <h2>Welcome to Our Center</h2>
              <p class="font2">Learn Center is one of free website templates created by <span>TemplateMonster.com team</span></p>
              <p><strong>Learn Center Template</strong> is optimized for 1024X768 screen resolution. It’s also XHTML &amp; CSS valid. This website template has several pages: <a href="courses.html">Courses</a>, <a href="programs.html">Programs</a>, <a href="teachers.html">Teachers</a>, <a href="admissions.html">Admissions</a>, <a href="contacts.html">Contacts</a> (note that contact us form – doesn’t work).</p>
            </div>
            <a href="#" class="button"><span><span>Read More</span></span></a>
            <div class="pad_left1">
              <h2>Individual Approach to Education!</h2>
            </div>
            <div class="wrapper">
              <figure class="left marg_right1"><img src="<?php echo base_url(); ?>images/page1_img4.jpg" alt=""></figure>
              <p class="pad_bot1 pad_top2"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore.</strong></p>
              <p> Learn Center Template goes with two packages – with PSD source files and without them. PSD source files are available for free for the registered members of Templates.com. The basic package (without PSD source is available for anyone without registration).</p>
            </div>
            <div class="pad_top2"> <a href="#" class="button"><span><span>Read More</span></span></a> </div>
          </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
                <h2><a href="<?php echo base_url(); ?>front_controller/all_notices_component.aspx">Notice</a></h2>
            </div>
            <ul class="list1">
                
                <?php foreach ($recent_notices as $v_notice) { ?>
                
                <li><a href="<?php echo base_url(); ?>front_controller/details_notice_component/<?php echo $v_notice->notice_id; ?>"><?php echo $v_notice->notice_title; ?></a></li>
              
                <?php } ?>
              
            </ul>
            <div class="pad_top2"> <a href="<?php echo base_url(); ?>front_controller/all_notices_component.aspx" class="button"><span><span>View   All   Notices</span></span></a> </div>
            
          </article>
        </div>
      </div>
