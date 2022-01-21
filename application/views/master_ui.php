<!DOCTYPE html>
<html lang="en">
<head>
<title>Learn Center | <?php echo $title; ?></title>
<meta charset="utf-8">
<meta name="keywords" content="school,education,management,system,mahmud,project,php,codeigniter,teacher,student,course,exam,mark">
<?php 
$mata_description
= "This web-application can be used for managing teacher, student, courses, exam, mark entry etc. in any educational institute.";
?>
<meta name="description" content="<?php echo $mata_description; ?>">
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url();?>css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" type="text/css" media="all">
        
        <style type="text/css">
            
            
          .message{
              color: #00ff00;
          }
          .exception{
              color: #ff0000;
          }
          .required{
              color: #ff3300;
              font-stretch: ultra-expanded;
              font-weight: 900;
              font-size: 16px;
          }
           
          .student_btn{
              height: 30px;
              width: 100px;
              background-color: #0000ff;
              color: #ffff66;
              font-size: 17px;
              font-weight: 900;
              font-stretch: ultra-expanded;
          }
          .student_btn:hover{
              height: 30px;
              width: 100px;
              background-color: #ffff00;
              color: #0000ff;
          }
        </style>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/cufon-replace.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Molengo_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/select_options.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jsval.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url();?>js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("<?php echo base_url();?>js/PIE.htc");}</style>
<![endif]-->
</head>
<body id="page<?php echo $page_id; ?>">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>front_controller/teachers_component.aspx">Teachers</a></li>
            <?php if($admission_status == 1){ ?>
            <li><a href="<?php echo base_url(); ?>front_controller/admissions_component.aspx">Admissions</a></li>
            <?php } ?>
            <?php if($this->session->userdata('admin_student_id') == NULL){ ?>
            <li><a href="<?php echo base_url(); ?>front_controller/Registration_component.aspx">Registration</a></li>
            <li><a href="<?php echo base_url(); ?>front_li_controller/student_login_component.aspx">Log In</a></li>
            <?php } ?>
            <?php if($this->session->userdata('admin_student_id') != NULL){ ?>
            <li><a href="<?php echo base_url(); ?>front_st_controller/result_component.aspx">Result</a></li>
            <li><a href="<?php echo base_url(); ?>front_st_controller/student_profile_component.aspx">Profile</a></li>
            <?php } ?>
            <li class="end"><a href="<?php echo base_url(); ?>front_controller/contacts_component.aspx">Contacts</a></li>
          </ul>
        </nav>
        <ul id="icon">
          <li><a href="#"><img src="<?php echo base_url(); ?>images/icon1.jpg" alt=""></a></li>
          <li><a href="#"><img src="<?php echo base_url(); ?>images/icon2.jpg" alt=""></a></li>
      <?php if(isset($icon3)){
          if($icon3){?>
          <li><a href="#"><img src="<?php echo base_url(); ?>images/icon3.jpg" alt=""></a></li>
        </ul><?php }
      } ?>
      </div>
      <div class="wrapper">
        <h1><a href="index.html" id="logo">Learn Center</a></h1>
      </div>
      <div id="slogan"> We Will Open The World<span>of knowledge for you!</span> </div>
      <?php if(isset($banners)){
          if($banners){?>
      <ul class="banners">
        <li><a href="#"><img src="<?php echo base_url(); ?>images/banner1.jpg" alt=""></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/banner2.jpg" alt=""></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/banner3.jpg" alt=""></a></li>
      </ul><?php }
      } ?>
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
        <?php echo $main_content; ?>
    </section>
    <!-- content -->
    <!-- footer -->
    <footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
              <article class="col_1">
                <h3>Address:</h3>
                <p class="col_address"><strong>Country:<br>
                  City:<br>
                  Address:<br>
                  Email:</strong></p>
                <p>USA<br>
                  San Diego<br>
                  Beach st. 54<br>
                  <a href="#">lcenter@mail.com</a></p>
              </article>
              <article class="col_2 pad_left2">
                <h3>Join In:</h3>
                <ul class="list2">
                  <li><a href="#">Sign Up</a></li>
                  <li><a href="#">Forums</a></li>
                  <li><a href="#">Promotions</a></li>
                  <li><a href="#">Lorem</a></li>
                </ul>
              </article>
              <article class="col_3 pad_left2">
                <h3>Why Us:</h3>
                <ul class="list2">
                  <li><a href="#">Lorem ipsum dolor </a></li>
                  <li><a href="#">Aonsect adipisic</a></li>
                  <li><a href="#">Eiusmjkod tempor </a></li>
                  <li><a href="#">Incididunt ut labore </a></li>
                </ul>
              </article>
              <article class="col_4 pad_left2">
                <h3>Newsletter:</h3>
                <form id="newsletter" action="#" method="post">
                  <div class="wrapper">
                    <div class="bg">
                      <input type="text">
                    </div>
                  </div>
                  <a href="#" class="button"><span><span><strong>Subscribe</strong></span></span></a>
                </form>
              </article>
            </div>
            <div class="wrapper">
              <article class="call"> <span class="call1">Call Us Now: </span><span class="call2">1-800-567-8934</span> </article>
              <article class="col_4 pad_left2">Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved<br>
                Design by <a target="_blank" href="http://www.templatemonster.com/">TemplateMonster.com</a></article>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>