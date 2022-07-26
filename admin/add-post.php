<?php 
 include "header.php";
include("config.php");




 if(isset($_POST['submit']))
 {
     
    if(isset($_FILES["fileToUpload"]))
    {
        $error=array();
       $file_name=$_FILES["fileToUpload"]["name"];
       $file_size=$_FILES["fileToUpload"]["size"];
       $file_tmp=$_FILES["fileToUpload"]["tmp_name"];
       $file_type=$_FILES["fileToUpload"]["type"];
       $file_ext=strtolower(end(explode(".",$file_name)));
       $extension=array("jpeg","jpg","png");

       
       if(in_array($file_ext,$extension)=== false)
       {
           
           $error[]="file extension should be jpg,png or jpeg";
       }
       if($file_size > 2097152)
       {
           $error[]="file size should be less than 2gb";
       }
       $new_name= time()."_".basename($file_name);
       $target="upload/".$new_name;
       $img_name=$new_name;
      if(empty($error)== true)
      {

        move_uploaded_file($file_tmp,$target);
      }
     else
     {
        print_r($error);
        die();
     }
    }
    

 $posttitle=mysqli_real_escape_string($con,$_POST["title"]);
 $postdesc=mysqli_real_escape_string($con,$_POST["postdesc"]);
 $category=mysqli_real_escape_string($con,$_POST["category"]);
 $date=date("d M,Y");
 $author=$_SESSION["userid"];
 $sql="INSERT INTO post (title, description, category, post_date, author, post_img)
 VALUES('$posttitle','$postdesc',$category,'$date',$author,'$img_name');";
 $sql.="UPDATE category SET post = post + 1 WHERE category_id= '$category'";


 


if(mysqli_multi_query($con,$sql));
 {
   header("location:$hostname/admin/post.php");
 }


 }

?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER["PHP_SELF"];?> " method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" di> Select Category</option>
                              <?php
                             
                              $sql="SELECT * FROM category";
                              $result=mysqli_query($con,$sql);
                              if(mysqli_num_rows($result)>0)
                              {
                               while($row=mysqli_fetch_assoc($result))
                               {
                                ?>
                                <option value="<?php echo $row["category_id"];?>" > <?php echo $row["category_name"];?> </option>

                                <?php
                               }
                              }
                              ?>




                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
