@extends('admin.layout.main')

@push('dashboard_style')
Custom Style
@endpush

@section('dashboard_content')
<div class="row justify-content-center">
    <div class="col-md-9 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="float-right btn btn-primary">Create</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Last Modified</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger"
                            onclick="event.preventDefault();
                            if(!window.confirm('Are you sure?')){
                                return;
                            }
                            document.getElementById('delete-form').submit();">
                            <i class="fas fa-trash-alt"></i>
                            </a>
                            <form id="delete-form" action="{{ route('users.destroy', $user) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
            </div>
    </div>
</div>
@endsection

@push('dashboard_script')
Custom Script
@endpush
