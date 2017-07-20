<?php

include "db/db.php";
include "header.php";
include "footer.php";

$product_id = $_REQUEST['id'];
$result = $mysqli->query("SELECT * FROM products WHERE id = '".$product_id."'");
$row_item = $result->fetch_assoc();
?>

<script>


function normal_express(){
	var price = document.getElementById("grandprice").value;
	price = price.replace(/\,/g,''); 
	fee = parseFloat(price)+10.00;
	var total = parseFloat(fee).toFixed(2);
	document.getElementById("grandtotal_price").innerHTML = total;
	document.getElementById("shipping_price").innerHTML = "10.00";
	document.getElementById("fast_express").checked = false;
	 //var total = parseInt(value + 8);
	 //alert(total);
 

}

function fast_express(){
	var price = document.getElementById("grandprice").value;
	price = price.replace(/\,/g,''); 
	fee = parseFloat(price)+15.00;
	var total = parseFloat(fee).toFixed(2);
	document.getElementById("grandtotal_price").innerHTML = total;
	document.getElementById("shipping_price").innerHTML = "15.00";
	document.getElementById("normal_express").checked = false;
} 

function submit_data(){

	var firstname = document.getElementById("first_name").value;
	var lastname = document.getElementById("last_name").value;
	var number = document.getElementById("number").value;
	var address1 = document.getElementById("address1").value;
	var address2 = document.getElementById("address2").value;
	var postcode = document.getElementById("postcode").value;
	var state = document.getElementById("state").value;
	var city = document.getElementById("city").value;
	check = 0;
	if(firstname.trim() == ""){
		document.getElementById("v_firstname").innerHTML = "Your first name is required.";
  		document.getElementById("v_firstname").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_firstname").style.visibility = "hidden";
		check = check +10;
	}

	if(lastname.trim() == ""){
		document.getElementById("v_lastname").innerHTML = "Your last name is required.";
  		document.getElementById("v_lastname").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_lastname").style.visibility = "hidden";
		check = check +10;
	}
	
 
	if(number.trim() ==""){
		document.getElementById("v_number").innerHTML = "Your contact number is required.";
  		document.getElementById("v_number").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else if(isNaN(number)){
		document.getElementById("v_number").innerHTML = "Your contact number is invalid.";
  		document.getElementById("v_number").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else if(number.trim().length >12){
		document.getElementById("v_number").innerHTML = "Your contact number is too long.";
  		document.getElementById("v_number").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

  	}else if(number.trim().length <6){
		document.getElementById("v_number").innerHTML = "Your contact number is invalid.";
  		document.getElementById("v_number").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";
  		
	}else{
		document.getElementById("v_number").style.visibility = "hidden";
		check = check + 10;
	}

	if(address1.trim() ==""){
		document.getElementById("v_address1").innerHTML = "Your address line 1 is required.";
  		document.getElementById("v_address1").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";
	}else{
		document.getElementById("v_address1").style.visibility = "hidden";
		check = check + 10;
	}

	if(address2.trim() ==""){
		document.getElementById("v_address2").innerHTML = "Your address line 2 is required.";
  		document.getElementById("v_address2").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";
	}else{
		document.getElementById("v_address2").style.visibility = "hidden";
		check = check +10;
	}

	if(city.trim() ==""){
		document.getElementById("v_city").innerHTML = "Your city is required.";
  		document.getElementById("v_city").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";
 
	}else{
		document.getElementById("v_city").style.visibility = "hidden";
		check = check +10;
	}

	if(state.trim() ==""){
		document.getElementById("v_state").innerHTML = "Your state must be selected.";
  		document.getElementById("v_state").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_state").style.visibility = "hidden";
		check = check +10;
	}

	if(postcode.trim() ==""){
		document.getElementById("v_postcode").innerHTML = "Your postcode is required.";
  		document.getElementById("v_postcode").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

  	}else if(postcode.trim().length < 5){

		document.getElementById("v_postcode").innerHTML = "Your postcode should only contain 5 numbers.";
  		document.getElementById("v_postcode").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

  	}else if(postcode.trim().length > 5){

		document.getElementById("v_postcode").innerHTML = "Your postcode should only contain 5 numbers.";
  		document.getElementById("v_postcode").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please try again.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_postcode").style.visibility = "hidden";
		check = check +10;
	}

	
	if(document.getElementById("fast_express").checked == false && document.getElementById("normal_express").checked == false){
		document.getElementById("v_shipping").innerHTML = "Please select a shipping method.";
  		document.getElementById("v_shipping").style.visibility = "visible";
  		document.getElementById("v_errormsg").innerHTML = "Please fill in all fields.";
  		document.getElementById("v_errormsg").style.visibility = "visible";

	}else{
		document.getElementById("v_shipping").style.visibility = "hidden";
		check = check +10;
	}

	if(check == 90){ 
		if(document.getElementById("normal_express").checked == true){
			var ship_option = "west";
			var shipping_price = "10.00";
			
			var price = "<?php echo $row_item['product_price']; ?>";
			price = price.replace(/\,/g,''); 
			final_price = parseFloat(price) + 10;
		}else if(document.getElementById("fast_express").checked == true){
			var ship_option = "east";
			var shipping_price = "15.00";

			var price = "<?php echo $row_item['product_price']; ?>";
			price = price.replace(/\,/g,''); 
			final_price = parseFloat(price) + 15;
		}

		window.location = "http://localhost/sellfast/successpurchase.php";

			
	}else{ 
		return false;
	}


}
</script>
 
<div class="w3-container" style="padding-top:41px;padding-bottom:41px">
		<div class="section_container">
			<div class="section_line">
			<h1 class="section_title">Checkout</h1>
			</div>
		</div>
	


<div class="w3-hide-large w3-hide-medium" style="margin-top:8%"></div>
<div class="w3-card w3-half shipping_container" style="padding-left:3%;padding-right:3%;padding-top:1%;padding-bottom:1%;">
<h4 class="section_description">Shipping Information</h4>

	<div class="w3-row" style="font-size:13px">
	<form method="post" class="w3-row">
		<input type="hidden" name="ispost" value="1">

		<div class="w3-row" style="margin-top:2%">
		<div class="w3-third w3-middle" style="font-weight:bold;letter-spacing:0.5px;">First Name</div>
		
		<div class="w3-twothird">
			<input id="first_name" class="w3-input" type="text" name="firstname" value="" maxlength="50" style="border:1px solid #e5e5e5">
			<div id="v_firstname" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>


		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">Last Name</div>
		
		<div class="w3-twothird">
			<input id="last_name" class="w3-input" type="text" name="lastname" value="" maxlength="50" style="border:1px solid #e5e5e5">
			<div id="v_lastname" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>
		

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">Contact Number</div>
		
		<div class="w3-twothird">
			<input id="number" class="w3-input" type="number" name="number" value="" style="border:1px solid #e5e5e5"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "12"> 
			<div id="v_number" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>


		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;padding-right:5%">Shipping Address Line 1</div>
		
		<div class="w3-twothird">
			<input id="address1" class="w3-input" type="text" name="home_address1"  value="" maxlength="100" style="border:1px solid #e5e5e5"> 
			<div id="v_address1" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;padding-right:5%">Shipping Address Line 2</div>
		
		<div class="w3-twothird">
			<input id="address2" class="w3-input" type="text" name="home_address2"  value="" maxlength="100" style="border:1px solid #e5e5e5"> 
			<div id="v_address2" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">City</div>
		
		<div class="w3-twothird">
			<input id="city" class="w3-input" type="text" name="city"  value="" maxlength="40" style="border:1px solid #e5e5e5"> 
			<div id="v_city" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">State</div>
		
		<div class="w3-twothird">
			<select class="w3-select" name="state" id="state" style="border: 1px solid #e5e5e5;padding-left:2%;color:#505050;">
			<option value="" disabled selected>Select a State</option>
    		<option value="Johor">Johor</option>
    		<option value="Kedah">Kedah</option>
   			<option value="Malacca">Malacca</option>
   			<option value="Negeri Sembilan">Negeri Sembilan</option>
    		<option value="Pahang">Pahang</option>
    		<option value="Penang">Penang</option>
    		<option value="Perak">Perak</option>
    		<option value="Perlis">Perlis</option>
    		<option value="Selangor">Selangor</option>
    		<option value="Terengganu">Terengganu</option>
    		<option value="Kelantan">Kelantan</option>
			<option value="Sabah">Sabah</option>
    		<option value="Sarawak">Sarawak</option>
    		</select>
			<div id="v_state" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">Country</div>
		
		<div class="w3-twothird">
			<input class="w3-input" type="text" placeholder="Malaysia" disabled style="background-color:#f5f5f5;border: 1px solid #f5f5f5;">
			<div style="height:20px"></div>
		</div>
		</div>

		<div class="w3-row">
		<div class="w3-third" style="font-weight:bold;letter-spacing:0.5px;">Post Code</div>
		
		<div class="w3-twothird">
			<input id="postcode" class="w3-input" type="number" name="postcode"  value="<?php echo $my_account_info->v8; ?>" style="border:1px solid #e5e5e5" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "5"> 
			<div id="v_postcode" style="color:#DC143C;visibility:hidden;height:20px"></div>
		</div>
		</div>
	</form>
	</div>
</div>

<div class="w3-half" style="padding-left:1%;padding-right:1%;padding-top:1%;padding-bottom:7%">
	<div style="font-size:13px">
		<div class="w3-cell-row" style="padding-left:3%;padding-right:3%">
		<div class="w3-cell w3-left-align">
		<h4  class="section_description" style="padding-bottom:0%;font-weight: bold;letter-spacing: 0.2px;color:grey;padding-top:1%;">Billing Details</h4>
		</div>
		</div>

		<div class="w3-cell-row" style="padding-left:3%;padding-right:3%">
  			<div class="w3-cell"  style="width:30%;">
    			<h6 style="font-weight:bold">Product</h6>
  			</div>
  			<div class="w3-cell w3-right-align"  style="width:70%">
    			<h6 style="color:black"><?php echo $row_item['product_name']; ?></h6>
 			</div>
		</div>


		<div class="w3-cell-row" style="margin-bottom:-1%;padding-left:3%;padding-right:3%">
  			<div class="w3-cell"  style="width:50%">
    			<h6 style="font-weight:bold;">Product Price</h6>
  			</div>
  			<div class="w3-cell w3-right-align"  style="width:50%">
    			<h6 style="color:black;">RM<?php echo $row_item['product_price']; ?></h6>
 			</div>
		</div>

		<hr>
		<div class="w3-cell-row" style="margin-top:-1%;margin-bottom:-1%;padding-left:3%;padding-right:3%">
  			<div class="w3-cell"  style="width:20%">
    			<h6 style="font-weight:bold">Shipping Method</h6>
  			</div>
  			<div class="w3-cell w3-right-align"  style="width:80%;color:black;padding-top:11px;padding-bottom:8px">
    			<span>West Malaysia (RM10.00)&nbsp; <input type="radio" id="normal_express" name="normal_express" onclick="normal_express()"></span><br><br>
				<span>East Malaysia (RM15.00)&nbsp; <input type="radio" id="fast_express" name="fast_express" onclick="fast_express()"></span>
 			</div>
		</div>
		<div class="w3-right-align" id="v_shipping" style="margin-right:3%;color:#DC143C !important;visibility:hidden;height:20px;"></div>

		<div class="w3-cell-row" style="margin-top:-1%;margin-bottom:-1%;padding-left:3%;padding-right:3%">
  			<div class="w3-cell"  style="width:50%">
    			<h6 style="font-weight:bold">Shipping Price</h6>
  			</div>
  			<div class="w3-cell w3-right-align"  style="width:50%" >
    			<div><h6 style="color:black">RM<div style="display:inline;" id="shipping_price">0.00</div></h6></div>
 			</div>
		</div>
		<div class="w3-right-align" id="v_payment" style="margin-right:3%;color:#DC143C !important;visibility:hidden;height:20px;"></div>

		<hr style="margin-top:0.7%">
		<div class="w3-cell-row" style="margin-top:-1%;padding-left:3%;padding-right:3%">
  			<div class="w3-cell"  style="width:50%">
    			<h6 style="font-weight:bold">Grand Total</h6>
  			</div>
  			<div class="w3-cell w3-right-align"  style="width:50%" >
    			<div><h6 style="font-weight: bold;color:#DAA520;">RM<div style="display:inline;" id="grandtotal_price"><?php echo $row_item['product_price']; ?></div></h6></div>
 			</div>
		</div>
		
		<div class="w3-cell-row" style="margin-top:9%;padding-left:3%;padding-right:3%">
		<button onclick="submit_data()" class="w3-button w3-hover-light-grey w3-block" style="margin-bottom:1%;background-color:cyan;padding: 10px 10px 10px 10px;font-weight:bold;font-size:13px">PROCEED TO PAYMENT</button> 

		<div id="v_errormsg" style="font-size:13px;color:#DC143C;visibility:hidden;height:20px;"></div>
		</div> 

		<input id="grandprice" type="hidden" value="<?php echo $row_item['product_price']; ?>">
	</div>

</div> 


</div>
