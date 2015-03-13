<?php
header ("Content-type: application/json");
$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
$page_length = 20;
function get_likes_category($connect, $category){
	$all_likes = $connect->query("SELECT * FROM `likes` WHERE `m_category` LIKE '%".$category."%' ORDER BY `likes`.`username` ASC  ");
	$i=0;
	while ($row_likes = $all_likes->fetch_assoc()) {
			foreach ($row_likes as $key => $value) {
				$likes[$i][$key] = $value;
			}
			$like_data[$likes[$i]['username']][$likes[$i]['date']] = $likes[$i]['likes'];
			$i++;
		}
		return $like_data;
}
if(isset($_GET['page']))
{
	$page_start = (($_GET['page']-1)*$page_length);
}
else
	$page_start = 0;
		if(isset($_GET['category']))
		{
			$likes_category = get_likes_category($connect, $_GET['category']);
			//print_r($likes_category);
			echo json_encode(array_slice($likes_category,$page_start,20));
		}
//print_r(get_likes_category($connect, $_GET['category']));
?>