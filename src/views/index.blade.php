@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.banners')] )

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.banners.create') }}">{{ __('laracms::admin.create') }}</a>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('laracms::admin.menu.banners') }}</h4>
                    </div>
                    <div class="card-body">
                        @if (count($banners))
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('laracms::admin.image') }}</th>
                                        <th>{{ __('laracms::admin.placement') }}</th>
                                        <th>{{ __('laracms::admin.link') }}</th>
                                        <th>{{ __('laracms::admin.created_at') }}</th>
                                        <th>{{ __('laracms::admin.actions') }}</th>
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
                                            <td class="text-right">
                                                <a title="{{ __('laracms::admin.edit') }}"
                                                   href="{{ route('laracms.banners.edit', $banner->id) }}"
                                                   rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a title="{{ __('laracms::admin.delete') }}"
                                                   onclick="return confirmDelete('{{ route('laracms.banners.destroy', $banner->id) }}');"
                                                   href="javascript:void(0);" type="button"
                                                   rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $banners->links() }}
                            </div>
                        @else
                            <blockquote>
                                <p class="blockquote blockquote-primary">
                                    {{ __('laracms::admin.no_records') }}
                                </p>
                            </blockquote>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
