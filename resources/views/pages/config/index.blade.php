@extends('layouts.app')

@section('title','Configs')

@section('content')
<div class="container">
    <div class="col-md-12">
        <!-- general form elements -->
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if(session()->has('erro_login'))
            <div class="alert alert-danger">
                {{ session()->get('erro_login') }}
            </div>
        @endif
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Config form</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('configs.update',$config->id) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            
            @include('pages.config._form')
  
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
</div>
@endsection