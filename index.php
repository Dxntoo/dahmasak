<?php 
session_start();
include('inc/header.php');
?>
<title>Rating And Feedback </title>
<script src="js/rating.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php include('inc/container.php');?>
<div class="container">		
	<h2></h2>
	<?php
	include 'inc/menu.php';
	include 'class/Rating.php';
	$rating = new Rating();
	$itemList = $rating->getItemList();
	foreach($itemList as $item){
		$average = $rating->getRatingAverage($item["Recipe_ID"]);
	?>	
	<div class="row">
		<div class="col-sm-2" style="width:150px">
			<img class="product_image" src="Image/<?php echo $item["Recipe_Image"]; ?>" style="width:140px;height:180px;padding-top:10px;">
		</div>
		<div class="col-sm-4">
		<h4 style="margin-top:10px;"><?php echo $item["Recipe_Name"]; ?></h4>
		<div><span class="average"><?php printf('%.1f', $average); ?> <small>/ 5</small></span> <span class="rating-reviews"><a href="show_rating.php?item_id=<?php echo $item["Recipe_ID"]; ?>">Rating & Reviews</a></span></div>
		<?php echo $item["Descriptions"]; ?>		
		</div>		
	</div>
	<?php } ?>	
</div>	
</div>	
<?php include('inc/footer.php');?>






