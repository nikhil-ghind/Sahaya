<?php
   session_start();
   
	require_once("../../../classes/Employee.class.php");
	
	if(isset($_POST["emp_login"])){

		$emp_email = $_POST["emp_email"];
		$emp_password = $_POST['emp_password'];
		$branch = $_POST["branch"];
		$employee = new Employee($branch);
		$_SESSION["db_name"] = $branch;
		$rs=$employee->checkEmployee($emp_email,$emp_password);

		if($rs == false){
		  echo "Fuck u";
		}
		else{
		  $array = iterator_to_array($rs);
		  $_SESSION['emp_id'] = $array[0]['emp_id'];
		  var_dump($array);
		}

	}else if(isset($_POST['registerSignUp'])){
		$branch = $_POST["branch"];
		$employee = new Employee($branch);
		$employee->registerEmployee($_POST);
	}
