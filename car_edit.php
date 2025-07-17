<?php 
include 'db.php';
session_start();
?>
<?php 
if(isset($_POST['update'])){
    $edit_car_id = $_GET['edit_car'];

    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $car_name  = mysqli_real_escape_string($conn,$_POST['car_name']);
    $car_model = mysqli_real_escape_string($conn,$_POST['car_model']);
    $car_color = mysqli_real_escape_string($conn,$_POST['car_color']);
    $car_price = mysqli_real_escape_string($conn,$_POST['car_price']);
    $sell_date = mysqli_real_escape_string($conn,$_POST['sell_date']);

    $query = "update car_tbl SET full_name ='$full_name',car_name='$car_name',car_model='$car_model',
    car_color='$car_color',sell_date='$sell_date',car_price='$car_price' WHERE ID ='$edit_car_id'";
 
    $run = mysqli_query($conn, $query);
    if($run){
        echo "<script>window.open('viewinfo.php?update_success=Successfully Updated Data','_self')</script>";
       
    }else{
        echo "<script>window.open('index.php?update_error=Unable to update data.Please try again','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Info</title>
    <!--Bootstrap Min CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container"> <br>
        <h3 class="text-center">Only Admin Can Change Info.</h3>
        
        <div class="card mt-3"> <!--Card div Start-->
            <div class="card-header bg-info text-white text-center ">
                ***You can update any information***
            </div>
                <?php
                    if(isset($_GET['edit_car'])){
                        $edit_car_id = $_GET['edit_car'];
                        $sql = "select * from car_tbl where id ='$edit_car_id'";
                        $run = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($run))
                    {
                ?>
            <div class="card-body">
            <form action="" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="full_name" placeholder="Enter your name" class="form-control"
                        value="<?php echo $row['full_name']; ?>" maxlength="15" required>
                      
                    </div>
                    <div class="form-group">
                        <label>Car Name</label>
                        <input type="text" name = "car_name" placeholder="Enter car name" class="form-control"
                        value="<?php echo $row['car_name']; ?>" maxlength="7" required>
                    </div>
                    <div class="form-group">
                        <label>Car Model</label>
                        <input type="text" name = "car_model" placeholder="Enter car model" class="form-control" 
                        value="<?php echo $row['car_model']; ?>" maxlength="5" required >
                    </div>
                    <div class="form-group">
                        <label>Choose Color</label>
                        <select class="form-control" name="car_color" value="<?php echo $row['car_color']; ?>" required>
                            <option value="" disabled>Choose option</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>
                            <option value="Black">Black</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Car Price</label>
                        <input type="text" name ="car_price" placeholder="Car Price" class="form-control" 
                        value="<?php echo $row['car_price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Sell Date</label>
                        <input type="date" name ="sell_date" class="form-control" 
                        value="<?php echo $row['sell_date']; ?>" required>
                    </div>

            <?php }} ?>  
                    <button type="submit" name="update" class="btn btn-info">Update</button>  
                    <a href="index.php">Back</a>
                  
                   
            </form>
            </div>
        </div> <!--Card div End-->
 </div>
  <!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3"> 
    <a href="www.itgoog.com">© 2020 | Developed by IT Goog.</a>
    </div>
</footer>
<!-- Footer -->
</body>
</html>
