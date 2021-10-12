@extends('admin.layout.main')

@push('dashboard_style')

@endpush

@section('dashboard_content')
<div id="app">
    {{-- <employee-index /> --}}
    <router-view />
</div>
@endsection

@push('dashboard_script')

@endpush
