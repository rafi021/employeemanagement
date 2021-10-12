@extends('admin.layout.main')

@push('dashboard_style')

@endpush

@section('dashboard_content')
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Country Form</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('countries.index') }}" class="float-right btn btn-secondary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('countries.update', $country) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name',$country->name) }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country_code"
                            class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>

                        <div class="col-md-6">
                            <input id="country_code" type="text"
                                class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                value="{{ old('country_code', $country->country_code) }}" required autocomplete="country_code" autofocus>

                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('dashboard_script')

@endpush
