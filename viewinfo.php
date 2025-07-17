
<?php 
include 'db.php';
session_start();
?>
<!-- Displaying all database information -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card mt-5"> <!--Table Start-->
               
            <div class="card-header bg-info text-white text-center">
           <h3><span>All Database information</span></h3>     
            </div>
            <div class="card-body">
                <table class="table text-center table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Full Name</th>
                            <th>Car Name</th>
                            <th>Car Model</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Selling Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php 
                        $sql = "select * from car_tbl";
                        $run = mysqli_query($conn, $sql);
                        $i =1;
                        while($row = mysqli_fetch_assoc($run))
                        {
                    ?>
                    <tbody>
                    
                        <tr>
                            <td><?php echo $i++ ; ?></td>
                            <td><?php echo $row['full_name'] ; ?></td>
                            <td><?php echo $row['car_name'] ; ?></td>
                            <td><?php echo $row['car_model'] ; ?></td>
                            <td><?php echo $row['car_color'] ; ?></td>
                            <td><?php echo $row['car_price'] ; ?></td>
                            <td><?php echo $row['sell_date'] ; ?></td>
                            <td><a href="car_edit.php?edit_car=<?php echo $row['id']; ?>" class ="btn btn-success">Edit</a></td> 
                            <td><a href="car_delete.php?delete_car=<?php echo $row['id']; ?>" class ="btn btn-danger">Delete</a></td>
         
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
               
            </div>
        </div> <!--Table End-->
    </div>
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3"> Car Shop BD
        <a href="https://www.itgoog.com"> Developed by IT Goog.</a>
        </div>
    </footer>
<!-- Footer -->
  
</body>
</html>
