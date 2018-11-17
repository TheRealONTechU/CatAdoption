<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstname = $lastname = $username = $email = $password = $confirm_password = $code = "";
$firstname = $lastname = $username_err = $email_err = $password_err = $confirm_password_err = $code_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate firstName
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a first name.";
        echo "<script type='text/javascript'>alert('$firstname_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE firstname = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_firstname);
            
            // Set parameters
            $param_firstname = trim($_POST["firstname"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                $firstname = trim($_POST["firstname"]);
            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
        // Validate lastName
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter a lastname.";
        echo "<script type='text/javascript'>alert('$lastname_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE lastname = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_lastname);
            
            // Set parameters
            $param_lastname = trim($_POST["lastname"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
            
                    $lastname = trim($_POST["lastname"]);
                }
             else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        echo "<script type='text/javascript'>alert('$username_err');</script>"; 
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute())
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                    echo "<script type='text/javascript'>alert('$username_err');</script>";
                    $username = trim($_POST["username"]);

            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
        echo "<script type='text/javascript'>alert('$email_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This email is already being used.";
                    echo "<script type='text/javascript'>alert('$email_err');</script>";
                }
            
            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
        echo "<script type='text/javascript'>alert('$password_err');</script>";
    } else if(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        echo "<script type='text/javascript'>alert('$password_err');</script>";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
        echo "<script type='text/javascript'>alert('$confirm_password_err');</script>";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
            echo "<script type='text/javascript'>alert('$confirm_password_err');</script>";

        }
    }

    
   
    // Validate code
    if(empty(trim($_POST["code"]))){
        $code_err = "Please enter the code given to you by the admin.";
        echo "<script type='text/javascript'>alert('$email_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE code = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_code);
            
            // Set parameters
            $param_code = trim($_POST["code"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
   
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($code_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, code) VALUES (?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_username, $param_password, $param_code);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_code = $code;
           
    }
         
}
}


// © 2018 GitHub, Inc.
// Terms
// Privacy
// Security
// Status
// Help
// Contact GitHub
// Pricing
// API
// Training
// Blog
// About

// About
