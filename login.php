<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (!isset($_POST['sent'])){
?>
	<form method="post" action="">
	<input type="hidden" name="sent" id="sent">
	<table>

	<tr>
	<th>
	Username
	</th>
	<td>
	<input type="text" name="username" id="username">
	</td>
	</tr>

	<tr>
	<th>
	Password
	</th>
	<td>
	<input type="password" name="password" id="password">
	</td>
	</tr>
	
	<tr>
	<td colspan="2"><input type="submit" value="ΕΙΣΟΔΟΣ" class="button"></td>
	</tr>
	</table>
	</form>
<?php
}
else {

	$username=test_input($_POST['username']);
	$password=test_input($_POST['password']);
	$sql = "select `fullname`, `username` from `admins` where `username`='$username' and `password`='$password';";
	$result = mysql_query($sql);
	if (mysql_num_rows($result)!=1){
		echo "Login Error";
	}
	else {
		$row = mysql_fetch_assoc($result);
		$_SESSION['username']=$username;
		$_SESSION['fullname']=$row['fullname'];
		$_SESSION['usertype']="A";
		echo "Επιτυχής είσοδος";
                ?>
<script>
    window.location = "index.php";
</script>
                <?php
	}
}
?>