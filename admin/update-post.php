<?php include "header.php";
include("config.php");
$updateid=$_GET["uid"];
$sql2="SELECT * FROM post WHERE post_id= $updateid";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
if($_SESSION['role'] == 0)
{
   

if($row2['author']!= $_SESSION['userid'])
{
    
  header("location:$hostname/admin");
}
}
if(isset($_POST['submit']))
{   
    if(empty($_FILES["new-image"]['name']))
    {
     $file_name=$_POST['old-image'];
     
    }
    else
    {
      $error=array();
      $file_name=$_FILES['new-image']['name'];
      $file_size=$_FILES['new-image']['size'];
      $file_tmp=$_FILES['new-image']['tmp_name'];
      $file_type=$_FILES['new-image']['type'];
      $file_ext=strtolower(end(explode('.',$file_name)));
      $extensions=array("jpeg","jpg","png");
      if(in_array($file_ext,$extensions)==false)
      {
          $error[]="extensition is wrong plz upload png,jpg,jpeg formate";

      }
      if($file_size>2097152)
      {
          $error[]="file size should be 2gb";
      }
      $new_name=time()."_".basename($file_name);
      $target="upload/". $new_name;
      $img_name=$new_name;
      echo $target;
     

      if(empty($error)==true)
      {
          move_uploaded_file($file_tmp,$target);
          
      }
      else
      {
          print_r($error);
      }

    }




    $posttitle=mysqli_real_escape_string($con,$_POST['post_title']);
    $postdesc=mysqli_real_escape_string($con,$_POST['postdesc']);
    $postcategory=mysqli_real_escape_string($con,$_POST['category']);

    
    $sql3="UPDATE post SET title='{$posttitle}',description='{$postdesc}',category='{$postcategory}',
    post_img='{$img_name}' WHERE post_id='{$updateid}';";

    if($_POST['category']!= $_POST['old_cat'])
    {
       
     $sql3 .="UPDATE category SET post=post+1 WHERE category_id={$_POST['category']};"; 
     $sql3 .="UPDATE category SET post=post-1 WHERE category_id={$_POST['old_cat']};"; 
    }
    
    if(mysqli_multi_query($con,$sql3))
    {
        header("location:$hostname/admin/post.php");
    }


}


 ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php
        
         $sql="SELECT post.post_id,post.title,post.description,post.post_date,post_img,
         category.category_name,user.username,post.category FROM post
         LEFT JOIN category ON post.category=category.category_id
         LEFT JOIN user ON post.author=user.user_id
         WHERE post_id= $updateid";
         $result=mysqli_query($con,$sql);
         if(mysqli_num_rows($result)>0)
         {
             
           while($row=mysqli_fetch_assoc($result))
           {
        ?>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row["post_id"];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row["title"];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5" >
               <?php echo $row["description"]; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                
                <select class="form-control" name="category">
                      
                            <?php
                            $sql1="SELECT * FROM category";
                            $result1=mysqli_query($con,$sql1);
                            if(mysqli_num_rows($result1)>0)
                            {
                    
                               while($row1=mysqli_fetch_assoc($result1))
                               {
                               if($row["category"]==$row1["category_id"])
                               {
                                   $selected="selected";
                               }   
                               else
                               {
                                   $selected="";
                               } 

                               ?>  
                                 <option value="<?php echo $row1["category_id"]; ?>" <?php echo $selected; ?>><?php echo $row1["category_name"]; ?></option>
                         <?php
                               }
                            }
                         ?>
               </select>
               <input type="hidden" name="old_cat" value="<?php echo $row["category"]; ?>">
               
            
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row["post_img"];?>" height="150px" value="">
                <?php echo $row["post_img"];?>
               <input type="hidden" name="old-image" value="<?php echo $row["post_img"];?>"> 
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
        <?php
           }
        }
         ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
