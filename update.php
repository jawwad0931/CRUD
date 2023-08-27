<?php
require 'nav.php';
?>
<?php
    include 'connection.php';
    if(isset($_GET['updateid'])){
        $id = $_GET['updateid'];
        $slt = "SELECT * FROM `studenttable` WHERE Id = $id";
        $query = mysqli_query($conn,$slt);
        if($query){
            $row = mysqli_fetch_assoc($query);
        }
    }
?>

<?php
    include 'connection.php';
    error_reporting(0);
    if($conn){
        if(isset($_GET['idnew'])) {
            $id = $_GET['idnew'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $upd = "UPDATE `studenttable` SET `Name`='$name', `Email`='$email', `Phone`='$phone', `Address`='$address' WHERE id = $id";
            $updateQuery = mysqli_query($conn, $upd);
            
            if($updateQuery) {
                // echo "<script>alert('Data Updated Successfully')</script>";
                header("location: view.php");
            } else {
                echo "<script>alert('Data Not Updated')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <title>Update Data</title>
</head>
<body class="">
<form method="POST" action="update.php?idnew=<?php echo $id?>" class="w-100">
    <h1 class="text-center">Update Data</h1>
    <div class="mb-3">
        <label  class="form-label">Name</label>
        <input type="text" class="form-control w-100"  placeholder="Name" name="name" value="<?php echo $row['Name']; ?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">Email</label>
        <input type="email" class="form-control w-100"  placeholder="@example.com" name="email" value="<?php echo $row['Email']; ?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">Phone</label>
        <input type="number" class="form-control w-100"  placeholder="Phone No" name="phone" value="<?php echo $row['Phone']; ?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">Address</label>
        <input type="text" class="form-control w-100"  placeholder="Address" name="address" value="<?php echo $row['Address']; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn  btn-outline-primary">Update</button>
        <a href="view.php" type="button" class="btn btn-outline-success">View</a>
    </div>
</form>
</body>
</html>
