<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Styling Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            flex: 1;
        }
    </style>
</head>
<body>
    <?php 
    require 'nav.php';
    ?>
    <?php
    echo "<br>";
    ?>
    <?php
    include 'connection.php';
    $slt = "SELECT * FROM `studenttable`";
    $res = mysqli_query($conn,$slt);
    if($res){
        echo '<div class="container card-wrapper justify-content-center">';
        while($row = mysqli_fetch_assoc($res)){
            $id = $row['Id'];
            $Name = $row['Name'];
            $Email = $row['Email'];
            $Phone = $row['Phone'];
            $Address = $row['Address'];
            echo "<div class='col-2'>"; 
            echo "<div class='card bg-light'>";
            echo "<div class='card-body'>";
            echo "<div class='card-title text-primary'>ID : $id</div>";
            echo "<div class='card-title text-primary'>Name : $Name</div>";
            echo "<div class='card-title text-primary'>Email : $Email</div>";
            echo "<div class='card-title text-primary'>Phone : $Phone</div>";
            echo "<div class='card-title text-primary'>Address : $Address</div>";
            echo "<a href='delete.php?deleteid=$id' class='btn btn-outline-danger'>Delete</a>";
            echo "<a ' href='update.php?updateid=$id' class='btn btn-outline-success'>Update</a>";
            echo "</div></div></div>";
        }
        echo '</div>'; 
    }
    mysqli_close($conn);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
