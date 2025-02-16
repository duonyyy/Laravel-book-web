@extends('admin.layouts.default')

@section('title')
    @parent 
    Dashboard
@endsection

@push('style')
   

@section('content')
<div class="container-fluid p-4">
    
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-primary-subtle text-primary">
          <div class="card-body text-end">
            <div class="display-6 d-flex justify-content-between">
                <i class="fa-solid fa-box"></i>
            {{$countProduct}}
            </div>
            PRODUCTS
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-danger-subtle text-danger">
          <div class="card-body text-end">
            <div class="display-6 d-flex justify-content-between">
                <i class="fa-solid fa-cart-shopping"></i>
            {{$countOder}}
            </div>
          ODER
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-success-subtle text-success">
          <div class="card-body text-end">
            <div class="display-6 d-flex justify-content-between">
                <i class="fa-solid fa-list"></i>
              {{$countCategory}}
            </div>
            CATEGORIES
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-dark-subtle text-dark">
          <div class="card-body text-end">
            <div class="display-6 d-flex justify-content-between">
                <i class="fa-solid fa-users"></i>
              {{$countUser}}
            </div>
           USER
          </div>
        </div>
      </div>
    </div>
</div>    
@endsection

@push('script')
  
@endpush
