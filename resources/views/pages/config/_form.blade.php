<div class="row">
    <div class="col-md-12">
      <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Welcome Text <code>(*)</code></label>
            <input type="text" class="form-control {{ $errors->has('welcome_text') ? 'is-invalid' : '' }}" name="welcome_text" value="{{ $config->welcome_text ?? '' }}" placeholder="Enter welcome text">
            @if ($errors->has('welcome_text'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('welcome_text') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
          <label>Slogan <code>(*)</code></label>
          <input type="text" class="form-control {{ $errors->has('slogan') ? 'is-invalid' : '' }}" value="{{ $config->slogan ?? '' }}" name="slogan" />
            @if ($errors->has('slogan'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('slogan') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">About <code>(*)</code></label>
          <input type="text" class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" value="{{ $config->about ?? '' }}" placeholder="Enter about company">
            @if ($errors->has('about'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('about') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Instagram <code>(*)</code></label>
          <input type="text" class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" name="instagram" value="{{ $config->instagram ?? '' }}" placeholder="Enter instagram url">
            @if ($errors->has('instagram'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('instagram') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Facebook <code>(*)</code></label>
            <input type="text" class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" name="facebook" value="{{ $config->facebook ?? '' }}" placeholder="Enter facebook url">
            @if ($errors->has('facebook'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('facebook') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Twitter <code>(*)</code></label>
            <input type="text" class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" name="twitter" value="{{ $config->twitter ?? '' }}" placeholder="Enter twitter url">
            @if ($errors->has('twitter'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('twitter') }}</strong>
            </span>
            @endif
        </div>
       
      </div>
    </div>
  </div>