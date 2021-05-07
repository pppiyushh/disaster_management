<?php

    session_start();

    $link = mysqli_connect("localhost", "phpmyadmin", "hello", "youarestrong");

     if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

     if ($_GET['function'] == "logout") {
        
        session_unset();
        
    }

    function displayUserInfo() {
    	
    	global $link;

    	if($_SESSION['id'] > 0) {

    	 $query = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    	 $result = mysqli_query($link, $query);
    	 
    	    if($row = mysqli_fetch_assoc($result)) {

    	 	    echo "<div class='card' style='background:black; color:white;'>
    <div class='row-fluid'> <div class='span8'>
            <h6>Email: ".mysqli_real_escape_string($link, $row['email'])."</h6>
                    </div>
  			     <h6>Usertype : ".mysqli_real_escape_string($link, $row['usertype'])."</h6></div></div>";
  			    $_SESSION['usertype'] = mysqli_real_escape_string($link, $row['usertype']);

    	    } 
    	    else {
    	 	     echo "Data not found";
    	    }
        } 
    }

    function displayUserRegisteredEvents() {
        global $link;

        if($_SESSION['id'] > 0) {

            $query = "SELECT * FROM userevent WHERE userid = ". mysqli_real_escape_string($link, $_SESSION['id']);
            $result = mysqli_query($link, $query);

            while($row = mysqli_fetch_assoc($result)){

                $query2 = "SELECT * FROM events WHERE eventid = ". mysqli_real_escape_string($link, $row['eventid']);
                $result2 = mysqli_query($link, $query2);
                $row2 = mysqli_fetch_assoc($result2);

                echo " <div class='container'>
          <div class='card'>
            <div class='card-body'>
              <h4 class='card-title'>Event Name: ".mysqli_real_escape_string($link, $row2['name'])."</h4>
              <p class='card-text'>Event Date and Time: ".mysqli_real_escape_string($link, $row2['date'])."</p>
              <p class='card-text'>Confirmed : ".mysqli_real_escape_string($link, $row2['confirmed'])."</p>
              <p class='card-text'>Place: ".mysqli_real_escape_string($link, $row2['place'])."</p>
            </div></div></div>";
            }
        }

    }

    function displayUserCreatedEvents() {

    	global $link;

    	if($_SESSION['id'] > 0) {

    		$query = "SELECT * FROM events WHERE speakerid = ". mysqli_real_escape_string($link, $_SESSION['id']);
    	    $result = mysqli_query($link, $query);

    	    while($row = mysqli_fetch_assoc($result)) {
            echo " <div class='container'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>Event Name: ".mysqli_real_escape_string($link, $row['name'])."</h4>
                  <p class='card-text'>Event Date and Time: ".mysqli_real_escape_string($link, $row['date'])."</p>
                  <p class='card-text'>Confirmed : ".mysqli_real_escape_string($link, $row['confirmed'])."</p>
                  <p class='card-text'>Place: ".mysqli_real_escape_string($link, $row['place'])."</p>
                </div></div></div>";
      			
    	}
    	 
    	}
    }

    function getProbableEventDetails() {

    	global $link;

		if($_SESSION['id'] > 0) {	

                $query =  "SELECT * FROM events WHERE confirmed = 'NO'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    $query2 = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $row['speakerid'])." LIMIT 1";
                    $result2 = mysqli_query($link, $query2);
                    $row2= mysqli_fetch_assoc($result2);
                    echo "<div class='container'>
                        <div class='card'><div class='card-body'>Event ID : ".mysqli_real_escape_string($link, $row['eventid'])."  
                            <h5 class='card-title'>Event Name : ".mysqli_real_escape_string($link, $row['name'])."</h5>
                            <p class='card-text'>By : ".mysqli_real_escape_string($link, $row2['email'])."</p>
                          <div class='card-footer text-muted'> on ".mysqli_real_escape_string($link, $row['date'])."  in  ".mysqli_real_escape_string($link, $row['place']). 
                          "</div></div></div></div>";
                }
        }
    }

    function getConfirmedEventDetails() {

        global $link;

        if($_SESSION['id'] > 0) {   

                $query =  "SELECT * FROM events WHERE confirmed = 'YES'";
                $result = mysqli_query($link, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    $query2 = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($link, $row['speakerid'])." LIMIT 1";
                    $result2 = mysqli_query($link, $query2);
                    $row2= mysqli_fetch_assoc($result2);
                    echo "<div class='container'>
                        <div class='card'><div class='card-body'>Event ID : ".mysqli_real_escape_string($link, $row['eventid'])."  
                            <h5 class='card-title'>Event Name : ".mysqli_real_escape_string($link, $row['name'])."</h5>
                            <p class='card-text'>By : ".mysqli_real_escape_string($link, $row2['email'])."</p>
                          <div class='card-footer text-muted'> on ".mysqli_real_escape_string($link, $row['date'])."  in  ".mysqli_real_escape_string($link, $row['place']). 
                          "</div></div></div></div>";
                }
        }
    }

    function clearRedundantEvents() {

        global $link;

        if($_SESSION['id'] > 0) {

            $query = "SELECT * FROM events";
            $result =  $result = mysqli_query($link, $query); 
            while($row =  mysqli_fetch_assoc($result)) {
                if(strtotime($row['date']) <= strtotime(date('d-m-Y H:i:s'))) {
                    $query = "DELETE FROM events WHERE eventid = ".mysqli_real_escape_string($link, $row['eventid']);
                    mysqli_query($link, $query);
                    $query = "DELETE FROM userevent WHERE eventid = ".mysqli_real_escape_string($link, $row['eventid']);
                    mysqli_query($link, $query);
                }
            }
        }  

    }

?>