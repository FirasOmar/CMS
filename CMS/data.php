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
		$sub_id=$_GET['id'];
		
		//$k=$_POST[''];
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
</head>
<body>

<div class="container">
  <h2>Edit Tabs</h2>
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home">images</a></li>
    <li><a data-toggle="tab" href="#menu1">title</a></li>
    <li><a data-toggle="tab" href="#menu2">content</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>images</h3>
    <table style="border:1px solid black;">
<thead>
<tr>


<th>sub_content</th>
<th>Edit_content</th>
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
			$i=1;
			$sub_index=$_GET['sub_index'];
			$sub_sub_index=$_GET['sub_sub_index'];
			$sub_sub_sub_index=$_GET['sub_sub_sub_index'];
			//var_dump($sub_index);
			//var_dump($sub_sub_index);
			var_dump($sub_sub_sub_index);
			foreach($array['en'][$sub_index][$sub_sub_index][$sub_sub_sub_index] AS $subkey => $subitem)
			{	//var_dump($subkey);
				//global $i='5';
				//echo "<td style='font-weight:bold;'>".$subkey."</td><br>";
				//echo($subkey);
					echo "<tr><td><input type='text' value='".$subitem."'></td><td><form method='get' action='update.php'>
											<input name='go_to' type='submit' value='Update' />
											
																			</form></td></tr>";
			//	break;
			}
			//break;
			//$container[1]=$array_container[1]-$array_container[0];
			//var_dump($k);
		}
		?>
</table>
	</div>
    <div id="menu1" class="tab-pane fade">
      <h3>title</h3>
    <table style="border:1px solid black;">
<thead>
<tr>


<th>sub_content</th>
<th>Edit_content</th>
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
			$i=1;
			$sub_index=$_GET['sub_index'];
			$sub_sub_index=$_GET['sub_sub_index'];
			$sub_sub_sub_index=$_GET['sub_sub_sub_index'];
			foreach($array['en'][$sub_index][$sub_sub_index] AS $subkey => $subitem)
			{	var_dump($subkey);

					if($subkey === 'title')
					echo "<tr><td><input type='text' value='".$subitem."'></td><td><form method='get' action='update.php'>
											<input name='go_to' type='submit' value='Update' />
											
																			</form></td></tr>";
			}
		}
		?>
</table>
	</div>
    <div id="menu2" class="tab-pane fade">
      <h3>discription</h3>
      <table style="border:1px solid black;">
<thead>
<tr>


<th>sub_content</th>
<th>Edit_content</th>
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
			$i=1;
			$sub_index=$_GET['sub_index'];
			$sub_sub_index=$_GET['sub_sub_index'];
			$sub_sub_sub_index=$_GET['sub_sub_sub_index'];
			foreach($array['en'][$sub_index][$sub_sub_index] AS $subkey => $subitem)
			{	var_dump($subkey);

					if($subkey === 'content')
					echo "<tr><td><input type='text' value='".$subitem."'></td><td><form method='get' action='update.php'>
											<input name='go_to' type='submit' value='Update' />
											
																			</form></td></tr>";
			}
		}
		?>
</table>
    </div>

  </div>
</div>

</body>
</html>



