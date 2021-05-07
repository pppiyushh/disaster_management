<html>

<head>
    <title>Create blog</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <!--
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" > <h3>StrongBlogs</h3> </a>
        <a href="?page=blog"><h3>Blogs</h3></a>
    </nav>
-->
<?php if ($_SESSION['id']) { ?>
      
       

    <div class="container card col-sm-7">
        
        <div class="form-header">
                <h3> Add Your Blog </h3>
        </div>
    
        <form action ="views/blogs/insert.php" method="POST"> 
       
            <div class="form-group">
                <label for="post_title">Post Title :</label>
                <input type="text" id="post_title" name="post_title" class="form-control"/>
            </div>
          
            <div class="form-group">
                <label for="content">Content :</label>
                <textarea id="content" name="content" class="form-control" rows="6"></textarea>
            </div>
            
            <button type="submit" class="btn">Submit</button>
        </form>
        </div>
    

      
      <?php } else { ?>
      <h3> You need to login first </h3> <br>
    <!-- <button class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">Login/Signup</button>  >
      -->
      <?php } ?>


</body>

</html>