@extends('laracms.dashboard::layouts.app')

@section('styles')

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

@endsection

@section('scripts')
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>

    <script> $(function () {
            $('textarea').froalaEditor()
        }); </script>
@endsection

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
                <a class="navbar-brand" href="#">Shops</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <form enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <h3>Info</h3>
                        <div class="form-group row">
                            <label for="blocked" class="col-md-4 col-form-label text-md-right">{{ __('form.blocked') }}</label>

                            <div class="col-md-6">
                                <input id="blocked" type="checkbox" name="blocked" value="1" @if($shop->blocked ?: old('blocked')) checked @endif autofocus>
                                <input type="text" name="blocked_reason" value="{{ $shop->blocked ? $shop->blocked->reason : old('blocked_reason') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sandbox" class="col-md-4 col-form-label text-md-right">{{ __('form.sandbox') }}</label>

                            <div class="col-md-6">
                                <input id="sandbox" type="checkbox" name="sandbox" value="1" @if($shop->sandbox ?: old('sandbox')) checked @endif autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="xml" class="col-md-4 col-form-label text-md-right">{{ __('form.xml') }}</label>
                            <div class="col-md-6 form-inline">
                                <input id="xml" type="text" class="form-control{{ $errors->has('xml') ? ' is-invalid' : '' }}" name="xml"
                                       value="{{ old('xml', $shop->xml) }}" autofocus>
                                <small>{{ __('form.xml_hint') }}</small>

                            </div>
                        </div>
                        @include('shop.partials.info')
                    </div>
                    <div class="col-md-6">
                        <h3>Delivery</h3>
                        @include('shop.partials.delivery')
                        <h3>Payment</h3>
                        @include('shop.partials.payment')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <h3>Worktime</h3>
                        @include('shop.partials.worktime')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('menu.update_shop') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="row">
                <div class="col-md-12">
                    <h3>Reviews</h3>
                    @include('partials.shop_comments')
                </div>
            </div>
        </div>
    </div>
@endsection