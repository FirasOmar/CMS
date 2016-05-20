# CMS
Intoduction :

this is simple CMS using PHP , this CMS retieve data from serializable array and decode it.
then fill it into table to be readable then the user can edit this data and save it by encode it again to its serializable array,
also there is file manager to handle pictures. 

Code: 

this piece of code to show how to deal with serializable array...
	<?php
		$result=content();
		//$index=array();
		while($row=mysqli_fetch_array($result)){
			$exist = $row['info'];
			$str=$exist;
			$str = base64_decode($str);
			$array = unserialize($str);
			foreach($array['en'] AS $subkey => $subitem)
			{	
				echo "<tr><td><input type='text' value='".$subkey."'></td><td><form method='get' action='sub_content.php'>
											<input name='go_to' type='submit' value='View' />
											<input name='lang' type='hidden' value='".$lang."' />
											<input name='sub_index' type='hidden' value='".$subkey."' />
											<input name='id' type='hidden' value='".$sub_id."' />
											</form></td></tr>";
			}
		}
		?>


Instulation :

Downlowd the file into your server side (xamp , wamp ...) or any server side you use .
create database then import the database file that exist inside file you downloaded.
then you can run it .

Screenshots : 

![Alt text](https://github.com/FirasOmar/Gallery/blob/master/cms1.png?raw=true)
![Alt text](https://github.com/FirasOmar/Gallery/blob/master/cms2.png?raw=true)



