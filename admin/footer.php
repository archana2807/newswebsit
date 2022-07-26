<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
                 include('config.php');
                  $sql="SELECT * FROM setting";
                  $result=mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                  ?> 
                <span> <a href=""><?php echo $row['footer_desc'] ;?>: Archana patel</a></span>
                   <?php
                    }
                }
                ?>
           
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
