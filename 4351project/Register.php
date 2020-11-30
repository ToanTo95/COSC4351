<?php


//ECHO "ONE";
session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $useremail = $_POST['useremail'];
    $role = $_POST['role'];

    //echo $position;
    //ECHO "TWO";
  
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "Houston20";
    $dbname = "adminportal";
//echo"4";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname); 
    //echo "5";
    if (mysqli_connect_error())
    {
        echo "It failed";
        die('Connection Failed: '.mysqli_connect_error());
    }
  
    else{
       
            
        $SELECT = "SELECT ID FROM user WHERE UserName = ? LIMIT 1";
        $INSERT = "INSERT INTO user ( UserName, Password, UserEmail, Role) VALUES (?, ?, ?, ?)";
        //ECHO"CHECK2";        
    
   
        

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            

            $stmt->bind_param("ssss", $username,$password, $useremail, $role);
            $stmt->execute();
            $stmt->close();

            $_SESSION['message'] = "You have Successfully Registered, Please Login";
            header("location:register_success.php");
           
        }
        else{

            $_SESSION['message'] = "An Account is Already Associated with this userid, Please Login";
            header("location:Register_error.php");


            
        }
        


    }
    
    $conn->close();
   
?>



