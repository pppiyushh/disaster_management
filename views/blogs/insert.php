<?php
include 'connectblog.php';

 session_start();
 if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

     if ($_GET['function'] == "logout") {
        
        session_unset();
        
    }
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$query = "SELECT * FROM users WHERE id = ". mysqli_real_escape_string($conn, $_SESSION['id'])." LIMIT 1";
    	 $result47 = mysqli_query($conn, $query);
		 
		if($row = mysqli_fetch_assoc($result47)) {

		$author = mysqli_real_escape_string($conn, $row['email']);

    	    } 
    	    else {
    	 	     $author = "Not Known";
    	    }

    $title = htmlspecialchars($_POST['post_title']);
    $content = htmlspecialchars($_POST['content']);
    
    $sql = "INSERT INTO blog_post(post_title, post_content, author, posted_on) values('".$title."','".$content."','".$author."','".date('Y/m/d')."');";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
    header('Location: http://localhost/disaster-management-cfd/index.php?page=blog');
    $conn->close();
}
else{
    echo "Request method not supported";
	 header('Location: http://localhost/disaster-management-cfd/index.php?page=blog');
}


?>