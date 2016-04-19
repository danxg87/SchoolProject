
<?php 
require("config.php");
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
	$qty=intval($_GET['quantity']);
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM items 
                WHERE itemid={$id}"; 
            $query_s=mysql_query($sql_s); 
            if(mysql_num_rows($query_s)!=0){ 
                $row_s=mysql_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['itemid']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                  
            }else{ 
                  
                $message="This product id is invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?>
 
    <h1>Our Menu</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?>
<table>
<tr>
	    <th>Name</th> 
            <th>Price</th>
	   	 
            <th>Add to Cart</th> 
</tr>

<?php
$sql = "SELECT * FROM items ORDER BY itemid ASC";
$result = mysql_query($sql);

    while($row = mysql_fetch_array($result)) {
?>
	<tr>
		<td><?php echo $row['name'] ?></td> 
        	<td align="center">$<?php echo $row['price'] ?></td> 
        	<td align="center"><a style='color:blue;' href='index.php?page=menu&action=add&id=<?php echo $row['itemid'] ?>'>Add to cart</a></td>
	</tr>
<?php
    }
?>

</table>
