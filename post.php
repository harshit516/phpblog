<?php
require('config/db.php');
require('config/config.php');

if(isset($_POST['delete'])){
   //get from data
   $delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
   

    $query="Delete from posts
            where id={$delete_id}";
    
    if(mysqli_query($conn,$query)){
        header('Location:'.ROOT_URL.'');        
    }else{
        echo "ERROR".mysqli_error($conn);
    }
}

//get id
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
        <div class="border border-secondary p-2  bg-light">
            
       <h1 class="text-primary"><?php echo $post['title']; ?></h1>

 
               <h5>
                Created on  <?php echo $post['created_at']; ?> 
               by <?php echo $post['author']; ?> 
              </h5>
               <p class="lead"> <?php echo $post['body']; ?></p>
                <a class="btn btn-dark " href="<?php echo ROOT_URL;?>"> &lt;-- Back</a>
                <a class="btn btn-outline-dark" href="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $post['id']; ?>">Edit</a>
                <form class='float-right' method="POST" action="<?php echo$_SERVER['PHP_SELF'] ; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
   
      </div>
     </div>
<?php include('inc/footer.php'); ?>