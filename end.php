<?php
    include 'dbh.php';

    $sql = "SELECT * FROM slot WHERE id='1'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['name']>='RRRRRRRRRRRRRRR') {
            echo "<p>";
            echo "RED WINS";
            echo "<p>";
            exit("RED WINS");
    }
    $sql = "SELECT * FROM slot WHERE id='26'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['name']>='WWWWWWWWWWWWWWW') {
        echo "<p>";
        echo "WHITE WINS";
        echo "<p>";
        exit("WHITE WINS");
    }
        
    $sql = "SELECT * FROM slot ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
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