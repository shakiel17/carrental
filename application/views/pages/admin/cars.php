<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Car Manager</h2>
                    <div style="float:right;">
                        <a href="" class="btn btn-primary btn-sm addCar" data-toggle="modal" data-target=".manageCar"><i class="fa fa-plus"></i> Add Car</a>
                    </div>
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
                                            <th>Img</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Fuel</th>
                                            <th>Amount</th>
                                            <th>Status</th>                                            
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $x=1;
                                        foreach($cars as $item){
                                            if($item['image']==""){
                                                $image="<a href='#' data-toggle='modal' data-target='.manageCarImage' data-id='$item[id]' class='addCarImage'>Add Image</a>";
                                            }else{
                                                $image="<a href='#' data-toggle='modal' data-target='.manageCarImage' data-id='$item[id]' class='addCarImage'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($item['image'])."' width='70'></a><br><a href='".base_url()."view_car_image/$item[id]' target='_blank'>View Image</a>";
                                            }
                                            echo "<tr>";
                                                echo "<td>$x.</td>";
                                                echo "<td align='center'>$image</td>";
                                                echo "<td>$item[description]</td>";                                                
                                                echo "<td>$item[type_desc]</td>";
                                                echo "<td>$item[fuel_type]</td>";
                                                echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                                                echo "<td>$item[status]</td>";
                                                echo "<td>";
                                                ?>
                                                    <a href="#" class="btn btn-warning btn-sm editCar" data-toggle="modal" data-target=".manageCar" data-id="<?=$item['id'];?>_<?=$item['description'];?>_<?=$item['type'];?>_<?=$item['fuel_type'];?>_<?=$item['amount'];?>">Edit</a>
                                                    <a href="<?=base_url();?>delete_car/<?=$item['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;">Delete</a>
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