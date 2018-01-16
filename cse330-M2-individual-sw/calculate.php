<?php
echo "\t<p>Welcome to my calculator</p>\n";
$username = $_GET["user"];
  $operate = $_GET["operate"];
  $num1 =$_GET["num1"];
  $num2 =$_GET["num2"];
  
	echo "Hello " . $username;
	echo "<br>";
  
	is_numeric($num1) or die("<font color='red'>num1 is not a number</font>");
	is_numeric($num2) or die("<font color='red'>num2 is not a number</font>");
	
	if($num2 ==null){
	echo "<font color='red'>please enter a number as number2</font>";
			die();
	}
	if($num1 ==null){
	echo "<font color='red'>please enter a number as number1</font>";
			die();
	}
	
	if($operate =="1"){
		$sum=$num1+$num2;
		echo "$num1 ➕ $num2 =$sum";
	}
	elseif($operate =="2"){
		$sum=$num1-$num2;
		echo "$num1 ➖ $num2 =$sum";
	}
	elseif($operate =="3"){
		$sum=$num1*$num2;
		echo "$num1 ✖️ $num2 =$sum";
	}
	elseif($operate =="4"){
		if($num2 =="0"){
			echo "<font color='red'>can't use '0' as divisor</font>";
			die();
		}
		$sum=$num1/$num2;
		echo "$num1 ➗ $num2 =$sum";
	}
?>
