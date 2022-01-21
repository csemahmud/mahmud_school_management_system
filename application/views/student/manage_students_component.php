<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Grid</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-th"></i> Student Manager  </h2>
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
            
            <form action="<?php echo base_url(); ?>samsung_st_controller/delete_selected_students.aspx" method="post" onsubmit="return validateStandard(this);" >
                <div class="control-group">
                    <label class="control-label" required="required" exclude=" " for="selectError3">Select   Class</label>
                    <div class="controls">
                        <select name="class" required="required" exclude=" " err="Class   must   be   selected" onchange="show_students(this.value)" id="selectError3">
                            <option value=" ">---   Select   Class   ---</option>
                            <script type="text/javascript">

                                print_classes_options();

                            </script>
                        </select>
                    </div>
                </div>
            
                <div id="student_grid"><h3>Select   Class   at  first</h3></div>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->

<script type="text/javascript">
            
    function show_students(class_p){
        if(class_p.length==0){
            document.getElementById('student_grid').innerHTML = '';
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
                document.getElementById('student_grid').innerHTML = xmlhttp.responseText;
            }
        }
        if(class_p == ' '){
            xmlhttp.open('GET', '<?php echo base_url(); ?>samsung_st_controller/show_student_grid',true);
        }
        else{
            xmlhttp.open('GET', '<?php echo base_url(); ?>samsung_st_controller/show_student_grid_by_class/'+class_p,true);
        }
        xmlhttp.send();
    }

</script>
