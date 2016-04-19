<?php 
setlocale(LC_MONETARY, 'en_US'); 
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
  
<h1>View Cart</h1> 
<a href="index.php?page=NaturalWayCafeMenupg1.html">Back to Order Page</a> 
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM items WHERE itemid IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
                    while($row=mysql_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['itemid']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal;
			$taxrate=.07; 
			$ordertotal=$totalprice + $totalprice * $taxrate;
                    ?> 
                        <tr> 
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['itemid'] ?>]" size="5" min="1" value="<?php echo $_SESSION['cart'][$row['itemid']]['quantity'] ?>" /></td> 
                            <td>$<?php echo $row['price'] ?></td> 
                            <td>$<?php echo money_format('%i',$_SESSION['cart'][$row['itemid']]['quantity']*$row['price']) ?></td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
    </table>
	<table> 
                    <tr style=""><td style="text-align: right">Subtotal: $<?php echo money_format('%i',$totalprice) ?></td></tr> 
		    <tr style=""><td style="text-align: right">NJ Tax: $<?php echo money_format('%i',$totalprice*$taxrate) ?></td></tr>
		    <tr style=""><td style="text-align: right">Order Total: $<?php echo money_format('%i',$ordertotal) ?></td></tr>
	</table>
    <br /> 
    <button type="submit" name="submit">Update Cart</button>
    <a href= "PaymentPage.html"><button style="float: right;" type="submit" name="submit">Checkout</button></a>
</form> 
<br /> 
<p>To remove an item set its quantity to 0 </p>


