<?php

include "db/db.php";
include "header.php";
include "footer.php";

if(isset($_REQUEST['search_name'])){

	$search_name = $_REQUEST['search_name'];
	$result = $mysqli->query("SELECT * FROM products WHERE product_name LIKE '%$search_name%'");
	$ctotal = $result->num_rows; 
	 

}else{

	$result = $mysqli->query("SELECT * FROM products");
	$ctotal = $result->num_rows; 
}


?>

<div class="w3-container auction_background" style="background-color:white;">
	<div style="padding-top:41px;padding-bottom:41px">
		<div class="section_container">
		<div class="section_line">
			<h1 class="section_title">HOME</h1>
		</div>
	</div>

	<div class="w3-container"></div>
	
<form method="post" class="w3-row" action="index.php">
<input class="w3-input" type="text" id="search_name" name="search_name" maxlength="20" style="padding-left:3%;border: 1px solid #e5e5e5;color:#505050;float:left;width:200px;" placeholder="">
<button class="w3-button w3-round w3-hover-light-grey" style="font-size:14px;background-color:cyan;letter-spacing: 0.2px;margin-left:10px;">SEARCH</button>
</form>
<div id = "product_container" class="w3-row bidding_toppadding">
	<?php
		if($ctotal == 0){
	?>
		<div style="background-color:white;height:100vh">
		<center><h3 style="padding-top:50px;padding-bottom:50px !important;font-weight: bold;color:grey;padding-bottom: 2%; margin-left: 1%;">No item</h3></center>
		</div>
	<?php
	}

	?>


	<?php
	while ($rows = $result->fetch_assoc()) {

	?>
	
<div id ="item_container-<?php echo $rows['id']; ?>" class="w3-third" style="margin-top:1%;margin-bottom:3%"> <!-- 3 columns per row -->
	<div class="w3-container w3-white bidding_container" style="padding-top:15%;padding-bottom:15%;height:200px">
		<div style="text-align:center">
			<img class="item_pic item_hover" src="<?php echo $rows['product_image'] ?>" style="margin-bottom:5%">
		</div>

		
		<div onclick="document.location='index.php?mod=item&id=<?php echo $rows['id'] ?>';" style="cursor:pointer;border-bottom: 1px solid #e5e5e5;">
			<h3 style="font-weight:bold; color:#404040;text-align:center"> 
			<?php echo $rows['product_name'] ?></h3>
		</div>

		<!-- -->
		<div class="w3-row" style="border-bottom: 1px solid #e5e5e5;">

			<div class="w3-row" style="margin-left:15%;margin-right:15%">
			
				<div class="w3-col s6 w3-left-align">
					<h5 style="font-weight: bold; color:#a8a8a8;display:inline-block;letter-spacing:0.4px">PRICE</h5>
				</div>
				<div class="w3-col s6 w3-right-align">
					<h5 style="font-weight:bold;color:#a8a8a8;display:inline-block;">RM <?php echo $rows['product_price']; ?></h5>
				</div>
			
			</div>

			<div class="w3-row w3-right-align" style="padding-top: 1%;padding-bottom:5%;margin-right:37%">
				<div class="w3-col s6 w3-right">
				<?php if($islogin == 1){ ?>
					<button onclick="document.location='checkout.php?id=<?php echo $rows['id'] ?>';" class="w3-tiny w3-white w3-round-small buynow_button" style="outline:none;border: 1px solid #e5e5e5;padding-top:11px;padding-bottom:8px;padding-right:60px;padding-left:60px">BUY</button></br>
				<?php }else{ ?>
					<button onclick="document.location='login.php';" class="w3-tiny w3-white w3-round-small buynow_button" style="outline:none;border: 1px solid #e5e5e5;padding-top:11px;padding-bottom:8px;padding-right:60px;padding-left:60px">BUY</button></br>
				<?php } ?>
				</div>
			</div>


		</div>

</div>

</div>
<?php
	}
?>

</div>
</div>
</div>