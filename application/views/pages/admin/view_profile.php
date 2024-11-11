<div class="right_col" role="main">          
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile</h2>
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
                      <li><a class="close-link" href="<?=base_url();?>manage_customer"><i class="fa fa-close"></i> Back</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['valid_id_1']);?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?=$item['firstname'];?> <?=$item['lastname'];?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?=$item['address'];?>
                        </li>

                        <li>
                          <i class="fa fa-phone user-profile-icon"></i> <?=$item['contactno'];?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope user-profile-icon"></i> <?=$item['email'];?>
                        </li>
                        <li class="m-top-xs">
                          <i class="fa fa-facebook user-profile-icon"></i> <?=$item['facebook'];?>
                        </li>
                      </ul>                      
                    </div>
                    <div class="col-md-9 col-sm-9 ">                                           
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Proof of Identity</a>
                          </li>                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                            <table width="100%" border="0">
                                <tr>
                                    <td><b>Valid ID</b></td>                                    
                                    <td><b>Proof of Address</b></td>
                                </tr>
                                <tr>
                                    <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['valid_id_2']);?>"></td>                                    
                                    <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['proof_of_address']);?>"></td>
                                </tr>
                            </table>
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