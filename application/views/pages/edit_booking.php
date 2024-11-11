p<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?=base_url();?>user_bookings"> My Bookings <i class="ion-ios-arrow-forward"></i></a></span> <span>Proof of Payment</p>
            <h1 class="mb-3 bread">Edit Booking Details</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
                    <?=form_open(base_url()."update_booking");?>
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="car_id" value="<?=$item['car_id'];?>">
    				<div class="row">                        
                        <div class="col-3">
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date Start</label>
                                <input type="date" name="startdate" class="form-control" value="<?=$item['date_started'];?>">
                            </div>
                            <div class="form-group">
                                <label>Time Start</label>
                                <input type="time" name="starttime" class="form-control" value="<?=date('H:i',strtotime($item['time_started']));?>">
                            </div>
                            <div class="form-group">
                                <label>Date Return</label>
                                <input type="date" name="enddate" class="form-control" value="<?=$item['date_return'];?>">
                            </div>
                            <div class="form-group">
                                <label>Time Return</label>
                                <input type="time" name="endtime" class="form-control" value="<?=date('H:i',strtotime($item['time_return']));?>">
                            </div>
                            <div class="form-group">
                                <label>Destination</label>
                                <input type="text" name="destination" class="form-control" value="<?=$item['destination'];?>">
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        </div>
                        <div class="col-3">
                            
                        </div>
					</div>
                    <?=form_close();?>
    			</div>
    		</div>
			</div>
		</section>