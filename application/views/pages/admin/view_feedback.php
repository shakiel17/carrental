<?php
$car=$this->Rental_model->getSingleCar($id);
?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6 col-sm-6  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?=$car['description'];?> <small>Reviews</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <!-- <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li> -->
                    <li><a class="close-link" href="<?=base_url();?>manage_cars"><i class="fa fa-arrow-left"></i> Back</a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled timeline">
                    <?php
                    if(count($items)>0){
                    foreach($items as $item){
                    ?>
                    <li>
                      <div class="block">
                        <div class="tags" align="center">
                            <i class="fa fa-star"></i>                          
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                                          <a><?=$item['fullname'];?></a>
                                      </h2>
                          <div class="byline">
                            <?=date('M d, Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?>
                          </div>
                          <?php
                          $details=str_replace('gago','g***',$item['details']);
                          $details=str_replace('yawa','y***',$details);
                          $details=str_replace('putang','p****',$details);
                          $details=str_replace('puta','p***',$details);
                          $details=str_replace('shit','s***',$details);
                          ?>
                          <p class="excerpt"><?=$details;?></a>
                          </p>
                        </div>
                      </div>
                    </li>                    
                    <?php
                    }
                }else{
                    ?>
                    <li>
                      <div class="block">
                        <p>No reviews yet.</p>
                      </div>
                    </li>
                    <?php
                }
                    ?>
                  </ul>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>