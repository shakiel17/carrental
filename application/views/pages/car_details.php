<?php
$check=$this->Rental_model->db->query("SELECT * FROM booking WHERE car_id='$id' AND customer_id='".$this->session->username."' AND (`status`='pending' OR `status`='approved')");
if($check->num_rows()>0){
  $status="disabled";
}else{
  $status='';
}
?>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?=base_url();?>cars">Cars</a> <i class="ion-ios-arrow-forward"></i></span> <span>Car Details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">View Car Details</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(data:image/jpg;charset=utf8;base64,<?=base64_encode($cars['image']);?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?=$cars['car_type'];?></span>
      					<h2><?=$cars['description'];?></h2>
						<?php
						if($cars['status']=="available"){
						?>
						<a href="<?=base_url();?>car_booking/<?=$id;?>" class="btn btn-success" <?=$status;?>>Book Now</a>
						<?php
						}else{
							echo "Car Unavailable";
						}
						?>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">      		
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span><?=$cars['trans_type'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Price
		                	<span><?=$cars['amount'];?> / day</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Status
		                	<span><?=$cars['status'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span><?=$cars['fuel_type'];?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Music</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
						    				<li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Water</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
						    				<li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
						    			</ul>
						    		</div>
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						    </div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head"><?=count($reviews);?> Reviews</h3>
                      <?php
                      if(count($reviews)>0){
                        foreach($reviews as $row){
                      ?>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left"><?=$row['fullname'];?></span>
									   				<span class="text-right"><?=date('d F Y',strtotime($row['datearray']));?></span>
									   			</h4>
									   			<p class="star">
									   				<span>
                              <?php
                              for($i=0;$i<$row['star_rate'];$i++){
                                ?>
									   					<i class="ion-ios-star"></i>
									   					<?php
                              }
                              ?>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
												<?php
												$details=str_replace('gago','g***',$row['details']);
												$details=str_replace('yawa','y***',$details);
												$details=str_replace('putang','p****',$details);
												$details=str_replace('puta','p***',$details);
												$details=str_replace('shit','s***',$details);
												$details=str_replace('fuck','f***',$details);
												?>
									   			<p><?=$details;?></p>
									   		</div>
									   	</div>								
                      <?php
                        }
                      }else{
                        echo "No reviews yet!";
                      }
                      ?>	   	
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
											   <?php
											   $check=$this->Rental_model->db->query("SELECT * FROM reviews WHERE car_id='$id' AND customer_id='".$this->session->username."'");
											   if($check->num_rows() > 0){

											   }else{
										if($this->session->user_login){
									?>
                        <div class="rating">
                          <?=form_open(base_url()."save_review");?>
						  <input type="hidden" name="id" value="<?=$id;?>">
                          <div class="form-group">
                            <label>Details</label>
                            <textarea class="form-control" name="details"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Rating</label>
                              <table width="100%" border="0" cellspacing="0">
                                <tr>
                                  <td align="center">
                                    <label class="container">1
                                      <input type="radio" name="rating" value="1" class="square-radio">
                                      <span class="checkmark"></span>
                                    </label>
                                  </td>
                                  <td align="center">
                                  <label class="container">2
                                      <input type="radio" name="rating" value="2" class="square-radio">
                                      <span class="checkmark"></span>
                                    </label>
                                  </td>
                                  <td align="center">
                                  <label class="container">3
                                      <input type="radio" name="rating" value="3" class="square-radio">
                                      <span class="checkmark"></span>
                                    </label>
                                  </td>
                                  <td align="center">
                                  <label class="container">4
                                      <input type="radio" name="rating" value="4" class="square-radio">
                                      <span class="checkmark"></span>
                                    </label>
                                  </td>
                                  <td align="center">
                                  <label class="container">5
                                      <input type="radio" name="rating" value="5" class="square-radio">
                                      <span class="checkmark"></span>
                                    </label>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
									<button type="submit" class="btn btn-primary">Submit</button>
								</td>
                                </tr>
                              </table>                              
                            </div>  
                          <?=form_close();?>
                        </div>
						<?php
										}										
										else{
											?>
											<a href="<?=base_url();?>user_login/view_car_details/<?=$id;?>" class="btn btn-primary">Login</a>
											<?php
										}
									}

									$rate5=$this->Rental_model->db->query("SELECT * FROM reviews WHERE star_rate='5' AND car_id='$id'");
									$rate4=$this->Rental_model->db->query("SELECT * FROM reviews WHERE star_rate='4' AND car_id='$id'");
									$rate3=$this->Rental_model->db->query("SELECT * FROM reviews WHERE star_rate='3' AND car_id='$id'");
									$rate2=$this->Rental_model->db->query("SELECT * FROM reviews WHERE star_rate='2' AND car_id='$id'");
									$rate1=$this->Rental_model->db->query("SELECT * FROM reviews WHERE star_rate='1' AND car_id='$id'");
									$r5=$rate5->num_rows();
									$r4=$rate4->num_rows();
									$r3=$rate3->num_rows();
									$r2=$rate2->num_rows();
									$r1=$rate1->num_rows();
									if(count($reviews) > 0){
										$per5 = ($r5/count($reviews))*100;
										$per4 = ($r4/count($reviews))*100;
										$per3 = ($r3/count($reviews))*100;
										$per2 = ($r2/count($reviews))*100;
										$per1 = ($r1/count($reviews))*100;
									}else{
										$per5 = 0;
										$per4 = 0;
										$per3 = 0;
										$per2 = 0;
										$per1 = 0;
									}																		
									?>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(<?=$per5;?>%)
								   					</span>
								   					<span><?=$r5;?> Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					
									   					(<?=$per4;?>%)
								   					</span>
								   					<span><?=$r4;?> Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					
									   					(<?=$per3;?>%)
								   					</span>
								   					<span><?=$r3;?> Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					
									   					(<?=$per2;?>%)
								   					</span>
								   					<span><?=$r2;?> Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					
									   					(<?=$per1;?>%)
								   					</span>
								   					<span><?=$r1;?> Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>