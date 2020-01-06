<?php
/*first want to check if the submit button was actually clicked so that users can't access this page by
typing in the file's address*/

if(isset($_POST['signin-submit'])){ /*checking if the button nammed "signup-submit" has been clicked*/
    require 'databaseHandler.inc.php'; 

    /*fetch the info from the form*/
    $firstName = $_POST['first']; /*the name of the input in form is "username */ 
    $lastName = $_POST['last'];
    $email = $_POST['email'];
    $pwdAttendance = $_POST['pwd'];

/* error handlers*/ 
/*1. checking if all text inputs is empty or not*/
    if(empty($firstName) || empty($lastName) || empty($email) || empty($pwdAttendance)){ /*empty is a php function*/
        /*redirecting the user back to the sign up page. Also including the error message and all of prewritten fields*/
        header("Location: ../signup.php?error=emptyfields&username=".$username&"email=".$email); 
        exit(); 
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidemailuid"); 
        exit(); 
    }
/*checks for invalid email, if it's not valid, the code within the if statement runs*/
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@ocdsb.ca') !== false){ /*php has a function for checking emails*/ 
        header("Location: ../signup.php?error=invalidemail&username=".$username); 
        exit(); 
    }

    elseif($pwdAttendance !== 'somesecretcodehere'){
        header("Location: ../signup.php?error=passwordcheck&first=".$firstname&"last=".$lastname&"email=".$email); 
        exit(); 
    }

    else{
        /*SQL statement that we want to run in the database*/ 
        $sql = "SELECT usernameUsers FORM users WHERE usernameUsers=?" /*the ? is the placeholder*/
        $statement = mysql_stmt_init($conn); 
        if(!mysqli_stmt_prepare($statement, $sql)){
            header("Location: ../signup.php?error=sqlerror"); 
            exit();    
        }
        else{ /*testing for matching usernames, whether the username is already taken*/ 
            mysqli_stmt_bind_param($statement, "s", $username);   
            mysqli_stmt_execute($statement);              
            mysqli_stmt_store_result($statement); /*fetching information from teh database*/ 
            $resultCheck = mysqli_stmt_num_rows($statement); /*should either be 0 or 1*/ 
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&email=".$email); 
                exit();    
            }
            else{
                $sql = "INSERT INTO users (usernameUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";  /*so if the user is not registered, then this will add a new row into the datatable */ 
                $statement = mysql_stmt_init($conn); 
                if(!mysqli_stmt_prepare($statement, $sql)){
                    header("Location: ../signup.php?error=sqlerror"); 
                    exit();    
                }
                else{
/*hashing password*/ 
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT)

                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPwd);   /* 3 sss this time because inside our sql varialbe we have 3 placeholders (?, ?, ?)*/ 
                    /* the password is hashed for security reasons */
                    mysqli_stmt_execute($statement);              
                    header("Location: ../includes/signup.php?signup=success"); 
                    exit(); 
                }

            }

        }
    }
    mysqli_stmt_close($statement); /*closing off the statement and the connection to the database*/ 
    mysqli_close($conn); 

}
else{ /*if the user did not signup by clicking the button*/ 
    header("Location ../signup.php")
    exit(); 
}