<?php 

session_start();

function signup($data)
{
    $errors = array();

    // Check if the form keys are set before accessing them
    $username = isset($data['username']) ? $data['username'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
    $password = isset($data['password']) ? $data['password'] : '';
    $password2 = isset($data['password2']) ? $data['password2'] : '';

    //checks if username starts and ends only with chars 
    if(!preg_match('/^[a-zA-Z]+$/', $username)){
        $errors[] = "Please enter a valid username";
    }
    //filter mail
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Please enter a valid email";
    }
    //checks if password length>4
    if(strlen(trim($password)) < 4){
        $errors[] = "Password must be at least 4 chars long";
    }
    //checks if password matches
    if($password != $password2){
        $errors[] = "Passwords must match";
    }

    // Only run the database check if email is valid to prevent the warning
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $check = database_run("select * from users where email = :email limit 1",['email'=>$email]);
        if(is_array($check)){
            $errors[] = "That email already exists";
        }
    }

    //save in the db
    if(count($errors) == 0){

        $arr['username'] = $username;
        $arr['email'] = $email;
        $arr['password'] = hash('sha256',$password);
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into users (username,email,password,date) values 
        (:username,:email,:password,:date)";

        database_run($query,$arr);
    }
    return $errors;
}
function login($data)
{
	$errors = array();
 
	//validate 
	if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

	if(strlen(trim($data['password'])) < 4){
		$errors[] = "Password must be atleast 4 chars long";
	}
 
	//check
	if(count($errors) == 0){

		$arr['email'] = $data['email'];
		$password = hash('sha256', $data['password']);

		$query = "select * from users where email = :email limit 1";

		$row = database_run($query,$arr);

		if(is_array($row)){
			$row = $row[0];
			if($password === $row->password){
				$_SESSION['USER'] = $row;
				$_SESSION['LOGGED_IN'] = true;
			}else{
				$errors[] = "wrong email or password";
			}

		}else{
			$errors[] = "wrong email or password";
		}
	}
	return $errors;
}

function database_run($query,$vars = array())
{
	$string = "mysql:host=localhost;dbname=projectclasse";
	$con = new PDO($string,'root','');

	if(!$con){
		return false;
	}

	$stm = $con->prepare($query);
	$check = $stm->execute($vars);

	if($check){
		
		$data = $stm->fetchAll(PDO::FETCH_OBJ);
		
		if(count($data) > 0){
			return $data;
		}
	}

	return false;
}
function check_login($redirect = true){

	if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])){

		return true;
	}

	if($redirect){
		header("Location: login.php");
		die;
	}else{
		return false;
	}
	
}