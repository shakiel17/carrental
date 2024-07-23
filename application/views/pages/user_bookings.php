<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Bookings <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Booking History</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
							  	<th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th class="bg-primary heading">Destination</th>
						        <th class="bg-dark heading">Inclusive Date/s</th>
						        <th class="bg-black heading">Date & Time Booked</th>
						      </tr>
						    </thead>
						    <tbody>
                                <?php
								$x=1;
                                foreach($bookings as $item){
                                    $car=$this->Rental_model->getSingleCar($item['car_id']);
                                ?>
						      <tr class="">
								<td><?=$x;?>.</td>
						      	<td class="car-image"><div class="img" style="background-image:url(data:image/jpg;charset=utf8;base64,<?=base64_encode($car['image']);?>);"></div>
								<br>
								<?php
								if($item['payment_type']==""){
								?>
								<a href="" class="btn btn-sm btn-primary"><i class="ion-ios-card"></i> Payment</a>
								<?php
								}else{
									echo "Payment Type: ".$item['payment_type'];
								}
								?>
								</td>
						        <td class="product-name">
						        	<h3><?=$car['description'];?></h3>
						        	<p class="mb-0 rated">
						        		<span>rated:</span>
                                        <?php
                                        $review=$this->Rental_model->getSingleUserCarReview($item['car_id'],$this->session->username);
										if($review['customer_id'] != ""){
											for($x=0;$x<$review['star_rate'];$x++){
											?>                                        
											<span class="ion-ios-star"></span>
											<?php
											}
										}else{
											?>
											<a href="<?=base_url();?>view_car_details/<?=$item['car_id'];?>" class="btn btn-success btn-sm">Rate Now</a>
											<?php
										}
                                        ?>
						        	</p>
						        </td>
						        
						        <td class="price">
                                    <p class="label"><?=$item['destination'];?></p>						        	
						        </td>
						        <?php
								if($item['date_started']==$item['date_return']){
									$inc_date=date('F d, Y',strtotime($item['date_started']))."<br>".date('h:i A',strtotime($item['time_started']))." - ".date('h:i A',strtotime($item['time_return']));
								}else{
									$inc_date=date('F d, Y',strtotime($item['date_started']))." ".date('h:i A',strtotime($item['time_started']))."<br>".date('F d, Y',strtotime($item['date_return']))." ".date('h:i A',strtotime($item['time_return']));
								}
								?>
						        <td class="price">
						        	<p class="label"><?=$inc_date;?></p>
						        </td>

						        <td class="price">
						        	<p class="label"><?=date('m/d/Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></p>						        	
						        </td>
						      </tr><!-- END TR-->
                              <?php
                                }
                                ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>