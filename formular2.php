<html>
<body>
<?php

	if(isset($_POST['Send']))
	{
		$con=mysqli_connect("localhost","root","","BB");
		$valori="INSERT INTO Comenzi (nume, prenume,telefon,email,comanda) VALUES ('$_POST[nume]', '$_POST[prenume]','$_POST[telefon]','$_POST[email]','$_POST[comanda]')";
		mysqli_query($con,$valori);
	header("location: mesaj.html");}
		
   else
	{$edit_state=false;
	 if(isset($_POST['edit']))
	 $con=mysqli_connect("localhost","root","","BB");
	 {	
	 $nume=mysqli_real_escape_string($con,$_POST['nume']);
	 $prenume=mysqli_real_escape_string($con,$_POST['prenume']);
	 $email=mysqli_real_escape_string($con,$_POST['email']);
	 $telefon=mysqli_real_escape_string($con,$_POST['telefon']);
	 $comanda=mysqli_real_escape_string($con,$_POST['comanda']);
	 
	 mysqli_query($con, "UPDATE Comenzi SET nume='$nume',prenume='$prenume',email='$email',telefon='$telefon',comanda='$comanda' WHERE telefon=$telefon");
	 header('location: ad.php');
	}
	}

?>
</body>
</html>