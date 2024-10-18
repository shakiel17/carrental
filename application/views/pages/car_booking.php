<?php
$check=$this->Rental_model->db->query("SELECT * FROM booking WHERE car_id='$id' AND customer_id='".$this->session->username."' AND (`status`='pending' OR `status`='booked')");
if($check->num_rows()>0){
  $status="disabled";
  $remarks="You already have bookings for this car!";
}else{
  $status='';
  $remarks='';
}
?>
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?=base_url();?>cars">Cars</a> <i class="ion-ios-arrow-forward"></i></span> <span>Car Booking <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Book Your Car</h1>
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
      		<div class="col-md-5 col-sm-12 align-items-center">                
				<?=form_open(base_url()."book_save",array('class' => 'request-form ftco-animate bg-primary'));?>
                    <input type="hidden" name="car_id" value="<?=$id;?>">
                    <input type="hidden" name="username" value="<?=$this->session->username;?>">
                    <h2>Booking Details</h2>
                    <div class="form-group">
                        <label class="label">Date Start:</label>
                        <input type="date" name="date_start" class="form-control">                        
                    </div>
                    <div class="form-group">
                        <label class="label">Time Start:</label>
                        <input type="time" name="time_start" class="form-control">                        
                    </div>
                    <div class="form-group">
                        <label class="label">Date Return:</label>
                        <input type="date" name="date_return" class="form-control">                        
                    </div>
                    <div class="form-group">
                        <label class="label">Time Return:</label>
                        <input type="time" name="time_return" class="form-control">                        
                    </div>
                    <div class="form-group">
                        <label class="label">Destination</label>
                        <input type="text" name="destination" class="form-control">
                    </div>
                    <div class="form-group">                      
                        <label class="label">Mode of Payment</label><br>
                        <input type="radio" name="payment" value="Cash" required> <label class="label">Cash</label>&nbsp;
                        <input type="radio" name="payment" value="GCash" required> <label class="label">GCASH</label>&nbsp;
                        <!-- <input type="radio" name="payment" value="Bank" required> <label class="label">Bank Transfer</label> -->
                    </div>
                    <div class="form-group">                                              
                        <input type="submit" name="submit" class="btn btn-secondary py-3 px-4" value="Submit" <?=$status;?>>
                        <b style="color:red;"><?=$remarks;?></b>
                    </div>
                <?=form_close();?>
		    </div>
      </div>
    </section>