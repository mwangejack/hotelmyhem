<?php
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsavehotel']))
	{
		$hotelnam = $_POST['hotelname'];// user name
		 $hotellocation= $_POST['hotellocation'];// user name
		$hoteldescription = $_POST['description'];
		$hotelemail = $_POST['hotelemail'];		// user email
		
		$hotelpass = $_POST['hotelpass'];
		$hotelcontact = $_POST['hotelcontact'];
		$hoteltable = $hotelnam."_".$hotellocation;
		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($hotelnam)){
			$errMSG = "Please Enter Hotel name.";
		}
		else if(empty($hotelemail)){
		$errMSG = "Please Enter a Password";
		}
		else if(empty($hotelpass)){
		$errMSG = "Please Enter Email Address";
		}
		else if(empty($hotelcontact)){
		$errMSG = "Please Enter a Contact Number";
		}
		else if(empty($hotellocation)){
		$errMSG = "Please Enter Your Location";
		}
		else if(empty($hoteldescription)){
			$errMSG = "Please Enter a Description.";
		}

		else if(empty($imgFile)){
			$errMSG = "Please Select a Photo";
		}
		else
		{
			 $stmt = $DB_con->prepare('SELECT email FROM hotels where email= :hem ');
 			$stmt->bindParam(':hem',$hotelemail);
  			$stmt->execute();
  			if($stmt->rowCount() > 0){
  				$errMSG = "Sorry, email already exists!!.";
  			}
  			else{
  			try{
				$stmt_table = "CREATE TABLE `.$hoteltable .`( service_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, service_name VARCHAR(30) NOT NULL )";
			$DB_con->exec($stmt_table);}
			catch(PDOException $e){
				$errMSG= $stmt_table."<br>" . $e->getMessage();
			}
			$upload_dir = 'hotelpics/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$hotelpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$hotelpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$hotelpass = md5($hotelpass);			
			$stmt = $DB_con->prepare('INSERT INTO hotels(hotelname,email,password,contact,location,description,hotelpic,status) VALUES(:hname, :hemail, :hpass, :hcontact, :hlocation, :hdescription, :hpic, :hstatus)');
			$stmt->bindParam(':hname',$hotelnam);
			$stmt->bindParam(':hemail',$hotelemail);
			$stmt->bindParam(':hpass',$hotelpass);
			$stmt->bindParam(':hcontact',$hotelcontact);
			$stmt->bindParam(':hlocation',$hotellocation);
			$stmt->bindParam(':hdescription',$hoteldescription);
			$stmt->bindParam(':hpic',$hotelpic);
			$stmt->bindParam(':hstatus',$status);
			
			if($stmt->execute())
			{
				$successMSG = "new hotel added succesfully ...";
				 // redirects image view page after 5 seconds.
				
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
		if(isset($_GET['hremove']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT hotelpic FROM hotels WHERE hotelname =:hname');
		$stmt_select->execute(array(':hname'=>$_GET['hremove']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM hotels WHERE hotelname =:hname');
		$stmt_delete->bindParam(':hname',$_GET['hremove']);
		$stmt_delete->execute();
		
		header("Location:myadmin.php");
	}

	if(isset($_POST['hdeactivate']))
	{
		
		// it will deactivate a record from db
		$stmt_deactivate = $DB_con->prepare('UPDATE hotels SET status="deactivated" WHERE hotelname =:deactivate');
		$stmt_deactivate->bindParam(':deactivate',$_POST['hdeactivate']);
		$stmt_deactivate->execute();
		
		header("refresh:5;myadmin.php");
	}
		if(isset($_POST['hactivate']))
	{
		
		// it will deactivate a record from db
		$stmt_activate = $DB_con->prepare('UPDATE hotels SET status="activated" WHERE hotelname =:activate');
		$stmt_activate->bindParam(':activate',$_POST['hactivate']);
		$stmt_activate->execute();
		
		header("refresh:5;myadmin.php");
	}

	session_start();
  if(isset($_POST['btnloginhotel'])){
  	$em = $_POST['hloginemail'];
  	$pass = $_POST['hloginpass'];
  	$lhname = $_POST['hloginname'];

  	if(empty($lhname)){
			$errMSG = "Please enter hotel name.";
		}
		else if(empty($em)){
			$errMSG = "Please Enter Hotel Email.";
		}
		else if(empty($pass)){
			$errMSG = "Please Enter the password.";
		} else{
			$pass = md5($pass);
  $stmt = $DB_con->prepare('SELECT hotelname, email, password FROM hotels where  email=:lemail and password= :lpass');
  $stmt->bindParam(':lemail',$em);
  $stmt->bindParam(':lpass',$pass);
  $stmt->execute();
   if($stmt->rowCount() ==1){
   	$_SESSION['hlname'] = $lhname;
  header("Location:hservices.php");
		}
    else
  	{
  	$errMSG = "email or password incorrect please try again !!";
  }
  }}  
  ?>