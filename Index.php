<?php

$servername = "sql2.njit.edu";    //sql2.njit.edu:3306 AFS
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";


// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM `Chat`";
$result = mysqli_query($conn, $sql);

?>Chat table in Database:<?php
echo"<Table border='1' class='Table'>";
echo"<tr><td>Name</td><td>Password</td>";

while($row = mysqli_fetch_array($result)){
    echo "<tr><td>{$row["Name"]}</td><td>{$row["Password"]}</td>";
    
}

echo"</table>";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Chat</title>
<style>
#status{
    color: red;
}
.main {

  color: black;
  border-radius: 20px;
  Border-color: Solidblack;
  background-color: rgba(209, 14,14, 0.1);
}
.main th
{
  border-style: hidden;
  width: 50%;
  padding: 1%;


}
.main td
{
  border-style: hidden;
  width: 50%;
  padding: 1%;


}



</style>
</head>
<body>
	<form>
      <table class="main" border="border">

		      <tr>
		        <td>Name:(Required)</td>
		        <td><label> <input type="text" id="firstName" name="firstName" /> </label></td>
		      </tr>
		       <tr>
		        <td>Password:(Required)</td>
		        <td><label> <input type="text" id="password" name="password" onkeyup="validation()"/> </label></td>
		      </tr>
		      </br></br></br></br></br></br>
		      <tr>
		        <td>Message:</td>
		      </tr>
		      <tr>
		      	<td><textarea id="message" name="message" rows="10" cols="30" onkeyup="sendMessage(this.value)"></textarea></td>
		      </tr>
		      <tr>
		        <td>Status message</td>
		        <td><span id="status"></span></td>
		      </tr>
		                    
      </table>
      			      			    			
 	</form>
 	</br>
 	</br>
 	</br>
 	</br>
 			<table class="main" border="border">

		      <tr>
		        <td>Enter Valid Name:(Required)</td>
		        <td><label> <input type="text" id="Name" name="Name" /> </label></td>
		      </tr>
		      <tr>
		        <td><input type="button" value="Listen" id="submit" name="submit" onclick="getFunction()"></td>
		      </tr>
		    
		      <tr>
		      	<td><Span id="message" row="10" cols="30"></Span></td>
		      </tr>
		      
		       <tr><td>Message:</td><td><textarea rows="5" cols="50" id="msg"></textarea></td></tr>             
      </table>
      </br></br></br>
           	
 	<script>

 	function validation(){

 		var name = document.getElementById("firstName").value;
		var pwd = document.getElementById("password").value;
		
		
		var xhttp;
		if (pwd.length < 3) { 
			document.getElementById("status").innerHTML = "Enter name and password";
				return;
						  }
		  
		xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	 document.getElementById("status").innerHTML = this.responseText;
		    	  }
		  };
		  xhttp.open("GET", "validate.php?name="+name+"&password="+pwd, true);
		  xhttp.send();   
				
		}


			function getFunction(){


				var name = document.getElementById("Name").value;
				var xhttp;
				if (name.length == 0) { 
					document.getElementById("msg").innerHTML = "Enter Name";
						return;
								  }
				xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				    	  	document.getElementById("msg").innerHTML = this.responseText;
					 }
				  };
				  xhttp.open("GET", "Listen.php?name="+name, true);
				  xhttp.send();   
				  setTimeout(getFunction, 5000);
	  				
				}


			function sendMessage(str) {
				var name = document.getElementById("firstName").value;
				var pwd = document.getElementById("password").value;
			  var xhttp;
			  if (str.length == 0) { 
			    document.getElementById("status").innerHTML = "";
			    return;
			  }
			  xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
				   
				    document.getElementById("status").innerHTML = this.responseText;

			      			      
			    }
			  };
			  xhttp.open("GET", "chat.php?q="+str+"&name="+name, true);
			  xhttp.send();   
			}
	</script>
 	
</body>
</html>