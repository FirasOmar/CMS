<?php 
		class Edit{
			function __construct(){
			//database conn 
		$this->hostname='localhost';
		$this->database='bmw_app';
		$this->username='root';
		$this->password='';
		$this->mysqli = new mysqli($this->hostname, $this->username, $this->password, $this->database);
			}
			
		}
		function show_cars(){
				$edit = new Edit();
				//select info from bmw_sub_car_info
				$get_data= "SELECT sub_id,name FROM bmw_cars_sub";
				$result= $edit->mysqli->query($get_data);
				return $result;
			}
?>
<html>
<head>
<header><h1>Edit content Form</h1></header>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">English</a></li>
  <li><a data-toggle="tab" href="#menu2">Arabic</a></li>
</ul>
<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
	<table>
<thead>
<tr>
    <th>sub_id</th>
    <th>name</th>
	<th>View</th>
	<th>Edit</th>
  </tr>
  </thead>
  <?php
  $result=show_cars();
  while($row=mysqli_fetch_array($result)){
		
			//echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td><button onclick='display()'>edit</button></td></tr>";
			echo "<tr><td class='id_class'>".$row['sub_id']."</td><td>
			<input type='text' value='".$row['name']."'>
			</td><td><form method='post' action='content.php'>
			<input name='go' type='submit' value='View' />
			<input name='id' type='hidden' value='".$row['sub_id']."' />
			</form></td>
			<td><form><input  type='submit' value='Edit' /></form></td></tr>";
		}
  ?>

</table>
  </div>
  <div id="menu2" class="tab-pane fade">
	<table>
<thead>
<tr>
    <th>sub_id</th>
    <th>name</th>
	<th>View</th>
	<th>Edit</th>
  </tr>
  </thead>
  <?php
  $result=show_cars();
  while($row=mysqli_fetch_array($result)){
		
			//echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td><button onclick='display()'>edit</button></td></tr>";
			echo "<tr><td class='id_class'>".$row['sub_id']."</td><td>
			<input type='text' value='".$row['name']."'>
			</td><td><form method='post' action='content.php'>
			<input name='go' type='submit' value='View' />
			<input name='id' type='hidden' value='".$row['sub_id']."' />
			</form></td>
			<td><form><input  type='submit' value='Edit' /></form></td></tr>";
		}
  ?>

</table>
  </div>
</div>
</body>
</html>