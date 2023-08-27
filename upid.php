<?php

include 'connection.php';
if(isset($_GET['Myid'])){
    $id = $_GET['Myid'];
    $slt = "SELECT * FROM `tb1` WHERE Id = $id";
    $res = mysqli_query($conn, $slt);
    if($res){
        $row = mysqli_fetch_assoc($res);
    }
}

?>


<?php
    include 'connection.php';
    error_reporting(0);
    if($conn){
        if(isset($_GET['newid'])) {
            $id = $_GET['newid'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $upd = "UPDATE `tb1` SET `Name`='$name' WHERE Id = $id";
            $updateQuery = mysqli_query($conn, $upd);
            
            if($updateQuery) {
                // echo "<script>alert('Data Updated Successfully')</script>";
                header("location: new.php");
            } else {
                echo "<script>alert('Data Not Updated')</script>";
            }
        }
    }
?>


<form method="POST" action="upid.php?newid=<?php echo $id ?>">
    <input type="text" name="name" value="<?php echo $row['Name']; ?>">
    <button type="submit">Login</button>
</form>