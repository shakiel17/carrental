<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?=base_url();?>user_bookings"> My Bookings <i class="ion-ios-arrow-forward"></i></a></span> <span>Proof of Payment</p>
            <h1 class="mb-3 bread">Upload Proof of Payment</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
                    <?=form_open_multipart(base_url()."upload_pop_save");?>
                    <input type="hidden" name="id" value="<?=$id;?>">
    				<div class="row">                        
                        <div class="col-3">
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Proof of Payment</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                        </div>
                        <div class="col-3">
                            
                        </div>
					</div>
                    <?=form_close();?>
    			</div>
    		</div>
			</div>
		</section>