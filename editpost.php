<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['submit'])){
   //get from data
   $update_id=mysqli_real_escape_string($conn,$_POST['update_id']);
   $title=mysqli_real_escape_string($conn,$_POST['title']);
   $body=mysqli_real_escape_string($conn,$_POST['body']);
   $author=mysqli_real_escape_string($conn,$_POST['author']);

    $query="UPDATE posts SET 
            title='$title',
            author='$author',
            body='$body'
            where id={$update_id}";
    
    if(mysqli_query($conn,$query)){
        header('Location:'.ROOT_URL.'');        
    }else{
        echo "ERROR".mysqli_error($conn);
    }
}

$id=mysqli_real_escape_string($conn,$_GET['id']);

//create query
$query='select * from posts where id='.$id;

//get result
$result=mysqli_query($conn,$query);

//fetch data

$post=mysqli_fetch_assoc($result);
//var_dump($posts);
//free the result

mysqli_free_result($result);

mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>
<div class="container mt-5">
       <h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="title">Enter Post Title</label>
    <input type="text" class="form-control" name="title"  value="<?php echo$post['title'] ;  ?>">
 
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control" name="author"  value="<?php echo$post['author'] ;  ?>">
  </div>
  
   <div class="form-group">
    <label for="body">Body</label>
    <textarea type="text" class="form-control" name="body"> "<?php echo$post['body'] ;  ?>" </textarea>
  </div>
    <input type="hidden" name="update_id" value= "<?php echo$post['id'] ;  ?>">
  <button type="submit" name="submit" class="btn btn-outline-secondary">Submit</button>
</form>
          </div>
<?php include('inc/footer.php'); ?>