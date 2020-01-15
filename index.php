<?php
    include 'dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
    $(document).ready(function() {
        $("#start").click(function tableshow() {
            $("#comments").load("start.php");
        }
        )
    });
</script>
</head>
<body>

<h2>Τάβλι Πλακωτό</h2>

 <!-- Make dices and print on div, 
 Kathe fora pou pataei to koumpi roll dice 
 dhmiourgia kainouriou kai allagh seiras -->
    <script>
            var zari1 = Math.floor((Math.random() * 6) + 1);
            var zari2 = Math.floor((Math.random() * 6) + 1);
            //var zaries = 2;
        function createzari() {
            if (seira == 'White') {
                seira = 'Red';
            } else {
                seira = 'White';
            }
            zari1 = Math.floor((Math.random() * 6) + 1);
            zari2 = Math.floor((Math.random() * 6) + 1);
           // zaries = 2;
            document.getElementById("zaria").innerHTML = 'Σειρα του ' + seira + '. Η ζαριά σας είναι : ' + zari1 + ' , ' + zari2;
            $("#comments").load("end.php"); 
        }
    </script>

<!-- Kathorismos seiras, elenxos twn prwtwn zariwn
zari1 = paikths1 , zari2= paikths2 kai set seiras -->
    <script>
        var seira= '';
        function paizeiprwtos() {      
        if (zari1 > zari2 ) {
            document.getElementById("zaria").innerHTML = 'Παίζει πρώτος ο white : ' + zari1  + ' , ' + zari2;
            seira = 'White';
        } else if ( zari1 < zari2 ){
            document.getElementById("zaria").innerHTML = 'Παίζει πρώτος ο red : ' + zari1  + ' , ' + zari2;
            seira = 'Red';
        } else {
            document.getElementById("zaria").innerHTML = 'Ισοπαλία : ' + zari1  + ' , ' + zari2;
        }
        }
    </script>
    
<!-- Kounhma tou pouli apo thn thesi idtomove
sthn thesi idmoving to kai elenxos move-->
    <script>
        function movefunction() {
            var idtomove = document.getElementById("idtomove").value;
            var idmoving = document.getElementById("idmoving").value;
           // var x = $zaries - 1;
           // $zaries = $x;
            $.post("move.php", {
                idtomove : idtomove,
                idmoving : idmoving,
                seira : seira,
                zari1 : zari1,
                zari2 : zari2,
                //zaries : zaries
            }, function (data,status) {             
               $("#test").html(data);
               //$("#comments").load("loadtable.php");
               $("#comments").load("end.php"); 
            });                           
        }
    </script>

<!-- Textareas k Buttons -->
ID TO MOVE TO : <textarea id="idtomove" rows="1" cols="1" style="overflow:auto;resize:none"> 0 </textarea><br>
ID MOVING FROM: <textarea id="idmoving" rows="1" cols="1" style="overflow:auto;resize:none"> 0 </textarea>
<button id="submit" onclick="movefunction()" >MAKE MOVE</button><br>
<button id="start" onclick="paizeiprwtos()" >START GAME</button>
<button onclick ="createzari()">ROLL DICE</button></br>

<!-- DIVS -->
<div id="zaria"> </div>
<div id="test"> </div>
<div id=comments style="background-color:lightblue"> <div>
</body>
</html>
