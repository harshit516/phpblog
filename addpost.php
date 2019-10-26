<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['submit'])){
   //get from data
   $title=mysqli_real_escape_string($conn,$_POST['title']);
   $body=mysqli_real_escape_string($conn,$_POST['body']);
   $author=mysqli_real_escape_string($conn,$_POST['author']);

    $query="insert into posts(title,author,body) values('$title','$author','$body')";
    
    if(mysqli_query($conn,$query)){
        header('Location:'.ROOT_URL.'');        
    }else{
        echo "ERROR".mysqli_error($conn);
    }
}
?>



<?php include('inc/header.php'); ?>
<div class="container mt-5">
       <h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="title">Enter Post Title</label>
    <input type="text" class="form-control" name="title"  placeholder="Enter Your Form Title">
 
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control" name="author" placeholder="Enter Author Name">
  </div>
  
   <div class="form-group">
    <label for="body">Body</label>
    <textarea type="text" class="form-control" name="body" placeholder="Body of your post"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-outline-secondary">Submit</button>
</form>
          </div>
<?php include('inc/footer.php'); ?>