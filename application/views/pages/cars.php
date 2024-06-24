<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
                <?php
                foreach($cars as $item){
                ?>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(data:image/jpg;charset=utf8;base64,<?=base64_encode($item['image']);?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html"><?=$item['description'];?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?=$item['type_desc'];?></span>
	    						<p class="price ml-auto">&#8369; <?=number_format($item['amount'],0);?> <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 ml-1">Book now</a> <a href="<?=base_url();?>view_car_details/<?=$item['id'];?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>    			
                <?php
                }
                ?>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <!-- <li><a href="#">&lt;</a></li> -->
                <?php
                if($type==""){
                    $all="active";
                }else{
                    $all="";
                }
                ?>
                <li class="<?=$all;?>"><a href="<?=base_url();?>cars">All</a></li>
                <?php
                foreach($cartype as $item){
                    if($item['description'] =="PICK UP TRUCK"){
                        $desc="PCT";
                        $pct="active";
                    }elseif($item['description'] =="HATCHBACK"){
                        $desc="HTB";
                    }elseif($item['description'] =="SEDAN"){
                        $desc="SDN";
                    }else{
                        $desc=$item['description'];
                    }
                    ?>
                    <li ><a href="<?=base_url();?>view_car_type/<?=$item['id'];?>"><?=$desc;?></a></li>
                    <?php
                }
                ?>                                
                <!-- <li><a href="#">&gt;</a></li> -->
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>