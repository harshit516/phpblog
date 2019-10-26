<?php
require('config/config.php');
require('config/db.php');

//create query
$query='select * from posts order by created_at DESC';

//get result
$result=mysqli_query($conn,$query);

//fetch data

$posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
//var_dump($posts);
//free the result

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
<div class="container mt-5">
       <h1>Posts</h1>
       <?php foreach($posts as $post): ?>
       <div class="card card-body bg-light mb-3">
           <h3> <?php echo $post['title']; ?>   </h3>
               <small>
               Created on  <?php echo $post['created_at']; ?> 
               by <?php echo $post['author']; ?> 
               </small>
               <p class="lead"> <?php echo $post['body']; ?></p>
                <a class="btn  btn-outline-secondary" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
        
       </div>
          <?php endforeach; ?>
          </div>
<?php include('inc/footer.php'); ?>