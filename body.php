
   <div class="main main-raised">
        <div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/motorcycle.jpg" alt="Los Angeles" style="width:100%;">
        
      </div>

      <div class="item">
        <img src="img/limosine2.jpg" style="width:100%;">
        
      </div>
    
      <div class="item">
        <img src="img/limosine2.jpg" alt="New York" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/motorcycle.jpg" alt="New York" style="width:100%;">
        
      </div>
      <div class="item">
        <img src="img/tyres.jpg" alt="New York" style="width:100%;">
        
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Previous</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
     


		<!-- SECTION -->
		<div class="section mainn mainn-raised">
		
		
			<!-- container -->
			<div class="container">
			
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<a href="vehicle.php?p=78"><div class="shop">
							<div class="shop-img">
								<img src="./img/CO1.jpeg" alt="">
							</div>
							<div class="shop-body">
								<h3>Vehicle<br>Collection</h3>
								<a href="vehicle.php?p=78" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<a href="vehicle.php?p=72"><div class="shop">
							<div class="shop-img">
								<img src="./img/SC1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Motorbike<br>Collection</h3>
								<a href="vehicle.php?p=72" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div></a>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<a href="vehicle.php?p=79"><div class="shop">
							<div class="shop-img">
								<img src="./img/P1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Spare parts<br>Collection</h3>
								<a href="vehicle.php?p=79" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
                            </div></a>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		  
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Vehicles & Spare Parts</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Sedan</a></li>
									<li><a data-toggle="tab" href="#tab1">Subaru</a></li>
									<li><a data-toggle="tab" href="#tab1">Honda</a></li>
									<li><a data-toggle="tab" href="#tab1">Mud Tyres</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Vehicle tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="vehicles-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="vehicles-slick" data-nav="#slick-nav-1" >
									
									<?php
                    include 'db.php';
								
                    
					$vehicle_query = "SELECT * FROM vehicles,categories WHERE vehicle_cat=cat_id AND vehicle_id BETWEEN 70 AND 75";
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
				
                        
                                
								<div class='vehicle'>
									<a href='vehicle.php?p=$vehicle_id'><div class='vehicle-img'>
										<img src='vehicle_images/$vehicle_image' style='max-height: 170px;' alt=''>
										<div class='vehicle-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='vehicle-body'>
										<p class='vehicle-category'>$cat_name</p>
										<h3 class='vehicle-name header-cart-item-name'><a href='vehicle.php?p=$vehicle_id'>$vehicle_title</a></h3>
										<h4 class='vehicle-price header-cart-item-info'>$vehicle_price<del class='vehicle-old-price'>Ksh700000.00</del></h4>
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
                               
							
                        
			";
		}
        ;
      
}
?>
										<!-- vehicle -->
										
	
										<!-- /vehicle -->
										
										
										<!-- /vehicle -->
									</div>
									<div id="slick-nav-1" class="vehicles-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Vehicles tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section mainn mainn-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>05</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>14</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>40</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 20% OFF</p>
							<a class="primary-btn cta-btn" href="store.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Tyres</a></li>
									<li><a data-toggle="tab" href="#tab2">Trucks</a></li>
									<li><a data-toggle="tab" href="#tab2">Wind Screens</a></li>
									<li><a data-toggle="tab" href="#tab2">Side Mirrors</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Vehicles tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="vehicles-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="vehicles-slick" data-nav="#slick-nav-2">
										<!-- vehicle -->
										<?php
                    include 'db.php';
								
                    
					$vehicle_query = "SELECT * FROM vehicles,categories WHERE vehicle_cat=cat_id AND vehicle_id BETWEEN 59 AND 65";
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
				
                        
                                
								<div class='vehicle'>
									<a href='vehicle.php?p=$vehicle_id'><div class='vehicle-img'>
										<img src='vehicle_images/$vehicle_image' style='max-height: 170px;' alt=''>
										<div class='vehicle-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='vehicle-body'>
										<p class='vehicle-category'>$cat_name</p>
										<h3 class='vehicle-name header-cart-item-name'><a href='vehicle.php?p=$vehicle_id'>$vehicle_title</a></h3>
										<h4 class='vehicle-price header-cart-item-info'>$vehicle_price<del class='vehicle-old-price'>$450878000.00</del></h4>
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
                               
							
                        
			";
		}
        ;
      
}
?>
										
										<!-- /vehicle -->
									</div>
									<div id="slick-nav-2" class="vehicles-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Vehicles tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="vehicles-slick-nav"></div>
							</div>
						</div>
						

						<div class="vehicles-widget-slick" data-nav="#slick-nav-3">
							<div id="get_vehicle_home">
								<!-- vehicle widget -->
								
								<!-- vehicle widget -->
							</div>

							<div id="get_vehicle_home2">
								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/SU.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">SUBARU</a></h3>
										<h4 class="vehicle-price">ksh5000000.00 <del class="vehicle-old-price">ksh55000000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/H1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">HONDA</a></h3>
										<h4 class="vehicle-price">ksh573000.00 <del class="vehicle-old-price">ksh600000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/DM1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">DUMP TRUCK</a></h3>
										<h4 class="vehicle-price">ksh2358576.00 <del class="vehicle-old-price">ksh2800000.00</del></h4>
									</div>
								</div>
								<!-- vehicle widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="vehicles-slick-nav"></div>
							</div>
						</div>

						<div class="vehicles-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/M1.jpeg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">MINIBUS</a></h3>
										<h4 class="vehicle-price">ksh3560000.00 <del class="vehicle-old-price">ksh4000000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/S1.jpeg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">SINGLE DECKER</a></h3>
										<h4 class="vehicle-price">ksh45000000.00 <del class="vehicle-old-price">ksh50000000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/SE1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">SEDAN</a></h3>
										<h4 class="vehicle-price">ksh4245100.00 <del class="vehicle-old-price">ksh4500000.00</del></h4>
									</div>
								</div>
								<!-- vehicle widget -->
							</div>

							<div>
								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/L1.png" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">LIGHT TRUCK</a></h3>
										<h4 class="vehicle-price">ksh1147410.00 <del class="vehicle-old-price">ksh1300000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/P1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">PETROL ENGINE</a></h3>
										<h4 class="vehicle-price">ksh3500980.00 <del class="vehicle-old-price">ksh3600000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/DU2.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">DUAL SPORT</a></h3>
										<h4 class="vehicle-price">ksh695200.00 <del class="vehicle-old-price">ksh700000.00</del></h4>
									</div>
								</div>
								<!-- vehicle widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs">
					    
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="vehicles-slick-nav"></div>
							</div>
						</div>

						<div class="vehicles-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/TA1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">TANK TRUCK</a></h3>
										<h4 class="vehicle-price">ksh5354000.00 <del class="vehicle-old-price">ksh5400000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/D1.jpeg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">DOUBLE-DECKER BUS</a></h3>
										<h4 class="vehicle-price">ksh7400000.00 <del class="vehicle-old-price">ksh7500000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/SC2.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">SCOOTER</a></h3>
										<h4 class="vehicle-price">ksh795000.00 <del class="vehicle-old-price">ksh800000.00</del></h4>
									</div>
								</div>
								<!-- vehicle widget -->
							</div>

							<div>
								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/DS1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">DIESEL ENGINE</a></h3>
										<h4 class="vehicle-price">ksh1234987.00 <del class="vehicle-old-price">ksh1324978.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->
								

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehiclev-img">
										<img src="./img/C1.jpeg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">COACH</a></h3>
										<h4 class="vehicle-price">ksh10000000.00 <del class="vehicle-old-price">ksh11000000.00</del></h4>
									</div>
								</div>
								<!-- /vehicle widget -->

								<!-- vehicle widget -->
								<div class="vehicle-widget">
									<div class="vehicle-img">
										<img src="./img/DM1.jpg" alt="">
									</div>
									<div class="vehicle-body">
										<p class="vehicle-category">Category</p>
										<h3 class="vehicle-name"><a href="#">DUMP TRUCK</a></h3>
										<h4 class="vehicle-price">ksh3555986.00 <del class="vehicle-old-price">ksh3600050.00</del></h4>
									</div>
								</div>
								<!-- vehicle widget -->
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
</div>
		