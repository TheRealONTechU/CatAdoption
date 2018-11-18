<?php


    if ($_SESSION["username"]){

        if ($username != admin || $username != pujan824){
            header("location: ../WelcomeVolunteer.html");
        }else{
            header("location: ../welcome.html");
        }
    }
?>