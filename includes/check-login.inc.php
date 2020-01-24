<?php
if(isset($_POST['signup-submit'])){ 
    require 'databaseHandler.inc.php'; 

     $username = $_POST['username'];
     $password = $_POST['password'];

        if(empty($username) || empty($password)){ 
            header("Location: ../php/actual-login.php?error=emptyfields&username=".$username); 
            exit(); 
        }

        else{
            $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?";  
            $statement = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($statement, $sql)){  
                header("Location: ../php/actual-login.php?error=sqlerror"); 
                exit();    
            }
            else{  
                mysqli_stmt_bind_param($statement, "s", $username);   
                mysqli_stmt_execute($statement);              
                mysqli_stmt_store_result($statement);  
                
                    $query = "SELECT usernameUsers, pwdUsers FROM users";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $usernameReal = $row['usernameUsers']; 
                            $passReal = $row['pwdUsers']; 
                        }
                    }

                    if($usernameReal !== $username){
                        header("Location: ../php/actual-login.php?error=invaliduser"); 
                        exit();    
                    }
                    elseif(!password_verify($password, $passReal)){
                        header("Location: ../php/actual-login.php?error=invalidpassword"); 
                        exit();    
                    }
                    else{
                        header("Location: ../attendance-teacher.php"); 
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