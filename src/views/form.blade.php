@extends('laracms.dashboard::layouts.app', ['page' => 'Banner'])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <form enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="placement" class="col-md-4 col-form-label text-md-right">{{ __('form.placement') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="placement" id="placement">
                                    <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'left') selected @endif value="left">Left</option>
                                    <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'right') selected @endif value="right">Right</option>
                                    <option @if(old('placement', isset($banner) ? $banner->placement : '') == 'bottom') selected @endif value="bottom">Bottom</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('form.link') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" id="link" type="text" name="link" value="{{ old('link', isset($banner) ? $banner->link : '') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('form.image') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" id="image" type="file" name="image">
                            </div>
                            @if(isset($banner))
                                <img width="300" src="{{ asset($banner->image) }}" alt="">
                            @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('menu.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
