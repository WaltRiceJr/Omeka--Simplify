<?php  

	/* changed to inline rendering -- this file produces no headers
		and should be included in another file that provides either opening
		and closing <style> tags, or provides a header for a standalone 
		CSS file
	*/
	
	$db = get_db();
	$mysql = 'SELECT * FROM '. $db->prefix .'elements
			WHERE 
			element_set_id = "1" 
			ORDER BY '. $db->prefix .'elements.order ASC';

	$our_crazy_array = $db->fetchAll($mysql);	
	$count_crazy_array = count($our_crazy_array);

	for($x=0;$x<$count_crazy_array;$x++)
	{
		//there should be 15 of these. Unless someone hacked and modified the code...
	 	$thisone = get_option('simplifyon'.$our_crazy_array[$x][id].'');
		if($thisone == "no")
		{
			//first, parse the ID into the div. 
			//the id of the fields on the admin side look like this: id="element-50"
			?>
#element-<?php echo $our_crazy_array[$x][id] . "\n";?>
{
	display: none; 
}
<?php
		}
	}

?>