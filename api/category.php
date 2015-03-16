<?php
header ("Content-type: application/json");
include("db_config.php");
function get_m_category($connect){
	$get_m_category = $connect->query("SELECT DISTINCT `m_category` FROM `likes` ORDER BY `likes`.`m_category` ASC ");
	while ($row_category = $get_m_category->fetch_assoc()) {
			$category[] = stripslashes($row_category['m_category']);
		}
		return $category;

}
$category = get_m_category($connect);
echo json_encode($category);
?>