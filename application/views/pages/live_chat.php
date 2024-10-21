<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>design/assets/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Chat Support <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Chat Support</h1>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
               
    			<div class="col-md-6">
                <center><a href="<?=base_url();?>chat_bot" style="font-size:20px;">Chatbot</a></center>
    				<div class="car-wrap rounded ftco-animate">    					
    					<div class="text">   
                            <h3>Live Chat</h3>
                            <?php
                            foreach($userchat as $chat){
                                if($chat['sender']==$this->session->username){
                            ?>
    						<div class="d-flex mb-3">
	    						<span class="cat"><b><?=$this->session->fullname;?></b><br><b style="background-color:lightblue; padding:5px;border-radius:50px; color: white; font-weight:normal;"><?=$chat['message'];?></b><br><small><?=date('m/d/Y',strtotime($chat['datearray']));?>  <?=date('h:i A',strtotime($chat['timearray']));?></small></span>	    						
    						</div>
                            <?php
                                }else{
                            ?>
                            <div class="d-flex mb-3">
	    						
	    						<p class="price ml-auto"><span><b style="float:right;">Admin</b><br><b style="background-color:green; padding:10px;border-radius:50px; color: white; font-weight:normal;"><?=$chat['message'];?></b></span></p>                                
    						</div>                            
                            <?php
                                }
                            }
                            ?>                            
                            <br>
                            <?=form_open(base_url()."submit_chat_user");?>                            
                            <table width="100%" border="0">
                                <tr>
                                    <td width="80%"><input type="text" name="message" class="form-control"></td>
                                    <td width="20%"><button type="submit" class="btn btn-secondary py-2 ml-1">Submit</button></td>
                                </tr>
                            </table>
                            <?=form_close();?>
    						 </p>
    					</div>
    				</div>
    			</div>
    		</div>
            </div>
		</section>