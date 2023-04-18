@extends('admin.master')

@section('title')
  User Dashboard
@endsection

@section('content')
  <div class="content-wrapper">
    @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USERS DATA TABLE</h1>
          </div>
          <div class="col-sm-6">
            <nav style="--bs-breadcrumb-divider: '>';" class="float-right" aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Main</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.card -->

          <div class="col-md-12">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
              <button type="button" class="btn btn-outline-primary waves-effect float-right">
                <a href="{{ route('admin.user.save') }}">
                  Add User
                </a>
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($users as $value)
                    <tr></tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->password }}</td>
                    @if ($value->status)
                      <td>
                        <span class="btn btn-primary">ACTIVE</span>
                      </td>
                    @else
                      <td>
                        <span class="btn btn-danger">INACTIVE</span>
                      </td>
                    @endif
                    @if ($value->is_admin)
                      <td>
                        <span class="btn btn-primary">Admin</span>
                      </td>
                    @else
                      <td>
                        <span class="btn btn-danger">User</span>
                      </td>
                    @endif
                    {{-- <td>{{ date_format(date_create($value->created_at), 'd/m/Y H:i:s') }}</td> --}}
                    <td>{{ Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ Carbon\Carbon::parse($value->updated_at)->format('d/m/Y H:i:s') }}</td>

                    {{-- <td>{{ $value->status }}</td> --}}
                    <td>
                      <a href="{{ route('admin.user.edit', [$value->id]) }}">Edit</a> |
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        DELETE
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE USER</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              ARE YOU SURE ABOUT THAT?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-danger">
                                <a href="{{ route('admin.user.delete', [$value->id]) }}">DELETE</a>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5">No data found</td>
                    </tr>
                  @endforelse
                </tbody>
                {{-- <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
                </tfoot> --}}
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
