<html>
<body>
<h1>Welcome to GGC Store</h1>
<form method= post action = "ActionLab7-1.php">
<table border=0>
<tr>
<td>Item</td><td>Price</td><td>Want to buy?</td><td>Quantity</td>
</tr>
<tr>
<td><img src="https://images-na.ssl-images-amazon.com/images/I/41vCoY7c2KL.jpg" width=100px height=100px></td>
<input type = hidden name = "PCImage" value = "https://images-na.ssl-images-amazon.com/images/I/41vCoY7c2KL.jpg">
<td>$399</td><input type = hidden name = "PCPrice" value = 399>
<td><input type = "checkbox" name= "PC" value = "PC"></td>
<td><input type = "number" name = "nPC" value = 1 min =0></td>
</tr>
<tr>
<td><img src="https://images-na.ssl-images-amazon.com/images/I/81ZJNQZBFCL._SL1500_.jpg" width=100px height=100px></td>
<input type = hidden name = "iPhoneImage" value = "https://images-na.ssl-images-amazon.com/images/I/81ZJNQZBFCL._SL1500_.jpg">
<td>$999</td><input type = hidden name = "iPhonePrice" value = 999>
<td><input type = "checkbox" name= "iPhone" value = "iPhone"></td>
<td><input type = "number" name = "niPhone" value = 1 min =0></td>
</tr>
<tr>
<td><img src="https://images-na.ssl-images-amazon.com/images/I/31j0uJP6G5L.jpg" width=100px height=100px></td>
<input type = hidden name = "iMacImage" value = "https://images-na.ssl-images-amazon.com/images/I/31j0uJP6G5L.jpg">
<td>$1899</td><input type = hidden name = "iMacPrice" value = 1899>
<td><input type = "checkbox" name= "iMac" value = "iMac"></td>
<td><input type = "number" name = "niMac" value = 1 min =0></td>
</tr>
<tr>
<td colspan =4><input type = "submit" name= "submit" value = "Add to cart">
</tr>
</table>
</form>
</body>
</html>
