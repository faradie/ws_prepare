<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group margin-bottom">
            <input type="hidden" name="id_form" id="id_form"  value="">
            <label for="message-text" class="control-label mb-0">Title<code>(*)</code></label>
            <input name="title" id="title-form" type="text"
            class="form-control" placeholder="Enter product title" value="">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group margin-bottom">
            <label for="message-text" class="control-label mb-0">Price<code>(*)</code></label>
            <input name="price" id="price-form" type="text"
            class="form-control" placeholder="Enter product price" value="">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group margin-bottom">
            <label for="message-text" class="control-label mb-0">Description<code>(*)</code></label>
            <input name="description" id="description-form" type="text"
            class="form-control" placeholder="Enter product description" value="">
        </div>
    </div>
</div>

<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><input type="text" id="row1" name="details[]" placeholder="Enter detail product" class="form-control name_list" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
        </div>
</div>