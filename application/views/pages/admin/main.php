<!-- page content -->
<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?=count($users);?></div>              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-file-o"></i> Total Bookings</span>
              <div class="count"><?=count($bookings);?></div>              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-car"></i> Total Cars</span>
              <div class="count"><?=count($cars);?></div>              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-car"></i> Available Cars</span>
              <div class="count"><?=count($available_cars);?></div>              
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-file-o"></i> Pending Bookings</span>
              <div class="count"><?=count($book_pending);?></div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-file"></i> Completed Bookings</span>
              <div class="count"><?=count($book_completed);?></div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->         
          <br />
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Recent Bookings</h2>
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
                                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>Unit Rented</th>
                                            <th>Date/Time Departure</th>
                                            <th>Date/Time Return</th>
                                            <th>Destination</th>
                                            <th>Status</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($recent_bookings as $item){
                                            echo "<tr>";
                                                echo "<td>$x.</td>";
                                                echo "<td>$item[lastname], $item[firstname] $item[middlename]</td>";
                                                echo "<td>$item[description]</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_started']))." ".date('h:i A',strtotime($item['time_started']))."</td>";
                                                echo "<td>".date('M-d-Y',strtotime($item['date_return']))." ".date('h:i A',strtotime($item['time_return']))."</td>";
                                                echo "<td>$item[destination]</td>";
                                                echo "<td>$item[status]</td>";
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
        <!-- /page content -->