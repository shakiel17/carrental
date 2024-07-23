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
                                                echo "<td>$user[fullname]</td>";
                                                echo "<td>$car[description]</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_started']))." ".date('h:i A',strtotime($item['time_started']))."</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_return']))." ".date('h:i A',strtotime($item['time_return']))."</td>";
                                                echo "<td>$item[destination]</td>";
                                                echo "<td>$item[status]</td>";
                                                echo "<td>$item[proof_of_payment]</td>";
                                                echo "<td></td>";
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