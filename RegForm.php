<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstname = $lastname = $username = $email = $password = $confirm_password = $code = "";

$firstname_err = $lastname_err = $username_err = $email_err = $password_err =     
$confirm_password_err = $code_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate firstName
    if(empty(trim($_POST["firstName"]))){
        $firstname_err = "Please enter a first name.";
        echo "<script type='text/javascript'>alert('$firstname_err');</script>";
    } else{
        // Prepare a select statement

        $sql = "SELECT id FROM LOGIN WHERE role = ?";

        $sql = "SELECT id FROM LOGIN WHERE first_name = ?";

        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_firstname);
            
            // Set parameters
            $param_firstname = trim($_POST["firstName"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                $firstname = trim($_POST["firstName"]);
            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
        // Validate lastName
    if(empty(trim($_POST["lastName"]))){
        $lastname_err = "Please enter a last name.";
        echo "<script type='text/javascript'>alert('$lastname_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM LOGIN WHERE last_name = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_lastname);
            
            // Set parameters
            $param_lastname = trim($_POST["lastName"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                    $lastname = trim($_POST["lastName"]);
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
        $sql = "SELECT id FROM LOGIN WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                    echo "<script type='text/javascript'>alert('$username_err');</script>";
                    $username = trim($_POST["username"]);
                }

            } else{
                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";
            }
        }
         
    }
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
        echo "<script type='text/javascript'>alert('$email_err');</script>";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM LOGIN WHERE email = ?";
        
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
    if(empty(trim($_POST["confirmPassword"]))){
        $confirm_password_err = "Please confirm password.";     
        echo "<script type='text/javascript'>alert('$confirm_password_err');</script>";
    } else{
        $confirm_password = trim($_POST["confirmPassword"]);
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
        $sql = "SELECT id FROM LOGIN WHERE code = ?";
        
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
        $sql = "INSERT INTO LOGIN (first_Name, last_Name, username, password, email, role) 
                VALUES (?, ?, ?, ?, ?, ?)";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssssss',$param_firstname, $param_lastname, $param_username, $param_password, $param_email, $param_role);
            
            // Set parameters
            $param_firstName = $firstname;
            $param_lastName = $lastname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash;
            $param_email = $email;
            $param_role = $code;

            if (!$stmt -> execute()){

                $not_good = "Oops! Something went wrong. Please try again later.";
                echo "<script type='text/javascript'>alert('$not_good');</script>";          
            
              
            } else{
                 // $stmt->store_result();
               header("location: index.html");
              }
        }
         
    }
}
