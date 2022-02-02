<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('server.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - view user</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


</head>
<body>
     <div class="input-group">
			<a href="view_user.php"><button type="submit" class="btn" name="reg_user"> + Create user</button></a>
	</div>


    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Email</th>

        <th>User Type</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php
	 
     $sql = "SELECT * FROM users";
     $result = $db->query($sql);
     
     if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
        


        ?>

        <tr>

        <td><?php echo $row['id']; ?></td>

        <td><?php echo $row['username']; ?></td>

        <td><?php echo $row['email']; ?></td>

        <td><?php echo $row['user_type']; ?></td>

        <td><a class="btn btn-info" href="update_user.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>

        </tr>                       

<?php       

       }
     } else {
       echo "0 results";
     }
     

       

            

        ?>                

    </tbody>

</table>
</body>
</html>

		