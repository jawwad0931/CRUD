<?php
require 'nav.php';
?>
<?php
include 'connection.php';

if(isset($_GET['deleteid'])){
    $dlt = $_GET['deleteid'];
    $dltquery = "DELETE FROM `studenttable` WHERE Id = $dlt";
    $query = mysqli_query($conn,$dltquery);
    if($query){
        header("location: view.php");
    }
}

mysqli_close($conn);

?>