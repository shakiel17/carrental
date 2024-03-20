<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login/Register <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Login/Register</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">            
        	<div class="col-md-6 block-9">
                <?=form_open(base_url()."user_authentication",array('class' => 'bg-light p-5 contact-form'));?>                
                    <div class="form-group">Sign in</div>                
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>                
                <div class="form-group">
                    <input type="submit" value="Login" class="btn btn-primary py-3 px-5">
                </div>
                <?=form_close();?>
            </div>
            <div class="col-md-6 block-9 mb-md-5">
            <?=form_open(base_url()."save_user",array('class' => 'bg-light p-5 contact-form','enctype' => 'multipart/form-data'));?>                
                <div class="form-group">Sign up</div>                
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" name="middlename" class="form-control" placeholder="Middle Name">
                </div>
                <div class="form-group">
                    <textarea name="address" cols="30" rows="3" class="form-control" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="contactno" class="form-control" placeholder="Contact Number">
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="text" name="facebook" class="form-control" placeholder="Facebook account">
                </div>
                <div class="form-group">
                    <label>Valid ID 1</label>
                    <input type="file" name="vid1" class="form-control" placeholder="Valid ID">
                </div>
                <div class="form-group">
                    <label>Valid ID 2</label>
                    <input type="file" name="vid2" class="form-control" placeholder="Valid ID">
                </div>
                <div class="form-group">
                    <label>Proof of Address</label>
                    <input type="file" name="proof_address" class="form-control" placeholder="Valid ID">
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
                </div>
                <?=form_close();?>            
            </div>
        </div>        
      </div>
    </section>