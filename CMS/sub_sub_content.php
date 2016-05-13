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
  <link rel="stylesheet" href="style.css">
</head>
<body>
<button onclick="history.go(-1);"><span class="glyphicon glyphicon-arrow-left"></span>Back </button>
<div class="container">
  <ul class="nav nav-tabs">
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
			$sub_sub_index=$_GET['sub_sub_index'];
			$sub_index=$_GET['sub_index'];
			
			foreach($array['en'][$sub_index][$sub_sub_index] AS $subkey => $subitem)
			{	
					echo "<li><a data-toggle='tab' href='#".$subkey."'>".$subkey."</a></li>";
	
			}
		}
		?>
  </ul>

  <div class="tab-content">
    <div id="images" class="tab-pane fade in active">
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
			//$sub_sub_sub_index=$_GET['sub_sub_sub_index'];
			foreach($array['en'][$sub_index][$sub_sub_index]['images'] AS $subkey => $subitem)
			{	
					echo "<tr><td><input type='text' value='".$subitem."'></td><td><form method='get' action='update.php'>
											<input name='go_to' type='submit' value='Update' />
											
																			</form></td></tr>";
			}
		}
		?>
</table>
    </div>
    <div id="title" class="tab-pane fade">
	<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home11">English</a></li>
  <li><a data-toggle="tab" href="#menu11">Arabic</a></li>

</ul>

<div class="tab-content">
  <div id="home11" class="tab-pane fade in active">
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
			{	

					if($subkey === 'title')
					echo "<tr><td><input type='text' value='".$subitem."'></td><td><form method='get' action='update.php'>
											<input name='go_to' type='submit' value='Update' />
											
																			</form></td></tr>";
			}
		}
		?>
</table>
  </div>
  <div id="menu11" class="tab-pane fade">
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
			{	

					if($subkey === 'title')
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
    <div id="content" class="tab-pane fade">
	<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home22">English</a></li>
  <li><a data-toggle="tab" href="#menu22">Arabic</a></li>

</ul>

<div class="tab-content">
  <div id="home22" class="tab-pane fade in active">
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
			{	
					if($subkey === 'content')
					echo "<tr><td><textarea rows='8' cols='80' >'".$subitem."'</textarea></td><td><form method='get' action='update.php'><input name='go_to' type='submit' value='Update' /></form></td></tr>";
			}
		}
		?>
</table>
  </div>
  <div id="menu22" class="tab-pane fade">
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
			{	
					if($subkey === 'content')
					echo "<tr><td><textarea rows='8' cols='80' >'".$subitem."'</textarea></td><td><form method='get' action='update.php'><input name='go_to' type='submit' value='Update' /></form></td></tr>";
			}
		}
		?>
</table>
  </div>
  
</div>
     
    </div>
  </div>
</div>
</body>
</html>



