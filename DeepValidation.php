<?php

        if ($_SESSION['username']== admin || $_SESSION['username'] == pujan824){
            header("location: ../html/WelcomeVolunteer.html");
        }else{
            header("location: ../html/welcome.html");
        }

?>