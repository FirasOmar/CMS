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
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#home">images</a></li>
    <li><a data-toggle="tab" href="#menu1">title</a></li>
    <li><a data-toggle="tab" href="#menu2">content</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>



<table style="border:1px solid black  visibility: hidden; ">
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
			$sub_sub_index=$_GET['sub_sub_index'];
			$sub_index=$_GET['sub_index'];
			var_dump($sub_index);
			var_dump($sub_sub_index);
			var_dump($sub_id);
			foreach($array['en'][$sub_index][$sub_sub_index] AS $subkey => $subitem)
			{	//var_dump($subkey);
				//global $i='5';
				//echo "<td style='font-weight:bold;'>".$subkey."</td><br>";
				//echo($subkey);
					echo "<tr><td>".$subkey."</td><td><form method='get' action='data.php'>
											<input name='go_to' type='submit' value='" .$subkey."' />
											<input name='sub_index' type='hidden' value='".$sub_index."' />
											<input name='sub_sub_index' type='hidden' value='".$sub_sub_index."' />
											<input name='sub_sub_sub_index' type='hidden' value='".$subkey."' />
											<input name='id' type='hidden' value='".$i++."' />
																			</form></td></tr>";
			//	break;
			}
			//break;
			//$container[1]=$array_container[1]-$array_container[0];
			//var_dump($k);
		}
		?>
</table>
</body>
</html>



