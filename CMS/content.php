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
		function content(){
			GLOBAL $sub_id;
			$edit = new Edit();
		//select info from bmw_sub_car_info
		$sub_id=$_POST['id'];
		$get_data= "SELECT * FROM bmw_sub_car_info WHERE sub_id=$sub_id";
		$result= $edit->mysqli->query($get_data);
		return $result;
			}
		?>

<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<button onclick="history.go(-1);"><span class="glyphicon glyphicon-arrow-left"></span>Back </button>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">English</a></li>
  <li><a data-toggle="tab" href="#menu2">Arabic</a></li>
</ul>

<div class="tab-content">

  <div id="menu1" class="tab-pane fade in active">
    
	<table style="border:1px solid black;">
<thead>
<tr>

<th>content</th>
<th>View</th>
<th>Edit</th>

</tr>
</thead>
		<?php
		$result=content();
		$index=array();
		while($row=mysqli_fetch_array($result)){
			//$info_id=$row['info_id'];
			$exist = $row['info'];
			$str=$exist;
			$str = base64_decode($str);
			$array = unserialize($str);
			/*foreach(){
				
			}*/
			$k=1;
			
			foreach($array['en'] AS $subkey => $subitem)
			{	
				echo "<tr><td><input type='text' value='".$subkey."'></td><td><form method='get' action='sub_content.php'>
											<input name='go_to' type='submit' value='View' />
											<input name='sub_index' type='hidden' value='".$subkey."' />
											<input name='id' type='hidden' value='".$k++."' />
											</form></td>
											<td><form method='get' action='backup.php'><input type='submit' value='Edit' /></form></td></tr>";
			}
		}
		?>
</table>
  </div>
  <div id="menu2" class="tab-pane fade">

	<table style="border:1px solid black;">
<thead>
<tr>

<th>content</th>
<th>View</th>
<th>Edit</th>

</tr>
</thead>
		<?php
		$result=content();
		$index=array();
		while($row=mysqli_fetch_array($result)){
			//$info_id=$row['info_id'];
			$exist = $row['info'];
			$str=$exist;
			$str = base64_decode($str);
			$array = unserialize($str);
			/*foreach(){
				
			}*/
			$k=1;
			foreach($array['en'] AS $subkey => $subitem)
			{	//var_dump($subkey);
				
				echo "<tr><td><input type='text' value='".$subkey."'></td><td><form method='get' action='sub_content.php'>
											<input name='go_to' type='submit' value='View' />
											<input name='sub_index' type='hidden' value='".$subkey."' />
											<input name='id' type='hidden' value='".$k++."' />
											</form></td>
											<td><form method='get' action='backup.php'><input type='submit' value='Edit' /></form></td></tr>";
			}
		}
		?>
</table>
  </div>
</div>




</body>
</html>



