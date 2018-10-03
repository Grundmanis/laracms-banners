@extends('laracms.dashboard::layouts.app', ['page' => 'Banners'])

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.banners.create') }}">Create</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Placement</th>
                    <th>Link</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img width="100" src="{{ asset($banner->image) }}" alt=""></td>
                    <td>{{ $banner->placement }}</td>
                    <td>@if ($banner->link)<a href="{{ $banner->link }}">{{ $banner->link }}</a>@endif</td>
                    <td>{{ $banner->created_at }}</td>
                    <td>
                        <a href="{{ route('laracms.banners.edit', $banner->id) }}">Edit</a>
                        |
                        <a onclick="return confirm('Are you sure?')"
                           href="{{ route('laracms.banners.destroy', $banner->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $banners->links() }}
    </div>
@endsection
