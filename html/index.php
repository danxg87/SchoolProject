<?php 
    session_start(); 
    require("config.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("menu", "cart"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="menu"; 
              
        } 
          
    }else{ 
          
        $_page="menu"; 
          
    } 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
  
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <!--<link rel="stylesheet" href="css/reset.css" />--> 
    <link rel="stylesheet" href="css/style.css" /> 
      
    <title>Shopping cart</title> 

<link href= rel="stylesheet" type="javascript/css"/>
<link rel="stylesheet" type="text/css" href="../js/fullPage.js-master/jquery.fullPage.css" />
<link href="../css/NaturalWayCafe.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/jquery-1.11.1.min.js"></script>

<style>
th, td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}
th {
    font:bold;
    font-size:24px;
    background-color:#00b300;
}

tr:hover {
    background-color:#79d379;
}
</style>
<script src="../js/fullPage.js-master/vendors/jquery.easings.min.js"></script>

<script type="text/javascript" src="../js/fullPage.js-master/jquery.fullPage.js"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('#fullpage').fullpage({
         sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#000'],
         css3: true
    });
});

</script>

<script src="../js/matchmedia.js"></script>
<script src="../js/picturefill.js"></script>

<span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(min-width:1080px)"></span>
        <span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(max-width:980px)"></span>
        <span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(max-width:720px)"></span>
        <span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(max-width:620px)"></span>
        <span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(max-width:480px)"></span>
    <span data-src="../images/NaturalWaylogo.gif" width="50%" height="20%" alt="Logo" data-media="(max-width:980px)"></span>

</head>

<header>

<img src="../images/NaturalWaylogo.png" class="responsive-image" alt="Logo" width: "100%" height: "100%"/>

    </div>
	<div class="nav">
    	<ul>
        	<li><a href="index.html">Home</a></li>
         	<li><a href="#">Order</a></li>
            <li><a href="NaturalWayCafeAbout.html">About Us</a></li>
            <li><a href="NaturalWayCafeContactUs.html">Contact Us</a></li>
        </ul>
</header> 
  
<body> 

    <div id="container"> 
  
        <div id="main">

		<?php require($_page.".php"); ?>

        </div><!--end main-->
  
        <div id="sidebar">
<div id="cartfixed"> 
<h1>Cart</h1> 
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM items WHERE itemid IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysql_query($sql); 
        while($row=mysql_fetch_array($query)){ 
              
        ?> 
            <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['itemid']]['quantity'] ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a style="float: right; margin: 10px; font-size: 14px;" href="index.php?page=cart">Go to cart</a>
	<a style="float: left; margin: 10px; font-size: 14px;" href="logout.php">Empty Cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty</p>"; 
          
    } 
  
?>
	</div><!--end cartfixed-->
        </div><!--end sidebar-->
  
    </div><!--end container-->
  
</body> 
</html>
