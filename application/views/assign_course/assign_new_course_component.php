<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

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
            <h2><i class="icon-plus"></i> Assign New Course </h2>
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
            <h3 class="exception">
                <?php
                $assign_exception = $this->session->userdata('assign_exception');
                if ($assign_exception) {
                    echo $assign_exception;
                    $this->session->unset_userdata('assign_exception');
                }
                ?>

            </h3>
            <form name="assign_course_form" action="<?php echo base_url() ?>samsung_ac_controller/save_assigned_courses.aspx" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Class: </label>
                        <div class="controls">
                            <select name="class" required="required" exclude=" " id="selectError3">
                                <option value=" ">---Select   Class---</option>
                                    <script type="text/javascript">

                                        print_classes_options();

                                    </script>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Term : </label>
                        <div class="controls">
                            <select name="term" required="required" exclude=" " id="selectError3">
                                <option value=" ">---Select   Term---</option>
                                    <script type="text/javascript">

                                        print_terms_options();

                                    </script>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Select   Year : </label>
                        <div class="controls">
                            <select name="year" required="required" exclude=" " id="selectError3">
                                <option value=" ">---Select   Year---</option>
                                <?php 

                                    $start_year = date("Y")-5; 
                                    for($i=$start_year;$i<$start_year+10;$i++){

                                 ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">How many courses you want to assign ? : </label>
                        <div class="controls">
                            <input type="text" name="course_count" class="span6 typeahead" required="required" placeholder="Enter   Number   of   Courses   ....."  id="typeahead" onkeyup="show_assign_course_row(this.value)"  data-provide="typeahead" data-items="4" >
                            
                        </div>
                    </div>
                    
                    <div id="assign_course_row"></div>
                        
                </fieldset>
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<script type="text/javascript">
            
    function show_assign_course_row(course_count){
        if(course_count.length==0){
            document.getElementById('assign_course_row').innerHTML = '';
            return ;
        }

        if(window.XMLHttpRequest){
            //   code   for   IE7+,   Firefox   Chrome,   Opera   and   Safari
            var xmlhttp = new XMLHttpRequest();
        }
        else{
            //   code   for   IE6,   IE5
            var xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('assign_course_row').innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open('GET','<?php echo base_url(); ?>samsung_ac_controller/show_assign_course_rows/'+course_count,true);
        xmlhttp.send();
    }

    document.forms['assign_course_form'].elements['class'].value = '<?php 
    if(isset($class)){
        echo $class;
    }
    else {
        echo " ";
   }
            ?>';
    document.forms['assign_course_form'].elements['term'].value = '<?php 
    if(isset($term)){
        echo $term;
    }
    else {
        echo " ";
   }
            ?>';
    document.forms['assign_course_form'].elements['year'].value = '<?php 
    if(isset($year)){
        echo $year;
    }
    else {
        echo " ";
   }
            ?>';
    
    
</script>