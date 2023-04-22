@extends('admin.master')

@section('title')
  Add Article
@endsection

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
                <h3 class="card-title">Add Article</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('admin.article.save') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}"
                      name="title" id="title" placeholder="Title" value="{{ old('title') }}">
                    @error('title')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug"
                      value="{{ old('slug') }}">
                    @error('slug')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                      placeholder="Description" value="{{ old('description') }}">
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  {{-- <div class="form-group d-flex gap-4">
                    <label for="status">Status:</label>
                    <div class="form-check">
                      <input class="form-check-input" value="1" type="radio" name="status" id="status">
                      <label class="form-check-label">
                        Show
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" value="0" type="radio" name="status" id="status">
                      <label class="form-check-label">
                        Hide
                      </label>
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

@section('js-custom')
  <script>
    $(document).ready(function() {
      $('#title').on('keyup', function() {
        let title = $(this).val();
        $.ajax({
          method: "POST",
          url: "{{ route('article.get.slug') }}",
          data: {
            "title": title,
            "_token": "{{ csrf_token() }}"
          },
          success: function(res) {
            $('#slug').val(res.title);
          },
          error: function(res) {

          }
        });
      });
    });
  </script>
  <script>
    ClassicEditor
      .create(document.querySelector('#description'))
      .catch(error => {
        console.error(error);
      });
  </script>
@endsection
