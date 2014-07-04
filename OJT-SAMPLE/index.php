<?php 
require_once("includes/config.php");
 ?>

<!DOCTYPE html>
	<html>
	<head>
 
    		<title>SMNI</title>
               <link rel="shorcut icon" href="shortcut icon.png">
	 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.4.2.min.css">
	<link rel="stylesheet" href="_assets/css/jqm-demos.css">
	<script src="js/jquery.js"></script>
	<script src="_assets/js/index.js"></script>
	<script src="js/jquery.mobile-1.4.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/javascript" href="style.js">
	

    <script type="text/javascript">
    $( document ).on( "pagecreate", function() {
    // The window width and height are decreased by 30 to take the tolerance of 15 pixels at each side into account
    function scale( width, height, padding, border ) {
        var scrWidth = $( window ).width() - 30,
            scrHeight = $( window ).height() - 30,
            ifrPadding = 2 * padding,
            ifrBorder = 2 * border,
            ifrWidth = width + ifrPadding + ifrBorder,
            ifrHeight = height + ifrPadding + ifrBorder,
            h, w;
        if ( ifrWidth < scrWidth && ifrHeight < scrHeight ) {
            w = ifrWidth;
            h = ifrHeight;
        } else if ( ( ifrWidth / scrWidth ) > ( ifrHeight / scrHeight ) ) {
            w = scrWidth;
            h = ( scrWidth / ifrWidth ) * ifrHeight;
        } else {
            h = scrHeight;
            w = ( scrHeight / ifrHeight ) * ifrWidth;
        }
        return {
            'width': w - ( ifrPadding + ifrBorder ),
            'height': h - ( ifrPadding + ifrBorder )
        };
    };
    $( ".ui-popup iframe" )
        .attr( "width", 0 )
        .attr( "height", "auto" );
    $( "#popupVideo" ).on({
        popupbeforeposition: function() {
            // call our custom function scale() to get the width and height
            var size = scale( 497, 298, 15, 1 ),
                w = size.width,
                h = size.height;
            $( "#popupVideo iframe" )
                .attr( "width", w )
                .attr( "height", h );
        },
        popupafterclose: function() {
            $( "#popupVideo iframe" )
                .attr( "width", 0 )
                .attr( "height", 0 );
        }
    });
});
</script>


    </head>

    <style type="text/css">

        iframe {
    border: none;

}

    #img_header
    {
        
        height: 100px;
        margin-left: 19%;
        margin-top: 1.5px;
        width: 62%;
        border-radius: 2px 2px 2px 2px;
    }

    .wrapper
    {
        width: 80px;
        height: 120px;
        margin-left: 1%;
        margin-top: 1%;
        box-shadow: 1px 1px 1px #ffffff;   
    }
    
    .container
    {
        background-color: #f3e9e9;
    }   
    
    .post1
    {
        width: 90%;
        margin-left: 5%;
    }
    .video
    {

        box-shadow: 1px 1px 1px 1px #c0c0c0;
        margin-left: 19%;
        padding: 1%;
        background-color: white; 
        width: 60%


    }
    #s
    {
        float: right;
        margin-right: 70%;
        margin-top: 5%;
    }
    .tanaw  
    {
        list-style-type: none;
        background-color: black;
        border-radius: 2px 2px 2px;

        width: 50%;
        height: 30%;
        text-decoration: underline;
        color: white;
        border-style: none;
        font-family: lucida;
        margin-top: 1%;
        margin-left: 50%;
    }

    .tanaw:hover  
    {
        list-style-type: none;
        background-color: blue;
        border-radius: 2px 2px 2px;

        width: 50%;
        height: 30%;
        text-decoration: underline;
        color: white;
        border-style: none;
        font-family: lucida;
        margin-top: 1%;
        margin-left: 50%;
    }
    .salida
    {
        padding: 1%;
    }
    #posting
    {
        margin-top: 1%;
        margin-left: 36%;
        list-style-type: none;
        font-family: lucida;
        font-size: 30px;
    }
   #footer{
height: 1em;
padding: 1em;
text-align: center;
background-color: #1A446C;
color: #D4E6F4;
font-family: sans-serif;
font-size: 12px;
}

#offline
{

    width: 40%;
}
    </style>
	<body>
    <div class="container">
    
    <div data-role="header" data-theme="a" id="header">
    
         <div data-role="navbar" data-iconpos="bottom">
    
            <img id="img_header" src="logo.jpg">
    

</div>

        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="gear" data-iconpos="notext">Add</a>

<div class="video">
<?php 
require_once('class.php');

$hostname = 'localhost';       
 $dbname   = 'video_stream_db';
 $username = 'root';            
 $password = ''; 
 $id = uniqid();
 mysql_connect($hostname, $username, $password) or DIE('NOT Connected!');
 mysql_select_db($dbname) or DIE('Database name is not available!');

if(!$sock = @fsockopen('www.youtube.com', 80, $num, $error, 5))
{
    echo "<center><h1>Offline</h1>";
    echo "<center><img id = 'offline' src='radio_tower_graphic.jpg' style='width='40%;' height='40%;''>";
}else
{
    echo "<h1>Video Stream<h1/>";
$sql = mysql_query("SELECT* FROM video_stream_tbl");
while ($row = mysql_fetch_array($sql)) {
    
   echo '<hr/><div class="d"><object width="640" height="390">
  <param name="movie"
          value="'.$row['link'].'"></param>
   <param name="allowScriptAccess" value="always"></param>
   <embed src="'.$row['link'].'"
         type="application/x-shockwave-flash"
          allowscriptaccess="always"
          width="250" height="150"></embed>
 </object> <div class="salida"><a href="#popupVideo" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-theme="b">Watch this video</a>
 <div data-role="popup" id="popupVideo" data-overlay-theme="b" data-theme="a" data-tolerance="15,15" class="ui-content">
     <iframe src="'.$row['link'].'" width="700" height="298" seamless=""></iframe>
 </div></li></div>
 ';
}  
}
?>    
</div>

    </div>

    <div data-role="panel" data-display="push" data-theme="a" id="nav-panel">
        <ul data-role="listview" class="style">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
                <li data-icon="video" data-theme="b"><a href="index.php">Home</a></li>
                <li data-icon="video" data-theme="b"><a href="post.php" rel="external">About SMNI</a></li>
                <li data-icon="video" data-theme="b"><a href="#">Global TV</a></li>
                <li data-icon="video" data-theme="b"><a href="#">Sunshine Radio</a></li>
                <li data-icon="video" data-theme="b"><a href="#">Publication</a></li>
                <li data-icon="video" data-theme="b"><a href="#">Media Partners</a></li>
                <li data-icon="video" data-theme="b"><a href="#">Watch Live Broadcast</a></li>
               
        </ul>
    </div><!-- /panel -->
    <div data-role="panel" data-theme="a" data-position="right" data-display="push" id="add-form">
        
        <ul data-role="listview">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
        </ul>
        <br/>
        <form>
     <input type="search" name="search-1" id="search-1" Placeholder="Search for this website.......">
</form>
    <form>
    <ul data-role="listview">
        <li data-icon="mail" data-theme="b"><a href="news.php" rel="external">Local News</a></li>
         <li data-icon="location" data-theme="b"><a href="#">World</a></li>
          <li data-icon="plus" data-theme="b"><a href="#">Health</a></li>
           <li data-icon="star" data-theme="b"><a href="#">Science & Technology</a></li>
            <li data-icon="shop" data-theme="b"><a href="#">Travel & Lifestyle</a></li>
             <li data-icon="tag" data-theme="b"><a href="#">Environment</a></li>
              <li data-icon="heart" data-theme="b"><a href="#">Public Service</a></li>
               <li data-icon="clock" data-theme="b"><a href="#">Business</a></li>
                <li data-icon="calendar" data-theme="b"><a href="#">Sports</a></li>
                </ul>   
        </form> 
    </div>
</div>
   
    </div>
    <hr/>
    <div id="footer">&#169 Copyright <?php echo date("Y", time()) ?>, Sonshine Media Network International
</div>
     	</body>
	</html>
