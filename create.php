<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
  <title>Document</title>
</head>
<?php
error_reporting(0);
include 'connection.php';

if($conn) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $insert = "INSERT INTO `studenttable` (`Id`, `Name`, `Email`, `Phone`, `Address`) VALUES (NULL, '$name', ' $email', '$phone', '$address');";
    $res = mysqli_query($conn,$insert);
    if($res){
        echo "<script>alert('Data Inserted Successfully')</script>";
    }else{
        echo "<script>alert('Data Not Inserted')</script>";
    }
} 
mysqli_close($conn);
?>
<body class="d-flex align-item-center justify-content-center">
<form method="POST" class="w-50">
    <h1 class="text-center">Data Insert </h1>
    <div class="mb-3">
        <label  class="form-label">Name</label>
        <input type="text" class="form-control w-100"  placeholder="Name" name="name">
    </div>
    <div class="mb-3">
        <label  class="form-label">Email</label>
        <input type="email" class="form-control w-100"  placeholder="@example.com" name="email">
    </div>
    <div class="mb-3">
        <label  class="form-label">Phone</label>
        <input type="number" class="form-control w-100"  placeholder="Phone No" name="phone">
    </div>
    <div class="mb-3">
        <label  class="form-label">Address</label>
        <input type="text" class="form-control w-100"  placeholder="Address" name="address">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn  btn-outline-primary">Login</button>
    </div>
    <a href="view.php" type="button" class="btn  btn-outline-warning">Read Data</a>
    </form>
</body>
</html>