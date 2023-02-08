
<?php include('partials/menu.php'); ?>




<!-- Main Content Section Starts -->
<div class = "main-content">

        <div class = "wrapper">
                 <h1>DASHBOARD</h1>
                 <br><br>

                 
        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

        ?><br><br>

                 <div class="col-4">
                 <?php 
                 $sql="SELECT * FROM category";
                 $res=mysqli_query($conn,$sql);
                 $count = mysqli_num_rows($res);

            
                 ?>
                     <h1><?php echo $count; ?> </h1>
                     <br>
                     Categories
                 </div>


                 <div class="col-4 text-center">

                 <?php 
                 $sql2="SELECT * FROM food";
                 $res2=mysqli_query($conn,$sql2);
                 $count2 = mysqli_num_rows($res2);

            
                 ?>
                     <h1><?php echo $count2; ?></h1>
                     <br>
                     Foods
                 </div>


                 <div class="col-4">

                
                     <h1>0</h1>
                     <br>
                     Total Orders
                 </div>

                 <div class="col-4">
                     <h1>0</h1>
                     <br>
                     Revenue
                 </div>

               <div class="clearfix"></div>  
        </div>        
  </div>
<!-- Main Content Section Ends -->


<?php include('partials/footer.php') ?>


</body>
</html>