@extends('admin.layout.main')

@push('dashboard_style')
<link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush

@section('dashboard_content')
<div class="row justify-content-center">
    <div class="col-md-9 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">State</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('states.index') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="search" class="form-control mb-2" id="inlineformInput" placeholder="Search">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('states.create') }}" class="float-right btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($states as $state)
                    <tr>
                        <th scope="row">{{ $states->firstItem()+$loop->index }}</th>
                        <td>{{ $state->name }}</td>
                        <td>{{ $state->country->name }}</td>
                        <td>
                            <a href="{{ route('states.edit', $state) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <button type="button" class="btn btn-danger"
                            onclick="deleteData({{ $state->id }})"
                            >
                            <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $state->id }}" action="{{ route('states.destroy', $state) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                  {{ $states->links() }}
              </div>
            </div>
    </div>
</div>
@endsection

@push('dashboard_script')
<script src="http://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#userTable').DataTable();
} );
</script>
@endpush
