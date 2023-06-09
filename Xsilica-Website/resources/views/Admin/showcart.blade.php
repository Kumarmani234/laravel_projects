@extends('Admin.master-layout-auth')
@section('router-outlet')
<section >
    <div class="container py-2">
      
      
      <div class="card-header">
          <div class="row">
              <div class="col col-md-6"><b>Product Products</b></div>
              
              {{-- <div class="col col-md-6">
                  <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-end">Add Products</a>
              </div> --}}
          </div>
      </div>
      
  
      <div class="card-body mt-2 ">	
      @if(count($Carts) > 0)
          @foreach($Carts as $row)
      <div class="row justify-content-center mb-1 ">
        <div class="col-md-12 col-xl-10">
          <div class="card shadow-0 border rounded-3">
            <div class="card-body ">
              <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3 mb-2 mb-lg-0">
                  <div class="bg-image hover-zoom ripple rounded ripple-surface">
                  <img src="{{ asset('product_images/'.$row->image)}} "
              class="img-fluid" style="width: 250px ">
              
                    <a href="#!">  
                      <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                  <h5>{{ $row->title }}</h5>
                  <h5>{{ $row->description }}</h5>

                  <form action="{{url('addcart',$row->id )}}" method="POST" >
                    @csrf
                    <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity"><br>
                    <input class="btn btn-primary" type="submit" value="ADD CART">
                  </form>

                  <div class="d-flex flex-row">
                    <div class="text-danger mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    
                  </div>
                  <div class="mt-1 mb-0 text-muted small">
                    <span>100% Guarenty</span>
                    <span class="text-primary"> • </span>
                    <span>Duerable</span>
                    <span class="text-primary"> • </span>
                    <span>Best finish<br /></span>
                  </div>
                  <div class="mb-2 text-muted small">
                    <span>Unique design</span>
                    <span class="text-primary"> • </span>
                    <span>Fancy</span>
                    <span class="text-primary"> • </span>
                    <span>{{ $row->description }}<br /></span>
                  </div>
                  <p class="text-truncate mb-4 mb-md-0">         
                  </p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                  <div class="d-flex flex-row align-items-center mb-1">
                    <h4 class="mb-1 me-1">Currently unavailable </h4>
                    <span class="text-danger"><s>$20.99</s></span>
                  </div>
                  <h6 class="text-success">Free shipping</h6>
                   <div class="d-flex flex-column mt-4">
                    <button class="btn btn-primary btn-sm" type="button">Details</button>
                    </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
                 
  @endforeach
              @else
                  <div>
                      <p colspan="5" class="text-center">No Products Found</p>
                  </div>
              @endif
             
                </div>
  </div>
   
  </section>

@endsection
