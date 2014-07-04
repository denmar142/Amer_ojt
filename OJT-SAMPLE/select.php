<?php 

 mysql_connect("localhost", "root", "") or die ("We could not connect");
  mysql_select_db("video_stream_db");

$result = mysql_query("SELECT* FROM video_stream_tbl");

$post = mysql_fetch_array($result);
if(!$result)
{
	die("ERROR: Post not found");
}
echo '<embed src="http://www.youtube.com/watch?v=z7g51WaADh4.wmv" autostart="false"></embed>';

mysql_close();
 ?>