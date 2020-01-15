<?php
    include 'dbh.php';

    $idtomove= $_POST['idtomove'];
    $idmoving= $_POST['idmoving'];
    $seira= $_POST['seira'];
    $zari1= $_POST['zari1'];
    $zari2= $_POST['zari2'];
    //$zaries= $_POST['zaries'];

    //Condition 0 : Elenxos an exei paiksei tis 2 zaries tou
    //if($zaries == 0 ){
       // exit("Έχετε παίξει τις ζαριές σας . Πατήστε ROLL DICE . ");
    //}
    if($idtomove == 0 || $idmoving == 0) {
        exit("Δεν έχετε βάλει τιμές για να γίνει το MOVE . ");
    }else{
        //Condition 1 : Elenxos an kounietai entos board   
        if ($idtomove > 26 || $idtomove < 1 ){
            exit("Έχετε βάλει τιμή εκτός ορίου του board . Ξαναδώστε MOVE .");
        }    
        if($seira == 'White'){
            //Condition 2 : Elenxos an kounietai se thesh bash twn zariwn . WHITE POSITIVE .
            $movewhite1 = (int)$idmoving + (int)$zari1;
            $movewhite2 = (int)$idmoving + (int)$zari2;
            $movewhite3 = (int)$idmoving + (int)$zari1 + (int)$zari2;            
            if ($movewhite1!=$idtomove && $movewhite2!=$idtomove && $movewhite3!=$idtomove ) {
                exit("Δεν μπορείτε να πάτε σε αυτήν την θέση . Ξαναδώστε MOVE .");
            }
            //Condition 3 : Elenxos an uparxei porta sto slot pu thelei na paei . FOR WHITE
            $sql = "SELECT name FROM slot WHERE id=" . $idtomove;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);           
            if ($row['name']=='RR' || $row['name']=='RRR' || $row['name']=='RRRR'|| 
                $row['name']=='RRRRR' || $row['name']=='RRRRRR' || $row['name']=='RRRRRRR' ||
                $row['name']=='RRRRRRRR' || $row['name']=='RRRRRRRRRRRRRRR') {
                exit("Υπαρχουν red πουλια εκει που θέλετε να πάτε . Ξαναδώστε ΜΟVE .");
            }
            //Condition 4 : Elenxos an thelei na bgalei pouli apo keno slot
            $sql = "SELECT name FROM slot WHERE id=" . $idmoving;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);           
            if ($row['name']=='') {
                exit("Υπαρχει κενή θέση . Ξαναδώστε ΜΟVE .");
            }            
            $seira = 'W';
        }else{
            //Condition 2 : Elenxos an kounietai se thesh bash twn zariwn . RED NEGATIVE .
            $movered1 = (int)$idmoving - (int)$zari1;
            $movered2 = (int)$idmoving - (int)$zari2;
            $movered3 = (int)$idmoving - (int)$zari1 - (int)$zari2; 
            if ($movered1!=$idtomove && $movered2!=$idtomove && $movered3!=$idtomove) {
                exit("Δεν μπορείτε να πάτε σε αυτήν την θέση . Ξαναδώστε MOVE");
            }
            //Condition 3 : Elenxos an uparxei porta sto slot pu thelei na paei . FOR RED .
            $sql = "SELECT name FROM slot WHERE id=" . $idtomove;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['name']=='WW' || $row['name']=='WWW' || $row['name']=='WWW'|| 
                $row['name']=='WWWWW' || $row['name']=='WWWWWW' || $row['name']=='WWWWWWW' ||
                $row['name']=='WWWWWWWW' || $row['name']=='WWWWWWWWWWWWWWW') {
                exit("Υπαρχουν white πουλια εκει που θέλετε να πάτε . Ξαναδώστε MOVE");
            }
            //Condition 4 : Elenxos an thelei na bgalei pouli apo keno slot
            $sql = "SELECT name FROM slot WHERE id=" . $idmoving;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);           
            if ($row['name']=='') {
                exit("Υπαρχει κενή θέση . Ξαναδώστε ΜΟVE .");
            }   
            $seira = 'R';
        }
    

    //Updatepaliospot --> 
    //Bash tou idmoving bgazei enan xarakthra apo thn sugkekrimenh sthlh
    //diabasoume prwta ton pinnaka
    $sql = "SELECT name FROM slot WHERE id=" . $idmoving;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result) ;
            //Afairoume apo to name ton teleutaio xarakthra
            $newname = substr(($row['name']),0,-1);
            //Kanoume update ton pinaka
            $sql2 = "UPDATE slot SET name = '$newname' WHERE id = '$idmoving'";
            $result2 = mysqli_query($conn,$sql2);
    }

    //Updateneoslot -->
    //Bash tou idtomove prosthetw enan xarakthra sthn sugkekrimenh sthlh
    //o xarakthras paei analoga tn seira pou paizei o paikths
    $sql = "SELECT name FROM slot WHERE id=" . $idtomove;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result) ;
            //Prosthetoume ton xarakthra
            $newname = substr_replace(($seira),($row['name']),0,0);
            //Kanoume update ton pinaka
            $sql2 = "UPDATE slot SET name = '$newname' WHERE id = '$idtomove'";
            $result2 = mysqli_query($conn,$sql2);
    }
    echo "<p>";
    echo " ID to move : ";
    echo $idtomove;
    echo " | ";
    echo " ID moving : ";
    echo $idmoving;
    echo " | ";
    echo " Seira tou : ";
    echo $seira;
    echo " | ";
    echo " Zari 1 : ";
    echo $zari1;
    echo " | ";
    echo " Zari 2 : ";
    echo $zari2;

    //$zaries == (int)$zaries - 1 ;
}
?>