<?php
	/* Libchart - PHP chart library
	 * Copyright (C) 2005-2011 Jean-Marc Tr�meaux (jm.tremeaux at gmail.com)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 * 
	 */
	
	/**
	 * Pie chart demonstration
	 *
	 */

	include "application/libraries/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
        
        $a_plus = 0;
        $a = 0;
        $a_minus = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $f = 0;
        
        foreach ($marks as $v_mark) {
            $total_marks = (($v_mark->first_class_test+$v_mark->second_class_test+$v_mark->third_class_test)/3)+$v_mark->main_exam;
            $marks100 = $total_marks*100/120;
            
            if($marks100 >= 80) {
                $a_plus++;
            }
            elseif($marks100 >= 70) {
                $a++;
            }
            elseif($marks100 >= 60) {
                $a_minus++;
            }
            elseif($marks100 >= 50) {
                $b++;
            }
            elseif($marks100 >= 40) {
                $c++;
            }
            elseif($marks100 >= 33) {
                $d++;
            }
            else {
                $f++;
            }
        }
        
        $dataSet->addPoint(new Point("A+", $a_plus));
        $dataSet->addPoint(new Point("A", $a));
        $dataSet->addPoint(new Point("A-", $a_minus));
        $dataSet->addPoint(new Point("B", $b));
        $dataSet->addPoint(new Point("C", $c));
        $dataSet->addPoint(new Point("D", $d));
        $dataSet->addPoint(new Point("F", $f));

        
        $chart->setDataSet($dataSet);

	$chart->setTitle("Student   Grade   Percentage");
	$chart->render("images/result_pie_report.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
        <h3><strong>Year : </strong><i><?php echo $marks[0]->year ?></i></h3>
        <h3><strong>Term : </strong><i><?php echo $term ?></i></h3>
        <h3><strong>Class : </strong><i><?php echo $marks[0]->class ?></i></h3>
        <h3><strong>Course : </strong><i><?php echo $course ?></i></h3>
	<img alt="Pie chart"  src="<?php echo base_url();?>images/result_pie_report.png" style="border: 1px solid gray;"/>
</body>
</html>
