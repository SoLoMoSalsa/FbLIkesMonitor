<?php
header ("Content-type: application/json");
$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
$page_length = 20;
if(isset($_GET['page']))
{
	$page_start = (($_GET['page']-1)*$page_length);
}
else
	$page_start = 0;

function get_likes($connect){
	$all_likes = $connect->query("SELECT * FROM `likes` ORDER BY `name` ");
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

function get_likes_category($connect, $category){
	$all_likes = $connect->query("SELECT * FROM `likes` WHERE `m_category` LIKE '%".urldecode($category)."%' ORDER BY `likes`.`name` ASC  ");

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
			$likes_category = get_likes_category($connect, $_GET['category']);
			//print_r($likes_category);
			//echo json_encode(array_slice($likes_category,$page_start,20));
			echo json_encode($likes_category);
		}
		else
		{
			$likes_all = get_likes($connect);
			echo json_encode(array_slice($likes_all,$page_start,20));
		}

?>