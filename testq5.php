<?php
//the below code is used to show the error on apache server
ini_set('display_errors', 1);
error_reporting(E_ALL);

//belwo array is a 2d array for the product detail
$array = array(
	array('pd' => 'pd1', 'sp' => 5, 'sd' => '4thFeb', 'ct' => 'C1'),
	array('pd' => 'pd1', 'sp' => 15, 'sd' => '5thFeb', 'ct' => 'C1'),
	array('pd' => 'pd2', 'sp' => 50, 'sd' => '4thFeb', 'ct' => 'C1'),
	array('pd' => 'pd3', 'sp' => 40, 'sd' => '6thFeb', 'ct' => 'C2'),
	array('pd' => 'pd2', 'sp' => 75, 'sd' => '3rdFeb', 'ct' => 'C1'),
	array('pd' => 'pd2', 'sp' => 65, 'sd' => '7thFeb', 'ct' => 'C1'),
  array('pd' => 'pd4', 'sp' => 190, 'sd' => '8thFeb', 'ct' => 'C2'),
);


$date = array();   //this variable is used to save the sales date
$month =array();   //this variable is used to save the sales month

//the below for loop is used to extract date from the array $array
for($i = 0; $i < count($array); $i++){
	if(preg_match('/[Feb]{3}/',$array[$i]['sd'])){
		preg_match_all('!\d+!', $array[$i]['sd'], $flag);
		$flag = $flag[0][0];
		array_push($date, $flag);
		array_push($month, 02);
	}
}

//the below array is a 2d array to store the category and product id from array $array
$detail = array(
	array(),
	array(),
);

//the below for lopp is used to extract the value of category and product
// in from array $array and add in the $detail array
for($i = 0; $i < count($array); $i++){
	preg_match_all('!\d+!', $array[$i]['ct'], $detail[$i][0]);
	preg_match_all('!\d+!', $array[$i]['pd'], $detail[$i][1]);
}

//the below for loop is used to sort the $array array on the basis of sales date
for($i = 0; $i < count($array); $i++){
	for($j = $i; $j < count($array); $j++){
		if($date[$i]>$date[$j]){
			$support_1=$detail[$i];
			$detail[$i]=$detail[$j];
			$detail[$j]=$support_1;

			$support_2=$array[$i];
			$array[$i]=$array[$j];
			$array[$j]=$support_2;

			$support_3=$date[$i];
			$date[$i]=$date[$j];
			$date[$j]=$support_3;

			$support_4=$month[$i];
			$month[$i]=$month[$j];
			$month[$j]=$support_4;
		}
	}
}

//the below for loop is used to sort the $array array on the basis of sales month
for($i = 0; $i < count($array); $i++){
	for($j = $i; $j < count($array); $j++){
		if($month[$i]>$month[$j]){
			$support_1=$detail[$i];
			$detail[$i]=$detail[$j];
			$detail[$j]=$support_1;

			$support_2=$array[$i];
			$array[$i]=$array[$j];
			$array[$j]=$support_2;

			$support_3=$date[$i];
			$date[$i]=$date[$j];
			$date[$j]=$support_3;

			$support_4=$month[$i];
			$month[$i]=$month[$j];
			$month[$j]=$support_4;
		}
	}
}

//the below for loop is used to sort the $array array on the basis of product id
for($i = 0; $i < count($array); $i++){
	for($j = $i; $j < count($array); $j++){
		if($detail[$i][1]>$detail[$j][1]){
			$support_1=$detail[$i];
			$detail[$i]=$detail[$j];
			$detail[$j]=$support_1;

			$support_2=$array[$i];
			$array[$i]=$array[$j];
			$array[$j]=$support_2;

			$support_3=$date[$i];
			$date[$i]=$date[$j];
			$date[$j]=$support_3;

			$support_4=$month[$i];
			$month[$i]=$month[$j];
			$month[$j]=$support_4;
		}
	}
}

//the below for loop is used to sort the $array array on the basis of category id
for($i = 0; $i < count($array); $i++){
	for($j = $i; $j < count($array); $j++){
		if($detail[$i][0]>$detail[$j][0]){
			$support_1=$detail[$i];
			$detail[$i]=$detail[$j];
			$detail[$j]=$support_1;

			$support_2=$array[$i];
			$array[$i]=$array[$j];
			$array[$j]=$support_2;

			$support_3=$date[$i];
			$date[$i]=$date[$j];
			$date[$j]=$support_3;

			$support_4=$month[$i];
			$month[$i]=$month[$j];
			$month[$j]=$support_4;
		}
	}
}

//the below for loop is used to manage the total sales rate per product from each category
for($i = 0;$i < count($array);$i++){
	for($j = $i-1;$j >= 0;$j--){
		if($array[$i]['ct'] == $array[$j]['ct'] && $array[$i]['pd'] == $array[$j]['pd']){
			echo "hello ji\n";
			$array[$i]['sp'] = $array[$i]['sp'] + $array[$j]['sp'];
			break;
		}
	}
}

//the below for loop is used to change category id with the combination of category and product id
for($i=0;$i<count($array);$i++){
	$array[$i]['ct'] = $array[$i]['ct'].'-'.$array[$i]['pd'];
}

//the below line code is used to print the final output array
print_r($array);
?>
