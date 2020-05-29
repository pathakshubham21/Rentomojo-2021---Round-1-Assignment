<!DOCTYPE html>
<html>
<head>
	<title>Add contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<center>
	<form method="post">
		<div style="border-style: solid; height: 380px;width: 300px;margin-top: 60px;">
		<h3>Add new Contact</h3>
		Name:
		<br>
			<input type="text" name="name" placeholder="Name" style="height: 30px;" required;>
			<br>
				DOB:
		<br>
			<input type="text" name="dob" placeholder="dd/mm//yy" style="height: 30px;" required;>
			<br>
	Mobile Number:
		<br>
			<input type="text" required; name="mob" placeholder="+91-XXXXXXXXXX" style="height: 30px; width: 150px;"><i style="margin-left: 10px;" class="fa fa-plus-circle" style="font-size:24px"></i>
			<br>
		Email:
		<br>
			<input  required;type="gmail" name="email" placeholder="abc@gmail.com" style="height: 30px;width: 150px;"><i style="margin-left: 10px;" class="fa fa-plus-circle" style="font-size:24px"></i>
			<br>
			<br>
			<input style="text-align: right;background-color: green;" type="submit" name="submit" value="submit">
		</div>

	</form>
</center>
<?php
error_reporting(0);
if($_POST['name']!=""&&$_POST['dob']!=""&&$_POST['email']!=""&&$_POST['mob']!="")
{

$n=$_POST["name"];
$mob=$_POST["mob"];
$dob=$_POST["dob"];
$gmail=$_POST["email"];

$sql = "SELECT * FROM data";
$res= mysqli_query($con,$sql);
$mes= mysqli_query($con,$sql);
$count=0;
while($row = mysqli_fetch_array($res)){
    $count=$count+1;
}

while($count>0){
	$row1 = mysqli_fetch_array($mes);
	if($_POST['NAme']==$row1['Name'])
		die("Name already taken try other one");
	$count=$count-1;
}


$con=mysqli_connect("localhost","root","","lpu");
if(!$con)
	die("Server could not connected");
$sqldata="insert into data values('".$n."','".$dob."','".$mob."','".$gmail."')";

$rs=mysqli_query($con,$sqldata);
if($rs!=0)
{
 echo "<script> alert('Account Created'); </script>";
}
else
echo "<script> alert('Something went wrong try again');</script>";
}
else if(isset($_POST['submit'])) 
	echo "<script> alert('fill all field');</script>";
?>


</body>
</html>