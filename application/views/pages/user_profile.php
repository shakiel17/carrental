<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Profile <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">User Profile</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
                        <?=form_open(base_url()."update_profile");?>
                        <input type="hidden" name="oldusername" value="<?=$this->session->username;?>">
                        <input type="hidden" name="id" value="<?=$user['id'];?>">
	    				<table width="100%">
						    <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control" value="<?=$user['lastname'];?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control" value="<?=$user['firstname'];?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="middlename" class="form-control" value="<?=$user['middlename'];?>" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="3" required><?=$user['address'];?></textarea>
                                    </div>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Contact No.</label>
                                        <input type="text" name="contactno" class="form-control" value="<?=$user['contactno'];?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" name="email" class="form-control" value="<?=$user['email'];?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Facebook Account</label>
                                        <input type="text" name="facebook" class="form-control" value="<?=$user['facebook'];?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?=$user['username'];?>" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" value="" required>
                                    </div>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group">                                        
                                        <input type="submit" name="submit" class="btn btn-primary" value="Update Profile">
                                    </div>
                                </td>                                
                            </tr>
						  </table>
					</div>
                    <div class="car-list">
                        <table width="100%" border="0">
                            <tr>
                                <td cosl="3"><b>Proof of Identity/Residency</b></td>
                            </tr>
                            <tr>
                                <td><b>Valid ID 1</b> <a href="<?=base_url();?>edit_id/<?=$user['id'];?>/id1" class="btn btn-success btn-sm">Edit</a></td>
                                <td><b>Valid ID 2</b> <a href="<?=base_url();?>edit_id/<?=$user['id'];?>/id2" class="btn btn-success btn-sm">Edit</a></td>
                                <td><b>Proof of Residency</b> <a href="<?=base_url();?>edit_id/<?=$user['id'];?>/address" class="btn btn-success btn-sm">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($user['valid_id_1']);?>" width="300"></td>
                                <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($user['valid_id_2']);?>" width="300"></td>
                                <td><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($user['proof_of_address']);?>" width="300"></td>
                            </tr>
                        </table>
                    </div>
    			</div>
    		</div>
			</div>
		</section>