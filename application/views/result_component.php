<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

      <div class="box1">
        <div class="wrapper">
          <article class="col1">
              <h3>View   Result</h3>
              <table>
                  <tr>
                      
                  <div  class="wrapper"><td> <strong>Select   Year : </strong></td>
                    <td>
                  <div class="bg">
                      <select name="year" id="year" onchange="show_student_result_grid()" required="required" exclude=" " tabindex="4" err="Class  is  a  required   field">

                          <option value=" ">---   Select   Year   ---</option>
                          <?php 

                                    $start_year = date("Y")-5; 
                                    for($i=$start_year;$i<$start_year+10;$i++){

                                 ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>

                      </select>
                  </div>
                    </td>
                </div>
              </tr>
              <tr>
                <div  class="wrapper"><td> <strong>Select   Term : </strong>
                    </td>
                    <td>
                  <div class="bg">
                      <select name="term" id="term" onchange="show_student_result_grid()" required="required" exclude=" " tabindex="4" err="Class  is  a  required   field">

                          <option value=" ">---   Select   Term   ---</option>
                          <script type="text/javascript">

                              print_terms_options();

                          </script>

                      </select>
                  </div>
                    </td>
                </div>
              </tr>
              <tr>
                <div  class="wrapper"><td> <strong>Select   class : </strong>
                    </td>
                    <td>
                  <div class="bg">
                      <select name="class" id="class" onchange="show_student_result_grid()" required="required" exclude=" " tabindex="4" err="Class  is  a  required   field">

                          <option value=" ">---   Select   Class   ---</option>
                          <script type="text/javascript">

                              print_classes_options();

                          </script>

                      </select>
                  </div>
                    </td>
                </div>
              </tr>
              </table>
              <div id="show_student_result_grid"></div>
          </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
                <h3><strong>Logged  In  as : </strong></h3>
                <h3><i><?php echo $this->session->userdata('admin_student_name'); ?></i></h3>
                <a href="<?php echo base_url(); ?>front_st_controller/student_logout.aspx" class="button marg_top1"><span><span>&nbsp;&nbsp; Log   out &nbsp;&nbsp;</span></span></a>
            </div>
          </article>
        </div>
      </div>

<script type="text/javascript">

    function show_student_result_grid(){
        
        var year = document.getElementById('year').value;
        var term = document.getElementById('term').value;
        var st_class = document.getElementById('class').value;
    
        if((year==' ')||(term==' ')||(st_class==' ')){
            document.getElementById('show_student_result_grid').innerHTML = '';
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
                document.getElementById('show_student_result_grid').innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open('GET','<?php echo base_url(); ?>front_st_controller/show_student_result_grid/'+year+'/'+term+'/'+st_class);
        xmlhttp.send();
    }

</script>