<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group margin-bottom">
            <input type="hidden" name="id_form" id="id_form"  value="">
            <label for="message-text" class="control-label mb-0">Title<code>(*)</code></label>
            <input name="title" id="title-form" type="text"
            class="form-control" placeholder="Enter blog title" value="">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group margin-bottom">
            <label for="message-text" class="control-label mb-0">Categories<code>(*)</code></label>
            <select class="select2bs4" name="categories[]" id="categories-form" multiple="multiple" data-placeholder="Select categories"
            style="width: 100%;">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group margin-bottom">
            <label for="message-text" class="control-label mb-0">Body<code>(*)</code></label>
            <textarea rows="3" name="body" id="body-form" type="text"
                      class="form-control" placeholder="Blog Content" value=""></textarea>
        </div>
    </div>
</div>
