@extends('admin.master')

@section('title')
  Products List
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.card -->

          <div class="card col-md-12">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <button type="button" class="btn btn-outline-primary float-right">
                <a href="{{ route('admin.add-product') }}">
                  Add Product
                </a>
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Short Description</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    {{-- <th>Created At</th>
                    <th>Updated At</th> --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($products as $value)
                    <tr>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->price }}</td>
                      <td>{{ $value->discount_price }}</td>
                      <td>{{ $value->short_description }}</td>
                      <td>{!! $value->description !!}</td>
                      <td>{{ $value->quantity }}</td>
                      <td>
                        <img height="100" src="{{ asset('images') . '/' . $value->image_url }}" alt="">
                      </td>
                      {{-- <td>{{ $value->image_url }}</td> --}}
                      <td><a href="{{ route('admin.product.edit', [$value->id]) }}">Edit</a> |
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          DELETE
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE PRODUCT</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                ARE YOU SURE ABOUT THAT?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">
                                  <a href="{{ route('admin.product.delete', [$value->id]) }}">DELETE</a>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      </td>
                    </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
@endsection

@section('js-custom')
  <!-- DataTables -->
  <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin-assets/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('admin-assets/dist/js/demo.js') }}"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
