<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Car Type Manager</h2>
                    <div style="float:right;">
                        <a href="" class="btn btn-primary btn-sm addCarType" data-toggle="modal" data-target=".manageCarType"><i class="fa fa-plus"></i> Add Car Type</a>
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
                                            <th>Description</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($cartype as $item){                                            
                                            echo "<tr>";
                                                echo "<td>$x.</td>";                                                
                                                echo "<td>$item[description]</td>";                                                                                                
                                                echo "<td><a href='#' data-toggle='modal' data-target='.manageCarType' data-id='$item[id]_$item[description]' class='btn btn-warning btn-sm editCarType'>Edit</a>";
                                                ?>
                                                <a href="<?=base_url();?>delete_car_type/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;">Delete</a>
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
    </div>
</div>