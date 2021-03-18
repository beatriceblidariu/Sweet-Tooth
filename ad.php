<?php 
$nume="";
$prenume="";
$email="";
$telefon="";
$comanda="";
$edit_state=false;
$db=mysqli_connect("localhost","root","","BB"); 
if(isset($_GET['edit']))
{
	$telefon=$_GET['edit'];
	$rec=mysqli_query($db,"SELECT * FROM Comenzi WHERE telefon=$telefon");
	$edit_state= true;
	$record=mysqli_fetch_array($rec);
	$nume=$record['nume'];
	$prenume=$record['prenume'];
	$email=$record['email'];
	$telefon=$record['telefon'];
	$comanda=$record['comanda'];
	
	
}
$results=mysqli_query($db,"SELECT * FROM Comenzi  ORDER BY nume");

if (isset($_GET['delete'])) {
	$telefon = $_GET['delete'];
	mysqli_query($db, "DELETE FROM Comenzi WHERE telefon=$telefon");
	header('location: ad.php');
}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="tab.css">
</head>
<body>
<table class="table"> 
		<thead>
				<tr>
					<th bgcolor="#db70b8">Nume</th>
					<th bgcolor="#db70b8">Prenume</th>
					<th bgcolor="#db70b8">Email</th>
					<th bgcolor="#db70b8">Telefon</th>
					<th bgcolor="#db70b8">Comanda</th>
					<th  bgcolor="#db70b8" colspan="2">Action</th>
				</tr>
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){?>
				<tr>
					<td><?php echo $row['nume'];?></td>
					<td><?php echo $row['prenume'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['telefon'];?></td>
					<td><?php echo $row['comanda'];?></td>
					<td><a href="ad.php?edit=<?php echo $row['telefon']; ?>" class="btn" >Edit</a></td>
					<td><a href="ad.php?delete=<?php echo $row['telefon']; ?>" class="btn" >Delete</a></td>
				</tr>
			<?php } ?>
				
		</tbody>
</table>
<form action="formular2.php" method="post">
	<p>Nume: <input type="text" name="nume" value="<?php echo $nume;?>"></p>
	<p>Prenume: <input type="text" name="prenume" value="<?php echo $prenume;?>"></p>
	<p>Telefon: <input type="text" name="telefon" value="<?php echo $telefon;?>"></p>
	<p>E-mail: <input type="text" name="email" value="<?php echo $email;?>"></p>
	<p>Comanda: <input type="text" name="comanda" rows="5" cols="40" value="<?php echo $comanda?>"></p>


		
					<?php if($edit_state==false):?>	
					<input type="submit" name="Send"  value="Plaseaza comanda">
					<?php else: ?>
					<input type="submit" name="edit" value="Plaseaza comanda">				
					<?php endif ?>
</form>
	
</body>
</html>