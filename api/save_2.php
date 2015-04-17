<?php
//$connect = new mysqli("localhost", "root", "root", "fblikesmonitor");
include("db_config.php");
echo realpath(dirname(__FILE__));
$url='';
$today = getdate();
$curr_date=$today['year']."-".$today['mon']."-".$today['mday'];
$curr_file_name = $today['year']."".$today['mon']."".$today['mday']."_".date("h:i:sa");
    //get the csv file 
    $file = realpath(dirname(__FILE__))."/facebook_6.csv"; 
    echo "file => ".$file;
    $handle = fopen($file,"r"); 
    //loop through the csv file and insert into database 
    // print "<pre>";
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
                                     '".$connect->real_escape_string($arr['category'])."',
                                     '".$connect->real_escape_string($arr['name'])."',
                                     '".$arr['talking_about_count']."', 
                                     '".$connect->real_escape_string($arr['website'])."', 
                                     '".$arr['likes']."',
                                     '".$data[1]."',
                                     '".$curr_date."'
                                     
                                 ) 
                             ";
                             echo 'str => '.$str."<br>";
                    $connect->query($str);   
                    file_put_contents(dirname(__FILE__)."/uploaded_JSON/".$filename, json_encode($arr));
 	         
     	//
     }               
?>