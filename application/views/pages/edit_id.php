<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><a href="<?=base_url();?>user_profile">My Profile</a> <i class="ion-ios-arrow-forward"></i></span> <span>Edit ID</span></p>
            <h1 class="mb-3 bread">Edit Document</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
                    <?=form_open_multipart(base_url()."save_valid_id");?>
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="doc" value="<?=$doc;?>">
    				<div class="row">                        
                        <div class="col-3">
                            <?php
                            if($doc=="id1" || $doc=="id2"){
                                $label="Upload Valid ID";
                            }else{
                                $label="Upload Proof of Address";
                            }
                            ?>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?=$label;?></label>
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