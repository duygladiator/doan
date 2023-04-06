@extends('admin.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.product.update') }}">
                @csrf
                <div class="card-body">
                  {{-- <div class="form-group">
                    <label for="name">ID</label>
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID">
                  </div> --}}
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                      name="name" id="name" placeholder="Name" value="{{ $product->name }}">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Price"
                      value="{{ $product->price }}">
                    @error('price')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="discount_price">Discount Price</label>
                    <input type="text" class="form-control" name="discount_price" id="discount_price"
                      placeholder="discount_price" value="{{ $product->discount_price }}">
                    @error('discount_price')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <input type="text" class="form-control" name="short_description" id="short_description"
                      placeholder="short_description" value="{{ $product->short_description }}">
                    @error('short_description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                      placeholder="description" value="{{ $product->description }}">
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity"
                      value="{{ $product->quantity }}">
                    @error('quantity')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                      value="{{ $product->password }}">
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div> --}}

                  {{-- <div class="form-group d-flex gap-4">
                    <label for="status">Status:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="status" value="1"
                        {{ $product->status ? 'checked' : '' }}>
                      <label class="form-check-label">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="status" value="0"
                        {{ !$product->status ? 'checked' : '' }}>
                      <label class="form-check-label">
                        Deactive
                      </label>
                    </div>
                  </div> --}}

                  <input type="hidden" name="id" value="{{ $product->id }}">
                  {{-- <div class="form-group">
                    <label for="password_confirmation">Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                      placeholder="Re-Enter Your Password">
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div> --}}
                  {{-- <div class="form-group">
                    <label for="price">Created_At</label>
                    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created_At">
                  </div>
                  <div class="form-group">
                    <label for="description">Updated_At</label>
                    <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated_At">
                  </div> --}}



                  {{-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> --}}
                  {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
