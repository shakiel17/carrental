<div class="modal fade logout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Leaving so soon?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Do you wish to logout?</h4>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">No, I will stay!</button>
                <a class="btn btn-danger" href="<?=base_url();?>admin_logout">Yes, I will go!</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade manageCar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <?=form_open(base_url()."save_car");?>
            <input type="hidden" name="id" id="car_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Manage Car</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="car_description" name="description" class="form-control" rows="2" required></textarea>
                </div>                
                <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control" id="car_type" required>
                        <option value="">Select Type</option>
                        <?php
                            foreach($cartype as $item){
                                echo "<option value='$item[id]'>$item[description]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label> Fuel Type</label>
                    <select name="fuel_type" class="form-control" id="car_fuel_type" required>
                        <option value="">Select Fuel Type</option>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel">Diesel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Transmission Type</label>
                    <select name="trans_type" class="form-control" id="car_trans_type" required>
                        <option value="">Select Transmission Type</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="car_amount">
                </div>
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade manageCarType" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <?=form_open(base_url()."save_car_type");?>
            <input type="hidden" name="id" id="car_type_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Manage Car Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="car_type_description" name="description" class="form-control" rows="2" required></textarea>
                </div>                                
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade manageCarImage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <?=form_open_multipart(base_url()."save_car_image");?>
            <input type="hidden" name="id" id="car_image_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Manage Car Image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="image">Add Image</label>
                    <input type="file" name="file" class="form-control" required>
                </div>                                
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>

<div class="modal fade" id="giveReview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <?=form_open(base_url()."save_review");?>
            <input type="hidden" name="id" id="car_id">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Give Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Rating</label>
                    <input type="radio" class="form-control" name="rating" value="1"> 1
                    <input type="radio" class="form-control" name="rating" value="2"> 2
                    <input type="radio" class="form-control" name="rating" value="3"> 3
                    <input type="radio" class="form-control" name="rating" value="4"> 4
                    <input type="radio" class="form-control" name="rating" value="5"> 5
                </div>
                <div class="form-group">
                    <label>Details</label>
                    <textarea id="review_details" name="description" class="form-control" rows="2" required></textarea>
                </div>                                
            </div>
            <div class="modal-footer">                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>