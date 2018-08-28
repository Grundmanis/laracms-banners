@extends('laracms.dashboard::layouts.app')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Banners</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td><img src="{{ $banner->image }}" alt=""></td>
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
        </div>
    </div>
@endsection
