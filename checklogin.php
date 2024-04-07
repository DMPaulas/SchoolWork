<?php

    if( $_SESSION['authuser'] == 1){

        echo "<p align='center' style='margin-top: 150px; margin-bottom: 150px'> Login bem sucedido </p>" ;

    }else {
        echo "<p align='center' style='margin-top: 150px; margin-bottom: 150px'> Login incorreto </p>" ;}

?>