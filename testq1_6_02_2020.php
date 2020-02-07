<?php
//below lines are used to show error on my localhost apache server
ini_set('display_errors', 1);
error_reporting(E_ALL);

//below is the array which defines student detail
 $student = array(
 array('id' => '1', 'name' => 'ram', 'dob' => strtotime("1998-05-26"), 'grade' => '8', 'paper' => 0, 'passed' => 0, 'result' => 0),
 array('id' => '2', 'name' => 'shaam', 'dob' => strtotime("1998-05-26"), 'grade' => '9', 'paper' => 0, 'passed' => 0, 'result' => 0),
 array('id' => '3', 'name' => 'jaam', 'dob' => strtotime("1998-05-26"), 'grade' => '10', 'paper' => 0, 'passed' => 0, 'result' => 0),
 array('id' => '4', 'name' => 'balm', 'dob' => strtotime("1998-05-26"), 'grade' => '11', 'paper' => 0, 'passed' => 0, 'result' => 0),
 array('id' => '5', 'name' => 'bhagwan', 'dob' => strtotime("1998-05-26"), 'grade' => '12', 'paper' => 0, 'passed' => 0, 'result' => 0)
 );

 //below is the array which define subject details according to grades
 $subject = array(
   array('grade' => 8, 'name' => 'a', 'code' => '08', 'mm' => '40'),
   array('grade' => 9, 'name' => 'b', 'code' => '09', 'mm' => '40'),
   array('grade' => 10, 'name' => 'c', 'code' => '010', 'mm' => '35'),
   array('grade' => 11, 'name' => 'd', 'code' => '011', 'mm' => '30'),
   array('grade' => 12, 'name' => 'e1', 'code' => '0121', 'mm' => '30'),
   array('grade' => 12, 'name' => 'e2', 'code' => '0122', 'mm' => '30'),
   array('grade' => 12, 'name' => 'e3', 'code' => '0123', 'mm' => '30'),
   array('grade' => 12, 'name' => 'e4', 'code' => '0124', 'mm' => '30'),
   array('grade' => 12, 'name' => 'e5', 'code' => '0125', 'mm' => '30')
 );

 //below is the array which defines students marks detail
 $student_detail = array(
   array('id' => '1', 'code' => '08', 'marks' => '56'),
   array('id' => '2', 'code' => '09', 'marks' => '67'),
   array('id' => '3', 'code' => '010', 'marks' => '78'),
   array('id' => '4', 'code' => '011', 'marks' => '89'),
   array('id' => '5', 'code' => '0121', 'marks' => '90'),
   array('id' => '5', 'code' => '0122', 'marks' => '9'),
   array('id' => '5', 'code' => '0123', 'marks' => '9'),
   array('id' => '5', 'code' => '0124', 'marks' => '9'),
   array('id' => '5', 'code' => '0125', 'marks' => '9')
 );

//below code is used to measure the "result" field of the students
 foreach($student as &$value){
   foreach($student_detail as &$key){
     if($value['id'] == $key['id']){
       $value['paper']++;
       if($value['grade'] == 12){
         if($key['marks'] > 29){
           $value['passed']++;
         }
         $value['result'] = $value['passed']/$value['paper'];
       }
       if($value['grade'] == 11){
         if($key['marks'] > 29){
           $value['passed']++;
         }
         $value['result'] = $value['passed']/$value['paper'];
       }
       if($value['grade'] == 10){
         if($key['marks'] > 34){
           $value['passed']++;
         }
         $value['result'] = $value['passed']/$value['paper'];
       }
       if($value['grade'] == 9){
         if($key['marks'] > 39){
           $value['passed']++;
         }
         $value['result'] = $value['passed']/$value['paper'];
       }
       if($value['grade'] == 8){
         if($key['marks'] > 39){
           $value['passed']++;
         }
         $value['result'] = $value['passed']/$value['paper'];
       }
     }
   }
 }

//below code is used for styliong the table
 echo "<style type='text/css'>
   table, th {
     border: 1px solid black;
   }
 </style>";

 //below function is used to show the subject details
 //$grade variable takes the grade whose subjects are asked to show
 //$subject variable takes the $subject array in it
 function grade_detail($grade , $subject){
   echo "<table><th>Subject</th><th>Subject Code</th><th>Minimum Marks</th>";
   foreach($subject as $value){
     if($value['grade'] == $grade){
       echo "<tr><td>".$value['name']."</td><td>".$value['code']."</td><td>".$value['mm']."</td>";
     }
   }
 }


 //below function is used to show the subject code and obtained marks of specific student
 //$id variable takes the student id whose subject detaiuls are to eb showed
 //$subject variable takes the $subject array in it
 function student_detail($id , $student_detail){
   echo "<table><th>Subject Code</th><th>Marks Obtained</th>";
   foreach($student_detail as $value){
     if($value['id'] == $id){
       echo "<tr><td>".$value['code']."</td><td>".$value['marks']."</td></td>";
     }
   }
 }

 //below function is used to show the student whole detail in tabular form
 //$student variable takes the $student array
 //$subject variable takes the $subject array
 //$student_detail variable takes the $student_detail array
 function student($student , $student_detail , $subject){
   echo "<table><th>Name</th><th>DOB</th><th>Grade</th><th>Subject</th><th>Result</th>";
   foreach($student as $value){
     echo "<tr><td>".$value['name']."</td><td>".date('m/d/Y',$value['dob'])."</td><td>".$value['grade']."</td><td>";
     foreach($student_detail as $key){
       if($value['id'] == $key['id']){
         foreach($subject as $val){
           if($val['code'] == $key['code']){
             echo $val['name']."(".$key['marks'].",".$val['mm'].")";
             echo "<br>";
           }
         }
       }
     }
     echo "</td>";
     if($value['result'] >= 0.4){
       echo "<td>Pass</td>";
     }
     else{
       echo "<td>Fail</td>";
     }
   }
 }
 grade_detail(12 , $subject);
 student_detail(5 , $student_detail);
 student($student , $student_detail , $subject);
?>
