<div id="cart">
<?php
$rate=filter_input(INPUT_POST,'rate');
$product=filter_input(INPUT_POST,'product');
$total=$rate+100;

echo "<h1>Your Cart:</h1>";
echo "<table>";
echo "<tr><th>Product</th><th>Total</th></tr>";
echo "<tr><td>$product x1</td><td>Rs.$rate</td></tr>";
echo "<tr><td>Subtotal</td><td>Rs.$rate</td></tr>";
echo "<tr><td>Delivery Charges</td><td>Rs.100</td></tr>";
echo "<tr><td>Total</td><td>Rs.$total</td></tr>";
echo "</table>";
echo "<h3>*Delivery Charge Includes GST And Taxes<h3><br>";

?>
<button onclick="paypage()">Payment</button>
</div>
<style>
body{
  background: linear-gradient(90deg,orange 0%,red); 
}
table{
  text-align: center;
  margin-left: 380px;
  margin-top: 100px;
  background-image: url(https://static.thenounproject.com/png/890991-200.png);
  background-size: cover;
  background-position: center;
    
    
}
th{
  font-size: 30px;
  padding-right: 70px;
  color: #39FF14;
}
td{
  padding: 20px;
  padding-right: 70px;
  font-size: 30px;
  font-weight: bold;
  color: white;
}
button{
  background: linear-gradient(90deg,#39FF14 0%,yellow);
  border: none;
  width: 50%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 25px;
}
h3{
  color: white;
  padding-left: 380px;
}
#shipping{
  display: none;
}
* {
  box-sizing: border-box;
}
.header,h1{ 
    padding: 1px;
    text-align: center;
    font-size: 2.1rem;
    letter-spacing: 0.5rem;
    line-height: 1.4;
    background:rgb(255, 255, 255) ;
    color: rgb(0, 0, 0);
}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],#total,#email {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background: linear-gradient(90deg,#39FF14 0%,yellow);
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: rgb(231, 90, 90)a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="shipping">
<form action="payment.php" method="post">
<div class="header">
<h2> CHECKOUT</h2></div>

<div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Ram sakthivel">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" placeholder="ram@example.com">
            <label for="adr"><i class="fa fa-mobile"></i> Mobile Number</label>
            <input type="text" id="num" name="mobile" placeholder="89855044900">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Madurai">
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="TN">
              </div>
              <div class="col-50">
                <label for="zip">PIN</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Amount</label>
            <input id="total" value="<?php echo "Rs.$total"?>" readonly>
            <input name="sproduct" value="<?php echo $product?>" readonly hidden>
            <input name="stotal" value="<?php echo $total?>" readonly hidden>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" required name="cardname" placeholder="ram sakthivel">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" required name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" required name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" required name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" required name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input name="btn" type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>
  
</div>
</form>
</div>

</body>
<script>
  var cart=document.getElementById('cart');
  var shipping=document.getElementById('shipping');

  function paypage(){
    cart.style.display="none";
    shipping.style.display="block";
  }
</script>

