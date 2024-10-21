<div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url();?>design/admin/images/img.jpg" alt=""><?=$this->session->fullname;?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="#" data-toggle="modal" data-target=".logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                <?php
                  $chat=$this->Rental_model->getAllPendingAdminChat();
                ?>
                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?=count($chat);?></span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <?php
                    foreach($chat as $item){
                    ?>
                    <li class="nav-item">
                      <a class="dropdown-item" href="<?=base_url();?>live_chat_user/<?=$item['sender'];?>">
                        <span class="image"><img src="<?=base_url();?>design/admin/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?=$item['sender'];?></span>                          
                        </span>
                        <span class="message">
                          You have pending message.
                        </span>
                      </a>
                    </li>                    
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                      <div class="text-center">
                        <a href="<?=base_url();?>live_chat_admin" class="dropdown-item">
                          <strong>See All Chat</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>