
{{-- Edited Product Operations Blade View
By OnooL
Senior PHP Laravel Developer
February 26, 2023 - 2:15 PM --}}


@extends('layouts.app')
@section('title', __('lang_v1.Howto_Howto'))

<head>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<!-- Main content -->
@section('content')

    <div class="login-form col-md-12 col-xs-12 right-col-content-register">
        <!-- Start Onoo Services -->
        <div class="HomeCardOnoo card "
            style="width:100% !important;height:45px !important;min-height:unset;text-align: center;color: mintcream;font-size: 17px;">
            <label style="text-align: center;color: mintcream;font-size: 17px;">
                @lang('business.basicsetting')
            </label>
        </div>



        <div class="login-form col-md-12 col-xs-12 right-col-content-register">
          <div class="HomeCardOnoo card " style="width:100% !important;height:100% !important">

            

                <div class="col-12">
                    <form method="POST" action="{{ url('/backup-products') }}" class="text-center">
                        @csrf

                        <label>Backup Products</label>

                        <button class="btn btn-primary btn-block" disabled >Backup</button>
                    </form>
                </div>

                <div class="col-12">
                    <form method="POST" action="{{ url('/restore-products') }}" enctype="multipart/form-data"
                        class="text-center">
                        @csrf

                        <label>Restore Products</label>

                        <div class="form-group text-center">
                            <input type="file" name="sql_file">
                        </div>

                        <button class="btn btn-success btn-block" disabled>Restore</button>
                    </form>
                </div>

                <div class="col-12">
                    <form method="POST" action="{{ url('/delete-products') }}" onsubmit="return confirm('Are you sure?')"
                        class="text-center">
                        @csrf

                        <label>Delete Products</label>

                        <input type="hidden" name="confirmed" value="1">

                        <button class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>

            </div>
        </div>
      </div>
    </div>

@endsection
