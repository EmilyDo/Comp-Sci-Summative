<?php
/*first want to check if the submit button was actually clicked so that users can't access this page by
typing in the file's address*/

if(isset($_POST['signin-submit'])){ /*checking if the button nammed "signup-submit" has been clicked*/
    require 'databaseHandler.inc.php'; 

    /*fetch the info from the form*/
    $first = $_POST['first']; /*the name of the input in form is "username */ 
    $last = $_POST['last'];
    $email = $_POST['email'];
    $code = $_POST['pwd'];


        if(empty($first) || empty($last) || empty($email) || empty($code)){ /*empty is a php function*/
            /*redirecting the user back to the sign up page. Also including the error message and all of prewritten fields*/
            header("Location: ../php/attendance-student.php?error=emptyfields&first=".$first&"last=".$last&"email=".$email); 
            exit(); 
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@ocdsb.ca') == false){ /*php has a function for checking emails*/ 
            header("Location: ../php/attendance-student.php?error=invalidemail&first=".$first&"last=".$last); 
            exit(); 
        }
        elseif($code !== "huehuehue"){
            header("Location: ../php/attendance-student.php?error=passwordcheck&first=".$first&"last=".$last&"email=".$email); 
            exit(); 
        }
    
        else{
            /*SQL statement that we want to run in the database, checking for taken usernames*/ 
            $sql = "SELECT email FROM attendance WHERE email=?"; /*the ? is the placeholder, using prepared statements in case the user inputs code into the textfields*/
            $statement = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($statement, $sql)){ /*checking if we can prepare the sql statement failed */
                header("Location: ../php/attendance-student.php?error=sqlerror"); 
                exit();    
            }
            else{ /*testing for matching first names, whether the username is already taken*/ 
                mysqli_stmt_bind_param($statement, "s", $email);   
                mysqli_stmt_execute($statement);              
                mysqli_stmt_store_result($statement); /*fetching information from teh database*/ 
                $resultCheck = mysqli_stmt_num_rows($statement); /*should either be 0 or 1*/ 
                if($resultCheck > 0){
                    header("Location: ../php/attendance-student.php?error=usersignedin"); 
                    exit();    
                }
                else{
                    $sql = "INSERT INTO attendance (firstName, lastName, email, pwdAttendance) VALUES (?, ?, ?, ?)";  /*so if the user is not registered, then this will add a new row into the datatable */ 
                    $statement = mysqli_stmt_init($conn); 
                    if(!mysqli_stmt_prepare($statement, $sql)){
                        header("Location: ../php/attendance-student.php?error=sqlerror"); 
                        exit();    
                    }
                    else{
    /*hashing password*/ 
                        $hashedPwd = password_hash($code, PASSWORD_DEFAULT); 
    
                        mysqli_stmt_bind_param($statement, "ssss", $first, $last, $email, $hashedPwd);    
                        /* the password is hashed for security reasons */
                        mysqli_stmt_execute($statement);              
                        header("Location: ../php/attendance-student.php?signin=success"); 
                        exit(); 
                    }
    
                }
    
            }
        }
        mysqli_stmt_close($statement); /*closing off the statement and the connection to the database*/ 
        mysqli_close($conn); 
    
    }
    else{ /*if the user did not signup by clicking the button*/ 
        header("Location ../php/attendance-student.php"); 
        exit(); 
    }