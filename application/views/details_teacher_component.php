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
                
                <?php if($teacher_info->teacher_image != '') { ?>
                <tr>
                    <td></td>
                    <td>
                        <figure class="left marg_right1"><img height="160" src="<?php echo base_url().$teacher_info->teacher_image; ?>" alt=""></figure>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td>.</td>
                    <td>.</td>
                </tr>
                <tr>

                    <td><strong>First   Name : </strong></td>
                    <td><?php echo $teacher_info->first_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Middle   Name : </strong></td>
                    <td><?php echo $teacher_info->middle_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Last   Name : </strong></td>
                    <td><?php echo $teacher_info->last_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Activity   Status   : </strong></td>
                    <td><?php 
                    switch ($teacher_info->activity_status) {
                        case 0:
                            echo 'Inactive';
                            break;
                        case 1:
                            echo 'Active';
                            break;
                    } 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Father's   Name : </strong></td>
                    <td><?php echo $teacher_info->father_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Mother's   Name : </strong></td>
                    <td><?php echo $teacher_info->mother_name; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Date   of   Birth : </strong></td>
                    <td><?php echo $teacher_info->birth_date; 
                    ?></td>

                </tr>
                <tr>

                    <td><strong>Gender : </strong></td>
                    <td><?php 
                    switch ($teacher_info->gender){
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
                    switch ($teacher_info->religion){
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

                    <td><strong>Address : </strong></td>
                    <td><?php echo $teacher_info->address; 
                    ?></td>

                </tr>

            </table>
              
              <?php if(count($qualifications) >0 ) { ?>
                  
                  <h3>Academic Qualification :- </h3>
                  <table>
                      <tr>
                          <th>Degree</th>
                          <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
                          <th>Major</th>
                          <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
                          <th>Institute</th>
                      </tr>
                      
                      <?php foreach ($qualifications as $v_qualification) { ?>
                          
                      <tr>
                          
                          <td>   <?php echo $v_qualification->degree; ?>   </td>
                          <td> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
                          <td>   <?php echo $v_qualification->department; ?>   </td>
                          <td> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
                          <td>   <?php echo $v_qualification->institute; ?>   </td>
                          
                      </tr>
                          
                          <?php } ?>
                      
                  </table>
                  
                  <?php } ?>
                  
                    <?php if(count($experiences) >0 ) { ?>

                        <h3>Experience :- </h3>
                        <table>
                            <tr>
                                <th>Designation</th>
                                <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
                                <th>Institute</th>
                                <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
                                <th>Years</th>
                            </tr>

                            <?php foreach ($experiences as $v_experience) { ?>

                            <tr>

                                <td>   <?php echo $v_experience->designation; ?>   </td>
                                <td> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
                                <td>   <?php echo $v_experience->institute; ?>   </td>
                                <td> &nbsp;&nbsp; | &nbsp;&nbsp; </td>
                                <td>   <?php echo $v_experience->years; ?>   </td>

                            </tr>

                                <?php } ?>
                        </table>

                        <?php } ?>
                  
          </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
                <h3><strong>View   Assigned   Courses : </strong></h3>
                <a href="<?php echo base_url() ?>front_controller/assigned_courses_component/<?php echo $teacher_info->teacher_id ?>" class="button marg_top1"><span><span>&nbsp;&nbsp; View &nbsp;&nbsp;</span></span></a>
            </div>
          </article>
        </div>
      </div>