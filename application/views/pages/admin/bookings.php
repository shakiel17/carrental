<div class="right_col" role="main">
<div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Bookings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                  if($this->session->success){
                  ?>
                  <div class="alert alert-success">
                    <?=$this->session->success;?>  
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  if($this->session->failed){
                  ?>
                  <div class="alert alert-danger">
                    <?=$this->session->failed;?>  
                  </div>
                  <?php
                  }
                  ?>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">                    					
                                <table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>Unit Rented</th>
                                            <th>Date/Time Departure</th>
                                            <th>Date/Time Return</th>
                                            <th>Destination</th>
                                            <th>Status</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($bookings as $item){
                                            $user=$this->Rental_model->getSingleUser($item['customer_id']);
                                            $car=$this->Rental_model->getSingleCar($item['car_id']);
                                            echo "<tr>";
                                                echo "<td>$x.</td>";
                                                echo "<td>$user[fullname] <small><a href='".base_url()."view_profile/$user[username]' style='color:red'>View Profile</a></small></td>";
                                                echo "<td>$car[description]</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_started']))." ".date('h:i A',strtotime($item['time_started']))."</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_return']))." ".date('h:i A',strtotime($item['time_return']))."</td>";
                                                echo "<td>$item[destination]</td>";
                                                echo "<td>$item[status]</td>";
                                                echo "<td align='center'>";
                                                if($item['proof_of_payment']==""){
                                                    echo "No Proof of Payment Yet!";
                                                }else{                                                
                                                ?>                                                
                                                <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['proof_of_payment']);?>" width="30">
                                                <br><a href="<?=base_url();?>view_pop_image/<?=$item['id'];?>"  target="_blank">View Image</a>
                                                <?php
                                                }
                                                echo "</td>";
                                                ?>
                                                <td style="font-size:20px;" align="center">
                                                    <?php
                                                    if($item['status']=="pending"){
                                                        ?>
                                                        <a href="#" class="confirmBooking" data-toggle="modal" data-target="#ConfirmBooking" data-id="<?=$item['id'];?>"><span class="badge badge-success text-white">Confirm</span></a>
                                                        <a href="<?=base_url();?>cancel_booking/<?=$item['id'];?>" onclick="return confirm('Do you wish to cancel this booking?');return false;"><span class="badge badge-danger text-white">Cancel</span></a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($item['status']=="booked"){
                                                        ?>
                                                        <a href="<?=base_url();?>manage_agreement/<?=$item['id'];?>"><span class="badge badge-warning text-white">Agreement</span></a>
                                                        <a href="<?=base_url();?>complete_booking/<?=$item['id'];?>" onclick="return confirm('Do you wish to comnplete this booking?');return false;"><span class="badge badge-info text-white">Complete</span></a>
                                                        <?php
                                                    }
                                                    ?>                                                                                                        
                                                </td>
                                                <?php
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
                                    </div>