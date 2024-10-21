<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Live Chat User</h2>
                    <div style="float:right;">
                        
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">                    					
                                <table id="datatable-responsive"  class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>                                            
                                            <th>Sender</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($userchat as $item){  
                                            $user=$this->Rental_model->getSingleUser($item['sender']);
                                            echo "<tr>";
                                                echo "<td>$x.</td>";                                                
                                                echo "<td>$user[fullname]</td>";                                                                                                
                                                echo "<td align='center'>";
                                                ?>
                                                <a href="<?=base_url();?>live_chat_user/<?=$item['sender'];?>" class="btn btn-primary btn-sm">View Chat</a>
                                                <?php
                                                echo "</td>";
                                            echo "</tr>";
                                            $x++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                    
            </div> 

            <?php
            if($livechat <> ""){
            ?>
            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Live Chat</h2>
                    <div style="float:right;">
                        
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">                    					
                                <table border="0" cellspacing="0" width="100%" style="font-size:16px;">                                    
                                    <tbody>
                                        <?php
                                        foreach($chatuser as $item){
                                            $user=$this->Rental_model->getSingleUser($item['sender']);
                                            if($item['receiver']==$livechat){
                                                $al="right";
                                            }else{
                                                $al="left";
                                            }
                                            echo "<tr>";
                                                echo "<td colspan='2' align='$al'><b>$user[fullname]</b><br><b style='background-color:lightblue; padding:5px; border-radius:10px; color:white; font-size:15px; font-weight:normal;'>$item[message]</b><br>".date('m/d/Y',strtotime($item['datearray']))." ".date('h:i A',strtotime($item['timearray']))."</td>";                                            
                                            echo "</tr>";
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <?=form_open(base_url()."save_chat");?>
                                        <input type="hidden" name="receiver" value="<?=$livechat;?>">
                                            <td><textarea name="message" class="form-control"></textarea></td>
                                            <td width="5%"><button type="submit" class="btn btn-success"><i class="fa fa-send"></i></button></td>
                                        <?=form_close();?>
                                        <tr>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                 
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>