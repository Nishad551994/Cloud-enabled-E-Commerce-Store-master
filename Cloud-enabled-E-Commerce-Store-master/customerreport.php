<title>SabiStore</title>

<?php

$con = mysqli_connect('localhost','root','') or die('No Connection');
mysqli_select_db($con, 'sabistore') or die('No Database name');

$msg="";
$aid="";
$today=date("d/m/Y");


//confrim
if(isset($_GET['aid']))	
	$aid=$_GET['aid'];
else
	$aid="NA";
?>
<a href="admin_profile.php?aid=<?php echo $aid;?>">Back to Profile</a><br/>
<a href="javascript:window.print()">Print</a>
<?php
if ($aid=="NA")
{
	header("location: adminlogin.php");
}
else
{
	$sql_sel=mysqli_query($con, "select * from customer");
	$count=mysqli_num_rows($sql_sel);
	
	if($count>0)
	{echo "<table border='1' align='center' width='90%'>";
		echo "<tr><td colspan='5' align='center'><font size='10'><strong>SabiStore</strong></font>&nbsp;<sub><font size='3'>The Ultimate Online Shop</font></sub><hr>Samta Sadan, Mira Bhayandar Road, Mira Road East, Near Veggies Restaurants, Silver Park, Mira Bhayandar, Maharashtra 401107<br>
	Phone No.-28974546.
	Mobile No.-9892345546</td></tr>";
		echo "<tr><td colspan='5' align='center'><font size='6'>Registered Customers</font></td></tr>";
		echo "<tr><td colspan='4' align='left'><font size='4'>Total no. of Customers: $count</td><td align='right'>Date: $today</font></td></tr>";
		echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Address</th><th>Contact No.</th><th>E-mail ID</th></tr>";
		while($row=mysqli_fetch_array($sql_sel))
		{
			echo "<tr><td>",$row[0],"</td><td>",$row[1],"</td><td>",$row[2],"</td><td>",$row[3],"</td><td>",$row[4],"</td></tr>";
		}
		echo "</table>";
	}
	else
	{
		$msg=$msg."No Customers";
	}
}
echo $msg,"<br>";
?>