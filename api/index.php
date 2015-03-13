<?php
header ("Content-type: application/json");
$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
$page_length = 20;
function get_likes($connect){
	$all_likes = $connect->query("SELECT * FROM `likes` ORDER BY `username` ");
	$i=0;
	while ($row_likes = $all_likes->fetch_assoc()) {
			foreach ($row_likes as $key => $value) {
				$likes[$i][$key] = $value;
			}
			$like_data[$likes[$i]['username']][$likes[$i]['date']] = $likes[$i]['likes'];
			$i++;
		}

//print_r($like_data);
		//print_r(array_slice($like_data,0,20));
		return $like_data;
}
if(isset($_GET['page']))
{
	$page_start = (($_GET['page']-1)*$page_length);
}
else
	$page_start = 0;
$likes_all = get_likes($connect);
echo json_encode(array_slice($likes_all,$page_start,20));
//print_r($likes_all);
?>