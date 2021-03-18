<?php 
	session_start();
	$username = "";
    $password = "";
    $db_user = mysqli_connect('localhost','root','','BB' );


    //log user in from login page
    if(isset($_POST['sub'])){
        $username = mysqli_real_escape_string($db_user, $_POST['username']);
        $password = mysqli_real_escape_string($db_user, $_POST['password']);
        $query = "SELECT * FROM Login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db_user, $query);
		
        if(mysqli_num_rows($result) != 0)
			{            
                //log user in
                if(strcmp($username,"admin")==0)
				{
                    
                    $_SESSION['username'] = $username;
                    header('location: ad.php');

                }
				else{
                    $_SESSION['username'] = $username;
                   header('location: mesaj2.html');
					}
            }
		
    
    }
?>
