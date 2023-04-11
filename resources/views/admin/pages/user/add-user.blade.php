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
            <nav style="--bs-breadcrumb-divider: '>';" class="float-right" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
              </ol>
            </nav>
          </div>

          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> --}}
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.user.save') }}">
                @csrf
                <div class="card-body">
                  {{-- <div class="form-group">
                    <label for="name">ID</label>
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID">
                  </div> --}}
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                      name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"
                      value="{{ old('phone') }}">
                    @error('phone')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                      value="{{ old('email') }}">
                    @error('email')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="password_confirmation">Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                      placeholder="Re-Enter Your Password">
                    @error('password')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div> --}}
                  <div class="form-group d-flex gap-4">
                    <label for="status">Status:</label>
                    <div class="form-check">
                      <input class="form-check-input" value="1" type="radio" name="status" id="status">
                      <label class="form-check-label">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="0" type="radio" name="status" id="status">
                      <label class="form-check-label">
                        Deactive
                      </label>
                    </div>
                  </div>

                  <div class="form-group d-flex gap-4">
                    <label for="is_admin">Role:</label>
                    <div class="form-check">
                      <input class="form-check-input" value="0" type="radio" name="is_admin" id="is_admin">
                      <label class="form-check-label">
                        User
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="1" type="radio" name="is_admin" id="is_admin">
                      <label class="form-check-label">
                        Admin
                      </label>
                    </div>
                  </div>
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
                  <button type="submit" class="btn btn-primary">Submit</button>
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
