<?php
    include 'C:/xampp/htdocs/Tabli/dbh.php';

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