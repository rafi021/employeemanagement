@extends('admin.layout.main')

@push('dashboard_style')

@endpush

@section('dashboard_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Roles Form</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('roles.index') }}" class="float-right btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ isset($role) ? route('roles.update', $role): route('roles.store') }}">
                    @csrf
                    @isset($role)
                    @method('PUT')
                    @endisset
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $role->name ?? old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">

                        @error('permissions')
                                <div class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </div>
                            @enderror
                        <div class="mb-1 row">

                            <div class="col-sm-2">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label class="col-form-label" for="permission-name">Permissions</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="select-all">
                                    <label class="form-check-label" for="select-all">Select All</label>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                @foreach($permissions->chunk(4) as $chunks)
                                    <div class="row">
                                        @foreach ($chunks as $permission)
                                        <div class="col mr-4 mb-2">
                                            <label class="custom-control form-check">
                                                <input type="checkbox" name="permissions[]" id="permission" @error('permissions') is-invalid @enderror
                                                value="{{ $permission->id }}"
                                                @if(isset($role))
                                                    @foreach($rolepermissions as $rPermission)
                                                    {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                                    @endforeach
                                                @endif
                                                class="form-check-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">{{ $permission->name }}</span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                @if (isset($role))
                                {{ __('Update') }}
                                @else
                                {{ __('Add New') }}
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')
<script>
    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function () {
                this.checked = false;
            });
        }
    });
</script>
@endpush
