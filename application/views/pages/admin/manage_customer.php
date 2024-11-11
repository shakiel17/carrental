<div class="right_col" role="main">
<div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer List</h2>
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
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($items as $item){                                            
                                            echo "<tr>";
                                                echo "<td>$x.</td>";
                                                echo "<td>$item[lastname] </td>";
                                                echo "<td>$item[firstname]</td>";
                                                echo "<td>$item[middlename]</td>";                                                
                                                ?>
                                                <td align="center"><a href="<?=base_url();?>view_profile/<?=$item['username'];?>" class="btn btn-primary btn-sm">View Details</a></td>
                                                <?php
                                            echo "</tr>";
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