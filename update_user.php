<?php include "server.php" ;
  if (isset($_POST['update'])) {

    $username = $_POST['username'];

    $id = $_POST['id'];

    $email = $_POST['email'];

    $user_type = $_POST['user_type'];

    $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`user_type`='$user_type' WHERE `id`='$id'"; 

    $result = $db->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $db->error;

    }

} 

if (isset($_GET['id'])) {

$id = $_GET['id']; 

$sql = "SELECT * FROM `users` WHERE `id`='$id'";

$result = $db->query($sql); 

if ($result->num_rows > 0) {        

    while ($row = $result->fetch_assoc()) {

        $username = $row['username'];

        $email = $row['email'];

        $user_type  = $row['user_type'];

        $id = $row['id'];

    } 
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>update</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - update user</h2>
	</div>
	
	<form method="post" action="update_user.php">


		<div class="input-group">
			<input type="hidden" name="id" value="id">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type">
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user"> Update</button>
		</div>
	</form>
</body>
</html>