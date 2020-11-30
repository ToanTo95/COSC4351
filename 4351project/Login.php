
<?php
session_start();

    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $_SESSION['$username']=$username;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $_SESSION['$username']=$username;
    //$Role = $_POST['Role'];


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "Houston20";
    $dbname = "adminportal";

// Create connection
$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

function redirect($location){
    return header("Location: {$location}");
}
function fetch_array($result){

	return mysqli_fetch_array($result);
}


if(mysqli_connect_error())
    die("Connection Failed".mysqli_connect_error());
else
    echo "connected";
    

    $query = "SELECT * FROM user WHERE UserName = '$username' LIMIT 1";


    $result = mysqli_query($conn,$query);
    $rnum = $result->num_rows;
    if($rnum == 0){
        
        $_SESSION['message'] = "Make sure you are using a valid UserName  or Register if you haven't done so";
        header("location: error.php");
        
    }
    
    else{
        $result_array = fetch_array($result);
        
        if($username === $result_array['UserName'] && $password == $result_array['Password'] && $role == $result_array['Role'])
        {
   
            $_SESSION['UserName'] = $result_array['UserName'];
            $_SESSION['UserEmail'] = $result_array['UserEmail'];
            $_SESSION['Role'] = $role;
             
            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;
            
            if($_SESSION['Role'] == 'Support')
                header("location: SupportAdmin.php");
            elseif($_SESSION['Role'] == 'Finance')
                header("location: FinanceAdmin.html");
            elseif($_SESSION['Role'] == 'Sales')
                header("location: SalesAdmin.html");
            elseif($_SESSION['Role'] == 'HR')
                header("location: HRAdmin.html");
            elseif($_SESSION['Role'] == 'Tech')
                header("location: TechAdmin.html");
            
            
        }
        else{
            
            $_SESSION['message'] = "You have entered an incorrect UserName, Password or the wrong role. Please Try Again";
            header("location: error.php");
        }
        
    }
    
    

        

?>