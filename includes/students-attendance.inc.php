<?php
if(isset($_POST['signup-submit'])){ 
    require 'databaseHandler.inc.php'; 

     $email = $_POST['email'];
     $id = 0; 
     $first = "n/a"; 
     $last = "n/a"; 
     $date = getdate(); 
     $weekday = $date['weekday']; 

        if(empty($email)){ 
            header("Location: ../php/attendance-student.php?error=emptyfields&email=".$email); 
            exit(); 
        }
        elseif(!($weekday == 'Wednesday' || $weekday == 'Monday' )){
            header("Location: ../wrong-day.html?error=wrongdate".$weekday); 
            exit(); 
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@ocdsb.ca') == false){ 
            header("Location: ../php/attendance-student.php?error=invalidemail"); 
            echo "The email entered is invalid."; 
            exit(); 
        }
        else{
            $sql = "SELECT email FROM attendance WHERE email=?";  
            $statement = mysqli_stmt_init($conn); 
            if(!mysqli_stmt_prepare($statement, $sql)){  
                header("Location: ../php/attendance-student.php?error=sqlerror"); 
                exit();    
            }
            else{  
                mysqli_stmt_bind_param($statement, "s", $email);   
                mysqli_stmt_execute($statement);              
                mysqli_stmt_store_result($statement);  
                $resultCheck = mysqli_stmt_num_rows($statement);  
                if($resultCheck <= 0){
                    header("Location: ../php/attendance-student.php?error=invaliduser"); 
                    echo "The email entered is not registered."; 
                    exit();    
                }
                else{

                    $query = "SELECT * FROM 'attendance' where email='$email'"; 
                    $query_run = mysqli_query($conn, $query); 

                    while($row = mysqli_fetch_array($query_run)){
                       $id = $row['id']; 
                      $first = $row['firstName']; 
                        $last = $row['lastName']; 

                 }
                    
                    $sql = "INSERT INTO attendancehere (id, firstName, lastName, email) VALUES (?, ?, ?, ?)";  
                    $statement = mysqli_stmt_init($conn); 
                    if(!mysqli_stmt_prepare($statement, $sql)){  
                        header("Location: ../php/attendance-student.php?error=sqlerror"); 
                        exit();    
                    }
                    else{
                        mysqli_stmt_bind_param($statement, "ssss", $id, $first, $last, $email);    
                        mysqli_stmt_execute($statement);       
                        
                        header("Location: ../welcome-page.html"); 
                        exit(); 
                    
                    }
    
                }
    
            }
        }
        mysqli_stmt_close($statement); 
        mysqli_close($conn); 

    }
    else{  
        header("Location ../php/attendance-student.php"); 
        exit(); 
    }