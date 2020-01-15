<?php
    include 'C:/xampp/htdocs/Tabli/dbh.php';

    $sql1 = "UPDATE slot SET name = 'WWWWWWWWWWWWWWW' WHERE id = '2'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = 'RRRRRRRRRRRRRRR' WHERE id = '25'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '1'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '3'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '4'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '5'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '6'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '7'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '8'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '9'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '10'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '11'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '12'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '13'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '14'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '15'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '16'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '17'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '18'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '19'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '20'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '21'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '22'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '23'";
    $result2 = mysqli_query($conn,$sql2);
    $sql1 = "UPDATE slot SET name = '' WHERE id = '24'";
    $result = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE slot SET name = '' WHERE id = '26'";
    $result2 = mysqli_query($conn,$sql2);
    
    $sql3 = "SELECT * FROM slot ";
    $result3 = mysqli_query($conn,$sql3);
    if (mysqli_num_rows($result3) > 0 ) {
        while ($row = mysqli_fetch_assoc($result3)) {
            echo "<p>";
            echo $row['id'];
            echo "  |  ";
            echo $row['name'];
            echo "<p>";
        }
    } else {
            echo "There are no slot! ";
    }
?>