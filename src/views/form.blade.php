@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.banners')] )

@section('content')
    <form enctype="multipart/form-data" method="POST">
        @csrf

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.laracms_users') }}</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <label for="placement"
                           class="col-form-label text-md-right">{{ __('laracms::admin.placement') }}</label>
                    <select class="form-control" name="placement" id="placement">
                        <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'left') selected
                                @endif value="left">{{ __('admin.left') }}</option>
                        <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'right') selected
                                @endif value="right">{{ __('admin.right') }}</option>
                        <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'bottom') selected
                                @endif value="bottom">{{ __('admin.bottom') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="link" class="col-form-label text-md-right">{{ __('laracms::admin.link') }}</label>
                    <input class="form-control" id="link" type="text" name="link"
                           value="{{ old('link', isset($banner) ? $banner->link : '') }}">
                </div>
                <div class="form-group">
                    <label for="image" class="col-form-label text-md-right">{{ __('laracms::admin.image') }}</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            @if(isset($banner))
                                <img src="{{ asset($banner->image) }}" alt="">
                            @else
                                <img src="{{ asset('laracms_assets/img/image_placeholder.jpg') }}" alt="...">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">{{ __('laracms::admin.select_image') }}</span>
                          <span class="fileinput-exists">{{ __('laracms::admin.change') }}</span>
                          <input name="image" type="file" id="image" />
                        </span>
                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> {{ __('laracms::admin.remove') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('laracms::admin.save') }}
        </button>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('laracms_assets/demo/demo.js') }}"></script>
@endsection
