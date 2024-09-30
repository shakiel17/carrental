<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?=base_url();?>"><span>DOM</span> RENT A CAR</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?=$home;?>"><a href="<?=base_url();?>" class="nav-link">Home</a></li>
	          <!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>	           -->
	          <li class="nav-item <?=$car;?>"><a href="<?=base_url();?>cars" class="nav-link">Cars</a></li>
              <?php
              if($this->session->user_login){
              ?>
              <li class="nav-item <?=$booking;?>"><a href="<?=base_url();?>user_bookings" class="nav-link">My Bookings</a></li>
	          <li class="nav-item <?=$profile;?>"><a href="<?=base_url();?>user_profile" class="nav-link">Profile</a></li>
			  <li class="nav-item <?=$chatbot;?>"><a href="<?=base_url();?>chat_bot" class="nav-link">Chat Me</a></li>
              <li class="nav-item"><a href="<?=base_url();?>user_logout" class="nav-link" onclick="return confirm('Do you wish to logout?');return false;">Logout</a></li>
              <?php
              }else{
              ?>
              <li class="nav-item <?=$login;?>"><a href="<?=base_url();?>user_login/0/0" class="nav-link">Login</a></li>
              <?php  
              }
              ?>	          
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->