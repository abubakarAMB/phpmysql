<?php

include 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    //check if data with the id exist in the database

    $sql = 'SELECT * FROM `users` WHERE `id` = "'.$_GET['id'].'"';
    $data = [];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

       $data = $result->fetch_assoc();

    }else{

    	echo "id is invalid";
    }

   // var_dump($data);




}



if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$id = $_POST['id'];

	if (empty($username) || empty($password) || empty($cpassword) || empty($id)) {
		echo "All field are required";
	}else{
      if ($password === $cpassword) {

      	 $token = mt_rand(100, 999999);
      	 $token = md5($token);
      	 $password = md5($password);

      	 $sql = 'UPDATE users SET username = "'.$username.'",password = "'.$password.'" WHERE id ="'.$id.'" ';

      	 $successful = $conn->query($sql);

      if ($successful) {

      	  echo "updated successfully";

        }else{

        	echo "update failed";
        }



      }else{

      	echo "passwords do not match!";
      }



	}
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>About page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- <h1 id="bigheader">This is the index page</h1>
	<h2 class="yezid">this is the index page</h2>
	<h3 class="yezid">this is the index page</h3>
	<p class="yezid">welcome to bincom academy</p>
	<br>
	<p>I am abubakar musa bala</p>
	<hr>
	<p>I am a programmer</p>
	

    <h2>Student registration</h2>
	<form>
		<input type="text" name="name" required>
		<input type="email" name="zipcode">
		<input type="checkbox" name="rice">

		<input type="radio" name="female">
		<input type="submit" name="login" value="LOGIN">
	</form>

	<table>
		<thead>
			<th>Name</th>
            <th>AGe</th>
            <th>Address</th>
		</thead>
		<tbody>
			<tr>
				<td>
					Abubakar Musa 
				</td>
				<td>
				     15
			    </td>
			    <td>
			    	Agege Lagos
			    </td>
			</tr>
			<tr>
				<td>Daniel Okoye</td>
				<td>26</td>
				<td>Victoria Island Lagos</td>
			</tr>
		</tbody>

	</table>



	<div style="text-align: center;" >
		
    <h1>This is the index page</h1>
	<h2>this is the index page</h2>
	<h3>this is the index page</h3>
	<p>welcome to bincom academy</p>
	<p>i am happy</p>
	<br>
	<p>I am abubakar musa bala</p>
	<hr>
	<p>I am a programmer</p>


	</div>

	<h1>List of Students</h1>

	<ol>
	 <li>Abubakar Musa </li>	
     <li>Yezid</li>
     <li>Esther</li>
	</ol>

	<ul>
		 <li>Abubakar Musa </li>	
	     <li>Yezid</li>
	     <li>Esther</li>
	</ul>
 -->



   <ul class="students">
		 <li><a href="index.php"> Home</a></li>	
	     <li><a class="active" href="about.php">About</a></li>
	     <li><a href="contact.php">Contact</a></li>
	</ul>
	<br>
	<!-- <a href="#" class="link-tag">My link</a>
	 <div class="box-model">
 	<p>Testing the box model</p>
 </div>
<input class="form-control" type="text" name="name">
 -->
 <h3>Using CSS to style an HTML Form</h3>

<div>
  <form action="update.php" method="POST">
    
    <input type="hidden" name="id" value="<?php if(isset($data) && !empty($data)){ echo $data['id']; }   ?>">

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Your username.." required value="<?php if(isset($data) && !empty($data)){ echo $data['username']; }   ?>">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Your password.." required>

     <label for="cpassword">Confirm Password</label>
    <input type="password" id="cpassword" name="cpassword" placeholder="Confrim your password.." required>
     
    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
  
    <input type="submit" value="Submit" name="submit">
  </form>
</div>


</body>
</html>