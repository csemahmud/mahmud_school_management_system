<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

      <div class="box1">
        <div class="wrapper">
          <article class="col1">
            <table>
                
                <?php if($student_info->student_image != '') { ?>
                <tr>
                    <td></td>
                    <td>
                        <figure class="left marg_right1"><img height="160" src="<?php echo base_url().$student_info->student_image; ?>" alt=""></figure>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>.</td>
                    <td>.</td>
                </tr>

                <tr>

                    <td><strong>First   Name : </strong></td>
                    <td><?php echo $student_info->first_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Middle   Name : </strong></td>
                    <td><?php echo $student_info->middle_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Last   Name : </strong></td>
                    <td><?php echo $student_info->last_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Class : </strong></td>
                    <td><?php echo $student_info->class; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Father's   Name : </strong></td>
                    <td><?php echo $student_info->father_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Mother's   Name : </strong></td>
                    <td><?php echo $student_info->mother_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Date   of   Birth : </strong></td>
                    <td><?php echo $student_info->birth_date; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Gender : </strong></td>
                    <td><?php 
                    switch ($student_info->gender){
                    case 'm':
                        echo 'Male';
                        break;
                    case 'f':
                        echo 'Female';
                        break;
                    }
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Religion : </strong></td>
                    <td><?php 
                    switch ($student_info->religion){
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
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Phone : </strong></td>
                    <td><?php echo $student_info->phone; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Email : </strong></td>
                    <td><?php echo $student_info->email; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Address : </strong></td>
                    <td><?php echo $student_info->address; 
                    ?></td>

                </tr>

            </table>
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