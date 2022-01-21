<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php 

if(count($marks)>0){
    ?>
        
<table>
        <tr>
            <th> Course </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> First  Class   Test </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> Second   Class   Test </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> Third   Class   Test </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> Main   Exam : Out of 100 </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> Total : Out of 120 </th>
            <th> &nbsp;&nbsp; | &nbsp;&nbsp; </th>
            <th> Grade </th>
        </tr>
        <?php
    foreach ($marks as $v_mark){
        ?>
            
        <tr>
            <td> <?php switch ($v_mark->course){
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
            } ?> </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> <?php echo $v_mark->first_class_test; ?> </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> <?php echo $v_mark->second_class_test; ?> </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> <?php echo $v_mark->third_class_test; ?> </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> <?php echo $v_mark->main_exam; ?> </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> 
                <?php echo $total_marks[$v_mark->mark_id]; ?>
             
            </td>
            <td> &nbsp;&nbsp; : &nbsp;&nbsp; </td>
            <td> 
                <?php echo $grades[$v_mark->mark_id]; ?>
             
            </td>
            
            </tr>
            <?php
    }?>
        
</table>
        
        <?php
}

 else {
    echo "<h1>No    Mark  to  show</h1>";
}

?>