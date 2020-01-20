<?php
if(isset($_POST['signup-submit'])){ 
    require 'databaseHandler.inc.php'; 

     $username = $_POST['email'];
     $password = $_POST['password'];

        if(empty($email) || empty($password)){ 
            header("Location: ../php/actual-login.php?error=emptyfields&username=".$username); 
            exit(); 
        }
        else{
            $sql = "SELECT usernameUsers FROM attendance WHERE usernameUsers=?";  
            $statement = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($statement, $sql)){  
                header("Location: ../php/actual-login.php?error=sqlerror"); 
                exit();    
            }
            else{  
                mysqli_stmt_bind_param($statement, "s", $email);   
                mysqli_stmt_execute($statement);              
                mysqli_stmt_store_result($statement);  
                
                    $query = "SELECT * FROM 'attendance' where usernameUsers='$username'"; 
                    $query_run = mysqli_query($conn, $query); 

                    if(($row['usernameUsers'] !== $username)|($row['pwdUsers'] !== $password)){
                        header("Location: ../php/actual-login.php?error=invaliduser"); 
                        exit();    
                    }
                    else{
                        header("Location: ../attendance-teacher.php?error=invaliduser"); 
                        exit();  
                    }
                }
    
            
        }
        mysqli_stmt_close($statement); 
        mysqli_close($conn); 
        
    }

    else{  
        header("Location ../php/actual-login.php"); 
        exit(); 
    }