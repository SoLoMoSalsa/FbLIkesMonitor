<?php
$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
$url='';
$today = getdate();
$curr_date=$today['year']."-".$today['mon']."-".$today['mday'];
$curr_file_name = $today['year']."".$today['mon']."".$today['mday']."_".date("h:i:sa");
if ($_FILES["csv"]["size"] > 0) { 

    //get the csv file 
    $file = $_FILES["csv"]["tmp_name"]; 
    echo "file => ".$file;
    $handle = fopen($file,"r"); 
    //loop through the csv file and insert into database 
    print "<pre>";
    while ($data = fgetcsv($handle, 10000, ','))
     { 
     	$url_partiton = explode("/",$data[2]);
     	$username = $url_partiton[count($url_partiton)-1];
     	$url="http://graph.facebook.com/".$username;
     	$fetch_data = file_get_contents($url);
     	$arr = json_decode($fetch_data,true);
     	$filename = $username."_".$curr_file_name;
     	$str = "INSERT INTO likes (`username`, `category`, `name`,`talking_about_count`, `website`, `likes`, `m_category`, `date`) VALUES 
     	                         ( 
     	                             '".$username."', 
     	                             '".$arr['category']."',
                                     '".$connect->real_escape_string($arr['name'])."',
     	                             '".$arr['talking_about_count']."', 
     	                             '".$arr['website']."', 
     	                             '".$arr['likes']."',
     	                             '".$data[1]."',
     	                             '".$curr_date."'
     	                             
     	                         ) 
     	                     ";
     	                     echo 'str => '.$str;
     	                $connect->query($str);
     	file_put_contents(dirname(__FILE__)."/uploaded_JSON/".$filename, json_encode($arr));
     } 
}               
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET["success"])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 
</body> 
</html> 