<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM categories WHERE cat_id!=1";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>
                    <li><a href='store.php'>All Categories</a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            
            $sql = "SELECT COUNT(*) AS count_items FROM vehicles,categories WHERE vehicle_cat=cat_id";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            
            
            
			echo "
					
                    
                               <li class='categoryhome' cid='$cid'><a href='store.php'>$cat_name</a></li>
                    
			";
		}
        
		echo "</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM vehicles";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#vehicle-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getVehiclehome"])){
	$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$vehicle_query = "SELECT * FROM vehicles,categories WHERE vehicle_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$vehicle_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$vehicle_id    = $row['vehicle_id'];
			$vehicle_cat   = $row['vehicle_cat'];
			$vehicle_brand = $row['vehicle_brand'];
			$vehicle_title = $row['vehicle_title'];
			$vehicle_price = $row['vehicle_price'];
			$vehicle_image = $row['vehicle_image'];
            
            $cat_name = $row["cat_title"];
			echo "
				
                       <div class='vehicle-widget'>
                                <a href='vehicle.php?p=$vehicle_id'> 
									<div class='vehicle-img'>
										<img src='vehicle_images/$vehicle_image' alt=''>
									</div>
									<div class='vehicle-body'>
										<p class='vehicle-category'>$cat_name</p>
										<h3 class='vehicle-name'><a href='vehicle.php?p=$vehicle_id'>$vehicle_title</a></h3>
										<h4 class='vehicle-price'>$vehicle_price<del class='vehicle-old-price'>$9000000.00</del></h4>
									</div></a>
								</div>
                        
			";
		}
	}
}


if(isset($_POST["gethomeVehicle"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$vehicle_query = "SELECT * FROM vehicles,categories WHERE vehicle_cat=cat_id AND vehicle_id BETWEEN 71 AND 74";
	$run_query = mysqli_query($con,$vehicle_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$vehicle_id    = $row['vehicle_id'];
			$vehicle_cat   = $row['vehicle_cat'];
			$vehicle_brand = $row['vehicle_brand'];
			$vehicle_title = $row['vehicle_title'];
			$vehicle_price = $row['vehicle_price'];
			$vehicle_image = $row['vehicle_image'];
            
            $cat_name = $row["cat_title"];
            
			echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='vehicle.php?p=$vehicle_id'><div class='vehicle'>
									<div class='vehicle-img'>
										<img src='vehicle_images/$vehicle_image' style='max-height: 170px;' alt=''>
										<div class='vehicle-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='vehicle-body'>
										<p class='vehicle-category'>$cat_name</p>
										<h3 class='vehicle-name header-cart-item-name'><a href='vehicle.php?p=$vehicle_id'>$vehicle_title</a></h3>
										<h4 class='vehicle-price header-cart-item-info'>$vehicle_price<del class='vehicle-old-price'>$9000000.00</del></h4>
										<div class='vehicle-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='vehicle-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button vehicleid='$vehicle_id' id='vehicle' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                                </div>
							
                        
			";
		}
        ;
      
}
    
	}
    
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM vehicles,categories WHERE vehicle_cat = '$id' AND vehicle_cat=cat_id";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM vehicles,categories WHERE vehicle_cat=cat_id AND vehicle_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$vehicle_id    = $row['vehicle_id'];
			$vehicle_cat   = $row['vehicle_cat'];
			$vehicle_brand = $row['vehicle_brand'];
			$vehicle_title = $row['vehicle_title'];
			$vehicle_price = $row['vehicle_price'];
			$vehicle_image = $row['vehicle_image'];
            $cat_name = $row["cat_title"];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='vehicle.php?p=$vehicle_id'><div class='vehicle'>
									<div class='vehicle-img'>
										<img  src='vehicle_images/$vehicle_image' style='max-height: 170px;' alt=''>
										<div class='vehicle-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='vehicle-body'>
										<p class='vehicle-category'>$cat_name</p>
										<h3 class='vehicle-name header-cart-item-name'><a href='vehicle.php?p=$vehicle_id'>$vehicle_title</a></h3>
										<h4 class='vehicle-price header-cart-item-info'>$vehicle_price<del class='vehicle-old-price'>$9000000.00</del></h4>
										<div class='vehicle-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='vehicle-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button vehicleid='$vehicle_id' id='vehicle' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>";
		}
	}