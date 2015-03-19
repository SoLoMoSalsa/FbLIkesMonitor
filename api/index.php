<?php
header ("Content-type: application/json");
include("db_config.php");
//$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
$where = "";
$date_array =array('2015-03-11','2015-03-14','2015-03-16','2015-03-17','2015-03-18','2015-03-19');
//$date_array = [];
$where .= 'where date in (';
//	echo 'size => '.count($date_array);
foreach ($date_array as $key => $value) {
	if($key == (count($date_array)-1))
		$where .='"'.$value.'"';
	else
	$where .='"'.$value.'",'; 
}
$where .=')';
/*echo 'where => '.$where."</br>";
echo "SELECT * FROM `likes` ".$where." ORDER BY `name` ";
*/function get_likes($connect, $where){
	$all_likes = $connect->query("SELECT * FROM `likes` ".$where." ORDER BY `name` ");
	$i=0;
	while ($row_likes = $all_likes->fetch_assoc()) {
			foreach ($row_likes as $key => $value) {
				$likes[$i][$key] = $value;
			}
			$like_data[$likes[$i]['name']][$likes[$i]['date']] = $likes[$i]['likes'];
			$i++;
		}

//print_r($like_data);
		//print_r(array_slice($like_data,0,20));
		return $like_data;
}

//print_r($likes_all);

function get_likes_category($connect, $category, $where){
	$all_likes = $connect->query("SELECT * FROM `likes` ".$where." AND `m_category` LIKE '%".urldecode($category)."%' ORDER BY `likes`.`name` ASC  ");
	$i=0;
	while ($row_likes = $all_likes->fetch_assoc()) {
			foreach ($row_likes as $key => $value) {
				$likes[$i][$key] = $value;
			}
			$like_data[$likes[$i]['name']][$likes[$i]['date']] = $likes[$i]['likes'];
			$i++;
		}
		return $like_data;
}

		if(isset($_GET['category']))
		{
			if($_GET['category'] != 'All')
			{
				$likes_category = get_likes_category($connect, $_GET['category'],$where);
				//print_r($likes_category);
				//echo json_encode(array_slice($likes_category,$page_start,20));
				echo json_encode($likes_category);	
			}
			else
			{
				$likes_all = get_likes($connect,$where);
				echo json_encode($likes_all);
			}
			
		}
		else
		{
			$likes_all = get_likes($connect,$where);
			echo json_encode($likes_all);
		}

?>