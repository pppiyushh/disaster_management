<?php 

	include("functions.php");

	if($_GET['action'] == 'loginSignup') {

		$error = "";
        
       if (!$_POST['email']) {
            
            $error = "An email address is required.";
            
        } else if (!$_POST['password']) {
            
            $error = "A password is required";
            
        } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
  
            $error = "Please enter a valid email address.";
            
		}
        
        if ($error != "") {
            
            echo $error;
            exit();
            
        }
        

    	if ($_POST['loginActive'] == "0") {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {

            	$error = "That email address is already taken.";
            }
            else {
                $query = "INSERT INTO users (`email`, `password`,`usertype`,`state`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."', '".mysqli_real_escape_string($link, $_POST['usertype'])."' , '".mysqli_real_escape_string($link, $_POST['userstate'])."')";
                if (mysqli_query($link, $query)) {
                    
                    $_SESSION['id'] = mysqli_insert_id($link);
                    $_SESSION['usertype'] = $_POST['usertype'];
                    
                    $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                    mysqli_query($link, $query);
                    
                    echo 1;
                    
                    
                    
                } else {
                    
                    $error = "Couldn't create user - please try again later";
                    
                }
                
            }
            
        } else {
            
            $query = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
            
            $result = mysqli_query($link, $query);
            
            $row = mysqli_fetch_assoc($result);
                
                if ($row['password'] == md5(md5($row['id']).$_POST['password'])) {
                    
                    echo 1;
                    
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['usertype'] = $row['usertype'];

                } else {
                    
                    $error = "Could not find that username/password combination. Please try again.";
                    
                }

            
        }
        
         if ($error != "") {
            
            echo $error;
            exit();
            
        }

	}


	if($_GET['action'] == 'eventCreate') {
	   if($_POST['eventActive'] == 0) {	

	   		if (!$_POST['eventName']) {
	            
	       		$error = "An event name is required.";
	            
	       	} else if (!$_POST['datetime']) {
	  
	            $error = "An event date and time is required.";
	            
			} else if (!$_POST['place']) {
	  
	            $error = "An event state is required.";
	            
			} else if (strtotime($_POST['datetime']) <= strtotime(date('d-m-Y H:i:s'))) {

				$error = "This event datetime is not valid";
			}
			if ($error != "") {
	            
	            echo $error;
	            exit();
	            
	        }

	        $query = "SELECT * FROM events WHERE name = '". mysqli_real_escape_string($link, $_POST['eventName'])."' LIMIT 1";
	            $result = mysqli_query($link, $query);
	            if (mysqli_num_rows($result) > 0) {

	            	$error = "That event name is already taken.";
	            }

			if ($error != "") {
	            
	            echo $error;
	            exit();
	            
	        }

			$query = "INSERT INTO events (`name`, `speakerid`, `date`, `place`, `confirmed`,`userreg`) VALUES ('". mysqli_real_escape_string($link, $_POST['eventName'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."', '".mysqli_real_escape_string($link, $_POST['datetime'])."' , '".mysqli_real_escape_string($link, $_POST['place'])."' , '".mysqli_real_escape_string($link, 'NO')."', '".mysqli_real_escape_string($link, '0')."')";                
			if (mysqli_query($link, $query)) { 
				echo 1;
			}
			else {

				echo "Couldn't create event. Please try again after some time.";
			}
		}

		else {
			$error = "";
			if (!$_POST['eventId']) {
	            
	            $error = "An event id is required.";
	            
		    } else if (!$_POST['eventName']) {
		            
		       		$error = "An event name is required.";
		            
		    } else if (!$_POST['speakerEmail']) {
		  
	            $error = "The speaker's email id is required.";
	            
			}
			if ($error != "") {
	            
	            echo $error;
	            exit();
	            
	        }

			$query = "SELECT * FROM events WHERE eventid = '". mysqli_real_escape_string($link, $_POST['eventId'])."' LIMIT 1";
			$query2 = "SELECT * FROM users WHERE email = '". mysqli_real_escape_string($link, $_POST['speakerEmail'])."' LIMIT 1";
			$query3 = "SELECT * FROM userevent WHERE userid = ". mysqli_real_escape_string($link, $_SESSION['id']);
	        
	        $result = mysqli_query($link, $query);
	        $result2 = mysqli_query($link, $query2);
	        $result3 = mysqli_query($link, $query3);
	        if (mysqli_num_rows($result) ==  0) {

	            	$error = "That event does not exist. Please enter event name and event id correctly";
	        
	        }
	        else {

	            	$row = mysqli_fetch_assoc($result);
	            	$row2 = mysqli_fetch_assoc($result2);
	            	if($row['name'] != $_POST['eventName']) {
						$error = "That event does not exist. Please enter event name and event id correctly";
	            	} else if($row['speakerid'] != $row2['id']) {
	            		$error = "The speaker email is wrong for that event id";	
	            	} else if($row['place'] != $_POST['place']) {
	            		$error = "The event is not taking place in the city you selected";	
	            	} else {
	            		while($row3 = mysqli_fetch_assoc($result3)) {
	            			if($row3['eventid'] == $_POST['eventId']) {

	            				$error = "You are already registered for the event";
	            				break;
	            				
	            			}
	            			else {
	            				continue;
	            			}
	            		}
	            	}

	           		 if($error!=""){
	            		echo $error;
	            		exit();
	            	}

	            	$query = "INSERT INTO userevent (`eventid`, `name`, `userid`) VALUES ('". mysqli_real_escape_string($link, $_POST['eventId'])."', '".mysqli_real_escape_string($link, $_POST['eventName'])."', '".mysqli_real_escape_string($link, $_SESSION['id'])."')";
	            	if (mysqli_query($link, $query)) { 
	            		$query = "UPDATE events SET userreg = userreg + 1 WHERE eventid = ".mysqli_real_escape_string($link, $_POST['eventId']);
	            		mysqli_query($link, $query);
	            		if(mysqli_real_escape_string($link, $row['userreg']) > 9) {
	            			$query = "UPDATE events SET confirmed = '".mysqli_real_escape_string($link, 'YES')."' WHERE eventid = '".mysqli_real_escape_string($link, $_POST['eventId'])."'";
	            			mysqli_query($link, $query);
	            		}
 						echo 1;
 						exit();
					}
					else {

						echo "Couldn't register for event. Please try again after some time.";
					}

	        }
		}	
	}

?>