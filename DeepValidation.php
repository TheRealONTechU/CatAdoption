<?php

        if ($_SESSION['username']= admin || $_SESSION['username'] != pujan824){
            header("location: ../welcome.html");
        }else{
            header("location: ../WelcomeVolunteer.html");
        }

?>