<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

      <div class="box1">
        <div class="wrapper">
          <article class="col1">
              
            <?php 

            if(count($assigned_courses)>0){
                ?>
              <h1>Assigned   Courses   Of : 
              <?php echo $assigned_courses[0]->first_name.' '.$assigned_courses[0]->middle_name.' '.$assigned_courses[0]->last_name; ?></h1>
              <hr/>
            <table>
                    <tr>
                        <th>&nbsp;Course   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Class   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Term   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Year   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                    <?php
                foreach ($assigned_courses as $v_assigned_course){
                    ?>

                    <tr>
                        <td>&nbsp;<?php switch ($v_assigned_course->course){
                                case 'b':
                                    echo 'Bangla';
                                    break;
                                case 'b1':
                                    echo 'Bangla   First   Paper';
                                    break;
                                case 'b2':
                                    echo 'Bangla   Second   Paper';
                                    break;
                                case 'e':
                                    echo 'English';
                                    break;
                                case 'e1':
                                    echo 'English   First   Paper';
                                    break;
                                case 'e2':
                                    echo 'English   Second   Paper';
                                    break;
                                case 'm':
                                    echo 'General   Mathmatics';
                                    break;
                                case 'hm':
                                    echo 'Higher   Mathmatics';
                                    break;
                                case 'm1':
                                    echo 'Mathmatics   First   Paper';
                                    break;
                                case 'm2':
                                    echo 'Mathmatics   Second   Paper';
                                    break;
                                case 'gs':
                                    echo 'General   Science';
                                    break;
                                case 'ss':
                                    echo 'Social   Science';
                                    break;
                                case 'is':
                                    echo 'Islamic   Studies';
                                    break;
                                case 'hs':
                                    echo 'Hindu   Studies';
                                    break;
                                case 'bs':
                                    echo 'Buddhist   Studies';
                                    break;
                                case 'cs':
                                    echo 'Christian   Studies';
                                    break;
                                case 'p':
                                    echo 'Physics';
                                    break;
                                case 'p1':
                                    echo 'Physics   First   Paper';
                                    break;
                                case 'p2':
                                    echo 'Physics   Second   Paper';
                                    break;
                                case 'c':
                                    echo 'Chemistry';
                                    break;
                                case 'c1':
                                    echo 'Chemistry   First   Paper';
                                    break;
                                case 'c2':
                                    echo 'Chemistry   Second   Paper';
                                    break;
                                case 'bl':
                                    echo 'Biology';
                                    break;
                                case 'bt':
                                    echo 'Botany';
                                    break;
                                case 'zc':
                                    echo 'Zoology';
                                    break;
                                case 'i':
                                    echo 'Coputer   and   Information   Technology';
                                    break;
                                case 'i1':
                                    echo 'Coputer   and   Information   Technology   First   Paper';
                                    break;
                                case 'i2':
                                    echo 'Coputer   and   Information   Technology   Second   Paper';
                                    break;
                                case 'a':
                                    echo 'Agricultural   Science';
                                    break;
                                case 'he':
                                    echo 'Home   Economics';
                                    break;
                                case 'pe':
                                    echo 'Physical   Education';
                                    break;
                                case 'ad':
                                    echo 'Arts   and   Drawing';
                                    break;
                                default :
                                    echo 'No   Course';
                        } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $v_assigned_course->class; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?php switch ($v_assigned_course->term){
                                case '1':
                                    echo 'Half - Yearly';
                                    break;
                                case '2':
                                    echo 'Final';
                                    break;
                        } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $v_assigned_course->year; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>

                        </tr>
                        <?php
                }?>

            </table>

                    <?php
            }

             else {
                echo "<h1>No    Assigned   Course  to  show</h1>";
            }

            ?>
          </article>
          <article class="col2 pad_left2">
            <div class="pad_left1">
                <?php if(count($assigned_courses)>0){ ?>
                <h3><strong>View  Details   Information : </strong></h3>
                <a href="<?php echo base_url() ?>front_controller/details_teacher_component/<?php echo $assigned_courses[0]->teacher_id ?>" class="button marg_top1"><span><span>&nbsp;&nbsp; Details &nbsp;&nbsp;</span></span></a>
                <?php } ?>
            </div>
          </article>
        </div>
      </div>