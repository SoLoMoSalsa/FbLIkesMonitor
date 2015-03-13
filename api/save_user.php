<?php
$connect = new mysqli("localhost", "root", "root", "fb_likes");
$get_username = $connect->query("SELECT * FROM `username`"); 
$arr = [];
while ($row_username = $get_username->fetch_assoc()) {
        foreach ($row_username as $key => $value) {
     // print $key."<br>";
           $arr[$row_username['user_name']]= $row_username['id'];
        }
        //$i++;
    }
    print "<pre>";
    print_r($arr);
    foreach ($arr as $key => $value) {
        $sql = "UPDATE likes
        SET user_id=".$value."
        WHERE username='".$key."'";
        echo $sql.'<br>';
        //$connect->query($sql);
    }
/*$url='';
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
     	$str = "INSERT INTO username (`user_name`) VALUES 
     	                         ( 
     	                             '".$username."'     	                             
     	                         ) 
     	                     ";
     	                     echo 'str => '.$str;
     	                $connect->query($str);
     } 
} */
             
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