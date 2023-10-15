@extends('layouts.app')
@section('title', __('home.home'))

@section('content')

    <!-- Content Header (Page header) -->
    <section style="margin-top: 130px">

    </section>
    <!-- Main content -->
    <section class="content content-custom no-print row row-custom">
        <br>
        @if (auth()->user()->can('dashboard.data'))
            @if ($is_admin)
                @if (count($all_locations) > 1)
                    <div style="height: 90px; margin-top: 10px;" class=" button-header-40">
                        <div class="row">
                            {{--    @if (isMobile()) --}}
                            <div class="col-md-6">
                                {!! Form::select('dashboard_location', $all_locations, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => __('lang_v1.select_location'),
                                    'id' => 'dashboard_location',
                                ]) !!}
                            </div>
                            {{--     @endif --}}

                            <div class="col-md-6">

                                <button style="width: 100% !important" type="button" class="btn btn-primary"
                                    id="dashboard_date_filter">
                                    <span>
                                        <i class="fa fa-calendar"></i> {{ __('messages.filter_by_date') }}
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                @endif

                <br>

                <div class=" col-xs-12">
                    <div class="hometicker red full-width">
                        <span>اخبار براند</span>
                        <ul class="scrollLeft">
                            <li><a href="https://smartlys.online/erpdev/public/business/howto"> (اضغط هنا) ما هى خدمة الكلاود - السيرفر ؟ وكيف اختار الانسب لي؟ </a></li>
                            <li><a href="#">  (جاري تنزيل الموضوع)  ما هى مواصفات التحديث الجديد</a></li>
                            <li><a href="#">  (جاري تنزيل الموضوع)  كيف استطيع تحميل بياناتي  </a></li>
                            <li><a href="#">  (جاري تنزيل الموضوع)  جاري الاّن تنزيل الاصدار الجديد .. </a></li>
                        </ul>
                    </div>
                </div>

                {{-- 6 March 2023 9:32 AM
                 By Hedra Adel, Software Architect and Technical Lead --}}
                <div id="PriceDivDisplay">
                    <div style="height: 53px;margin-top: 10px;" class=" button-header-40">
                        {{--     <div class=" col-xs-6">
                            <div style="color: white;" class="text-center">
                                باقات السيرفرات
                            </div>
                        </div> --}}
                        <div class=" col-xs-12">

                            <div class="form-group pull-right">
                                <div class="input-group">
                                    <button style="width: 200px;" onclick="hidePrideDiv()" type="button"
                                        class="btn btn-primary" id="">
                                        اخفاء
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div style="/* background: #424141; */margin-bottom: 8px;
                     padding: 2px;border-radius: 7px;"
                        class="ag-format-container">
                        {{-- <div style="border-radius: 4px;background: white;
                    padding: 5px" class="">
                            <div class="ag-courses_item" style=" flex-basis: calc(25% - 30px);">
                                @if (!empty($wallet))
                                    <div class="col-md-4">
                                        <div style="border:solid;border-radius: 20px;" class="">
                                            <div style="background: black;color:#fff !important;border-top-right-radius: 17px;
                                    border-top-left-radius: 17px;"
                                                class="box-header text-center">
                                                <h2 style="color:#fff !important" class="box-title">
                                                    رصيد المحفظة
                                                </h2>
                                            </div>
                                            <div class="box-header text-center">


                                                <div class="box-body text-center">
                                                    @format_currency($wallet->amount)
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                                @if (!empty($wallet))
                                    <div class="col-md-4">
                                        <div style="border:solid;border-radius: 20px;" class="">
                                            <div style="background: black;color:#fff !important;border-top-right-radius: 17px;
                                    border-top-left-radius: 17px;"
                                                class="box-header text-center">
                                                <h2 style="color:#fff !important" class="box-title">
                                                    كاش باك - رصيد مجاني
                                                </h2>
                                            </div>
                                            <div class="box-header  text-center">


                                                <div class="box-body text-center">
                                                    @format_currency($wallet->free_money)
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4">
                                    <div style="border:solid;border-radius: 20px;" class="">
                                        <div style="background: black;color:#fff !important;border-top-right-radius: 17px;
                                border-top-left-radius: 17px;"
                                            class="box-header text-center">
                                            <h2 style="color:#fff !important" class="box-title">
                                                لخدمات الدعم الفني
                                            </h2>
                                        </div>
                                        <div class="box-header  text-center">
                                            <div style="padding:0" class="box-body text-center">
                                                <button
                                                    style="background-color: #202647;border-color: #0e1538bf;height: 40px;"
                                                    class="btn Btn-Brand Btn-sm  btn-block">
                                                    اضغط هنا
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                </div> --}}

                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div style="margin-top:10px" class="col-md-12">
                            <div style="border:solid;border-radius: 20px;" class="">
                                <div style="background: black;color:#fff !important;border-top-right-radius: 17px;
                                border-top-left-radius: 17px;"
                                    class="box-header text-center">
                                    <h2 style="color:#fff !important" class="box-title">
                                        باقات السيرفرات
                                    </h2>
                                </div>
                                <div class="box-header  text-center">


                                    <div style="overflow: scroll" class="box-body text-center">
                                        <div style="" class="text-center">
                                            جميع الباقات تحتوي على مميزات اضافية مثل خدمات الدعم الفني ويختلف اسعارها
                                            اليومية عن الشهرية
                                            والسنوية
                                        </div>
                                        <div class="box-body">
                                            @foreach ($serverTypes as $serverType)
                                                <div class="col-md-3">

                                                    <div style=" direction: ltr;height: 400px;width: unset;"
                                                        class="buttonBlue {{-- hvr-grow-shadow --}}">
                                                        <div style="font-weight: bold;background: #000;color:white;padding:unset !important"
                                                            class="box-header with-border text-center">
                                                            <h2 style="color:white;font-weight: bold;" class="box-title">
                                                                {{ $serverType->server_name }}</h2>

                                                        </div>
                                                        <!-- /.box-header -->
                                                        <div style="margin-top:3px;padding: unset;font-size: 12px;font-weight: 900;color:white"
                                                            class="box-body text-center">
                                                            <div style="color: white;font-size:10px">
                                                                {{ $serverType->server_speed }}
                                                            </div>
                                                            </br>
                                                            @lang('superadmin::lang.server_cpu')
                                                            <div style="color: #050506;font-size: 8px;min-height: 30px;">
                                                                {{ $serverType->server_cpu }}
                                                            </div>

                                                            @lang('superadmin::lang.server_ram')
                                                            <div style="color: #050506;margin-bottom: 6px">
                                                                {{ $serverType->server_ram }}
                                                            </div>

                                                            @lang('superadmin::lang.server_network')
                                                            <div style="color: #050506;margin-bottom: 6px">
                                                                {{ $serverType->server_network }}
                                                            </div>

                                                            @lang('superadmin::lang.server_pr_limit')
                                                            <div style="color: #050506;margin-bottom: 6px;direction: rtl;">
                                                                {{ $serverType->server_pr_limit }}
                                                            </div>

                                                            @lang('superadmin::lang.server_response_time_range')
                                                            <div style="color: #050506;direction: rtl;">
                                                                {{ $serverType->server_response_time_range }}

                                                            </div>
                                                        @php
                                                        $maxFree = 3000;
                                                        $maxOnooPlus = 100000;
                                                        $maxOnooStudio = 400000;
                                                        $maxOnooVip = 1000000;
                                                             
                                                             if ($serverType->server_name == "Free") {
                                                                $serverlimit = rand(2400, 3000);                                                               
                                                                $maxval = $maxFree;
                                                             }
                                                             elseif ($serverType->server_name == "OnooPlus") {
                                                                $serverlimit = rand(20000, 100000); 
                                                                $maxval = $maxOnooPlus;
                                                             }
                                                             elseif ($serverType->server_name == "OnooStudio") {
                                                                $serverlimit = rand(200000, 400000); 
                                                                $maxval = $maxOnooStudio;
                                                             }
                                                             else{
                                                                $serverlimit = rand(400000, 1000000); 
                                                                $maxval = $maxOnooVip;
                                                             }

                                                             $Svwidth = ($serverlimit / $maxval) * 100 ;
                                                             $ServerLimitWidth = floor($Svwidth);
                                                           
                                                        @endphp
                                                        {{--     <span style="" id="serverloader-value">{{ $sleepSeconds }}</span> --}}
                                                            <br>
                                                            <div class="serverloader">{{ $serverlimit }} from {{ $maxval }} ( {{ $ServerLimitWidth}} %)</div>

                                                            <br />
                                                       
                                                            <h3 class="box-header with-border text-center priceh3">

                               
                                                                @if ($serverType->server_price_perday != 0)
                                                                    <span class="display_currency"
                                                                        data-currency_symbol="true">
                                                                        {{ $serverType->server_price_perday }}
                                                                    </span>

                                                                    <small style="color: white">
                                                                        / @lang('superadmin::lang.perday')
                                                                    </small>
                                                                @else
                                                                    / @lang('superadmin::lang.forfree')
                                                                @endif
                                                            </h3>
                                                            <button style="bottom: 50px;position: absolute;"
                                                                class="btn Btn-Brand Btn-bx btn-info btn-block">التفاصيل
                                                            </button>

                                                        </div>
                                                        <!-- /.box-body -->

                                                    
                                                    </div>
                                                    <!-- /.box -->
                                                </div>

                                    
                                            @endforeach

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

                @component('components.widget', ['class' => 'box-primary', 'title' => __('lang_v1.Fast_Report')])
                    <div class="row row-custom">
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('home.total_sell') }}</span>
                                    <span class="info-box-number total_sell"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-green">
                                    <i class="ion ion-ios-paper-outline"></i>

                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('lang_v1.net') }}
                                        @show_tooltip(__('lang_v1.net_home_tooltip'))</span>
                                    <span class="info-box-number net"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-yellow">
                                    <i class="ion ion-ios-paper-outline"></i>
                                    <i class="fa fa-exclamation"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('home.invoice_due') }}</span>
                                    <span class="info-box-number invoice_due"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-red text-white">
                                    <i class="fas fa-exchange-alt"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('lang_v1.total_sell_return') }}</span>
                                    <span class="info-box-number total_sell_return"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row row-custom">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-cash"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('home.total_purchase') }}</span>
                                    <span class="info-box-number total_purchase"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-yellow">
                                    <i class="fa fa-dollar"></i>
                                    <i class="fa fa-exclamation"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('home.purchase_due') }}</span>
                                    <span class="info-box-number purchase_due"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-red text-white">
                                    <i class="fas fa-undo-alt"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{ __('lang_v1.total_purchase_return') }}</span>
                                    <span class="info-box-number total_purchase_return"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <!-- expense -->
                        <div class="col-md-3 col-sm-6 col-xs-12 col-custom">
                            <div class="Fast_Report_Box info-box-new-style">
                                <span class="info-box-icon bg-red">
                                    <i class="fas fa-minus-circle"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        {{ __('lang_v1.expense') }}
                                    </span>
                                    <span class="info-box-number total_expense"><i
                                            class="fas fa-sync fa-spin fa-fw margin-bottom"></i></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                    @if (!empty($widgets['after_sale_purchase_totals']))
                        @foreach ($widgets['after_sale_purchase_totals'] as $widget)
                            {!! $widget !!}
                        @endforeach
                    @endif
                @endcomponent






                @if (!empty($all_locations))
                    <!-- sales chart start -->

                    <div class="col-sm-6">

                        @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_last_30_days')])
                            {!! $sells_chart_1->container() !!}
                        @endcomponent
                    </div>

                @endif
                @if (!empty($widgets['after_sales_last_30_days']))
                    @foreach ($widgets['after_sales_last_30_days'] as $widget)
                        {!! $widget !!}
                    @endforeach
                @endif
                @if (!empty($all_locations))

                    <div class="col-sm-6">
                        @component('components.widget', ['class' => 'box-primary', 'title' => __('home.sells_current_fy')])
                            {!! $sells_chart_2->container() !!}
                        @endcomponent
                    </div>

                @endif
            @endif
            <!-- sales chart end -->
            @if (!empty($widgets['after_sales_current_fy']))
                @foreach ($widgets['after_sales_current_fy'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif
            <!-- products less than alert quntity -->

            @if (auth()->user()->can('sell.view') ||
                    auth()->user()->can('direct_sell.view'))
                <div class="col-sm-6">
                    @component('components.widget', ['class' => 'box-warning'])
                        @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                        @endslot
                        @slot('title')
                            {{ __('lang_v1.sales_payment_dues') }} @show_tooltip(__('lang_v1.tooltip_sales_payment_dues'))
                        @endslot
                        <div class="row">
                            @if (count($all_locations) > 1)
                                <div class="">
                                    {!! Form::select('sales_payment_dues_location', $all_locations, null, [
                                        'class' => 'form-control select2',
                                        'placeholder' => __('lang_v1.select_location'),
                                        'id' => 'sales_payment_dues_location',
                                    ]) !!}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" id="sales_payment_dues_table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>@lang('contact.customer')</th>
                                            <th>@lang('sale.invoice_no')</th>
                                            <th>@lang('home.due_amount')</th>
                                            <th>@lang('messages.action')</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    @endcomponent
                </div>
            @endif
            @can('purchase.view')
                <div class="col-sm-6">
                    @component('components.widget', ['class' => 'box-warning'])
                        @slot('icon')
                            <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                        @endslot
                        @slot('title')
                            {{ __('lang_v1.purchase_payment_dues') }} @show_tooltip(__('tooltip.payment_dues'))
                        @endslot
                        <div class="row">
                            @if (count($all_locations) > 1)
                                <div class="">
                                    {!! Form::select('purchase_payment_dues_location', $all_locations, null, [
                                        'class' => 'form-control select2',
                                        'placeholder' => __('lang_v1.select_location'),
                                        'id' => 'purchase_payment_dues_location',
                                    ]) !!}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped" id="purchase_payment_dues_table"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>@lang('purchase.supplier')</th>
                                            <th>@lang('purchase.ref_no')</th>
                                            <th>@lang('home.due_amount')</th>
                                            <th>@lang('messages.action')</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    @endcomponent
                </div>
            @endcan

            @can('stock_report.view')
                <div class="row">
                    <div class="@if (session('business.enable_product_expiry') != 1 &&
                            auth()->user()->can('stock_report.view')) col-sm-12 @else col-sm-6 @endif">
                        @component('components.widget', ['class' => 'box-warning'])
                            @slot('icon')
                                <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                            @endslot
                            @slot('title')
                                {{ __('home.product_stock_alert') }} @show_tooltip(__('tooltip.product_stock_alert'))
                            @endslot
                            <div class="row">
                                @if (count($all_locations) > 1)
                                    <div class="col-md-6 col-sm-6 col-md-offset-6 mb-10">
                                        {!! Form::select('stock_alert_location', $all_locations, null, [
                                            'class' => 'form-control select2',
                                            'placeholder' => __('lang_v1.select_location'),
                                            'id' => 'stock_alert_location',
                                        ]) !!}
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped" id="stock_alert_table"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>@lang('sale.product')</th>
                                                <th>@lang('business.location')</th>
                                                <th>@lang('report.current_stock')</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        @endcomponent
                    </div>
                    @if (session('business.enable_product_expiry') == 1)
                        <div class="col-sm-6">
                            @component('components.widget', ['class' => 'box-warning'])
                                @slot('icon')
                                    <i class="fa fa-exclamation-triangle text-yellow" aria-hidden="true"></i>
                                @endslot
                                @slot('title')
                                    {{ __('home.stock_expiry_alert') }} @show_tooltip( __('tooltip.stock_expiry_alert', [ 'days'
                                    =>session('business.stock_expiry_alert_days', 30) ]) )
                                @endslot
                                <input type="hidden" id="stock_expiry_alert_days"
                                    value="{{ \Carbon::now()->addDays(session('business.stock_expiry_alert_days', 30))->format('Y-m-d') }}">
                                <table class="table table-bordered table-striped" id="stock_expiry_alert_table">
                                    <thead>
                                        <tr>
                                            <th>@lang('business.product')</th>
                                            <th>@lang('business.location')</th>
                                            <th>@lang('report.stock_left')</th>
                                            <th>@lang('product.expires_in')</th>
                                        </tr>
                                    </thead>
                                </table>
                            @endcomponent
                        </div>
                    @endif
                </div>
            @endcan

            <div style="width: 100% !important">

                @if (auth()->user()->can('so.view_all') ||
                        auth()->user()->can('so.view_own'))
                    <div
                        @if (!auth()->user()->can('dashboard.data')) style="margin-top: 190px !important;width: 100% !important;" @endif>
                        <div style="width: 100% !important;" class="">
                            @component('components.widget', ['class' => 'box-warning'])
                                @slot('icon')
                                    <i class="fas fa-list-alt text-yellow fa-lg" aria-hidden="true"></i>
                                @endslot
                                @slot('title')
                                    {{ __('lang_v1.sales_order') }}
                                @endslot
                                <div class="row">
                                    @if (count($all_locations) > 1)
                                        <div class="col-md-4 col-sm-6 col-md-offset-8 mb-10">
                                            {!! Form::select('so_location', $all_locations, null, [
                                                'class' => 'form-control select2',
                                                'placeholder' => __('lang_v1.select_location'),
                                                'id' => 'so_location',
                                            ]) !!}
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped ajax_view"
                                                id="sales_order_table">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('messages.action')</th>
                                                        <th>@lang('messages.date')</th>
                                                        <th>@lang('restaurant.order_no')</th>
                                                        <th>@lang('sale.customer_name')</th>
                                                        <th>@lang('lang_v1.contact_no')</th>
                                                        <th>@lang('sale.location')</th>
                                                        <th>@lang('sale.status')</th>
                                                        <th>@lang('lang_v1.shipping_status')</th>
                                                        <th>@lang('lang_v1.quantity_remaining')</th>
                                                        <th>@lang('lang_v1.added_by')</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endcomponent
                        </div>
                    </div>
                @endif
            </div>
            <div style="width: 100% !important">
                @if (
                    !empty($common_settings['enable_purchase_order']) &&
                        (auth()->user()->can('purchase_order.view_all') ||
                            auth()->user()->can('purchase_order.view_own')))
                    <div class="row"
                        @if (!auth()->user()->can('dashboard.data')) style="margin-top: 190px !important;width: 100% !important;" @endif>
                        <div class="col-sm-12">
                            @component('components.widget', ['class' => 'box-warning'])
                                @slot('icon')
                                    <i class="fas fa-list-alt text-yellow fa-lg" aria-hidden="true"></i>
                                @endslot
                                @slot('title')
                                    @lang('lang_v1.purchase_order')
                                @endslot
                                <div class="row">
                                    @if (count($all_locations) > 1)
                                        <div class="col-md-4 col-sm-6 col-md-offset-8 mb-10">
                                            {!! Form::select('po_location', $all_locations, null, [
                                                'class' => 'form-control select2',
                                                'placeholder' => __('lang_v1.select_location'),
                                                'id' => 'po_location',
                                            ]) !!}
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped ajax_view"
                                                id="purchase_order_table" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>@lang('messages.action')</th>
                                                        <th>@lang('messages.date')</th>
                                                        <th>@lang('purchase.ref_no')</th>
                                                        <th>@lang('purchase.location')</th>
                                                        <th>@lang('purchase.supplier')</th>
                                                        <th>@lang('sale.status')</th>
                                                        <th>@lang('lang_v1.quantity_remaining')</th>
                                                        <th>@lang('lang_v1.added_by')</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endcomponent
                        </div>
                    </div>
                @endif
            </div>

            @if (auth()->user()->can('access_pending_shipments_only') ||
                    auth()->user()->can('access_shipping') ||
                    auth()->user()->can('access_own_shipping'))
                @component('components.widget', ['class' => 'box-warning'])
                    @slot('icon')
                        <i class="fas fa-list-alt text-yellow fa-lg" aria-hidden="true"></i>
                    @endslot
                    @slot('title')
                        @lang('lang_v1.pending_shipments')
                    @endslot
                    <div class="row">
                        @if (count($all_locations) > 1)
                            <div class="col-md-4 col-sm-6 col-md-offset-8 mb-10">
                                {!! Form::select('pending_shipments_location', $all_locations, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => __('lang_v1.select_location'),
                                    'id' => 'pending_shipments_location',
                                ]) !!}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped ajax_view" id="shipments_table">
                                    <thead>
                                        <tr>
                                            <th>@lang('messages.action')</th>
                                            <th>@lang('messages.date')</th>
                                            <th>@lang('sale.invoice_no')</th>
                                            <th>@lang('sale.customer_name')</th>
                                            <th>@lang('lang_v1.contact_no')</th>
                                            <th>@lang('sale.location')</th>
                                            <th>@lang('lang_v1.shipping_status')</th>
                                            @if (!empty($custom_labels['shipping']['custom_field_1']))
                                                <th>
                                                    {{ $custom_labels['shipping']['custom_field_1'] }}
                                                </th>
                                            @endif
                                            @if (!empty($custom_labels['shipping']['custom_field_2']))
                                                <th>
                                                    {{ $custom_labels['shipping']['custom_field_2'] }}
                                                </th>
                                            @endif
                                            @if (!empty($custom_labels['shipping']['custom_field_3']))
                                                <th>
                                                    {{ $custom_labels['shipping']['custom_field_3'] }}
                                                </th>
                                            @endif
                                            @if (!empty($custom_labels['shipping']['custom_field_4']))
                                                <th>
                                                    {{ $custom_labels['shipping']['custom_field_4'] }}
                                                </th>
                                            @endif
                                            @if (!empty($custom_labels['shipping']['custom_field_5']))
                                                <th>
                                                    {{ $custom_labels['shipping']['custom_field_5'] }}
                                                </th>
                                            @endif
                                            <th>@lang('sale.payment_status')</th>
                                            <th>@lang('restaurant.service_staff')</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                @endcomponent
            @endif

            @if (auth()->user()->can('account.access') && config('constants.show_payments_recovered_today') == true)
                @component('components.widget', ['class' => 'box-warning'])
                    @slot('icon')
                        <i class="fas fa-money-bill-alt text-yellow fa-lg" aria-hidden="true"></i>
                    @endslot
                    @slot('title')
                        @lang('lang_v1.payment_recovered_today')
                    @endslot
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="cash_flow_table">
                            <thead>
                                <tr>
                                    <th>@lang('messages.date')</th>
                                    <th>@lang('account.account')</th>
                                    <th>@lang('lang_v1.description')</th>
                                    <th>@lang('lang_v1.payment_method')</th>
                                    <th>@lang('lang_v1.payment_details')</th>
                                    <th>@lang('account.credit')</th>
                                    <th>@lang('lang_v1.account_balance') @show_tooltip(__('lang_v1.account_balance_tooltip'))</th>
                                    <th>@lang('lang_v1.total_balance') @show_tooltip(__('lang_v1.total_balance_tooltip'))</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="bg-gray font-17 footer-total text-center">
                                    <td colspan="5"><strong>@lang('sale.total'):</strong></td>
                                    <td class="footer_total_credit"></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endcomponent
            @endif

            @if (!empty($widgets['after_dashboard_reports']))
                @foreach ($widgets['after_dashboard_reports'] as $widget)
                    {!! $widget !!}
                @endforeach
            @endif

        @endif
        <!-- can('dashboard.data') end -->
    </section>
    <!-- /.content -->
    <div class="modal fade payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade edit_pso_status_modal" tabindex="-1" role="dialog"></div>
    <div class="modal fade edit_payment_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
@stop
@section('javascript')

    <script src="{{ asset('js/home.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
    @includeIf('sales_order.common_js')
    @includeIf('purchase_order.common_js')
    @if (!empty($all_locations))
        {!! $sells_chart_1->script() !!}
        {!! $sells_chart_2->script() !!}
    @endif
    <script type="text/javascript">
        /*  var d = document.getElementById("lastupdatediv");
                                    var b = document.getElementById("lastupdatedetails");
                                    var c = document.getElementById("lastupdateclick");


                                    d.onclick = function() {
                                        b.style.display = "unset";
                                        c.style.display = "none";

                                    }; */
        $(document).ready(function() {
            sales_order_table = $('#sales_order_table').DataTable({
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                aaSorting: [
                    [1, 'desc']
                ],
                "ajax": {
                    "url": '{{ action('SellController@index') }}?sale_type=sales_order',
                    "data": function(d) {
                        d.for_dashboard_sales_order = true;

                        if ($('#so_location').length > 0) {
                            d.location_id = $('#so_location').val();
                        }
                    }
                },
                columnDefs: [{
                    "targets": 7,
                    "orderable": false,
                    "searchable": false
                }],
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'invoice_no',
                        name: 'invoice_no'
                    },
                    {
                        data: 'conatct_name',
                        name: 'conatct_name'
                    },
                    {
                        data: 'mobile',
                        name: 'contacts.mobile'
                    },
                    {
                        data: 'business_location',
                        name: 'bl.name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'shipping_status',
                        name: 'shipping_status'
                    },
                    {
                        data: 'so_qty_remaining',
                        name: 'so_qty_remaining',
                        "searchable": false
                    },
                    {
                        data: 'added_by',
                        name: 'u.first_name'
                    },
                ]
            });

            @if (auth()->user()->can('account.access') && config('constants.show_payments_recovered_today') == true)

                // Cash Flow Table
                cash_flow_table = $('#cash_flow_table').DataTable({
                    processing: true,
                    serverSide: true,
                    "ajax": {
                        "url": "{{ action('AccountController@cashFlow') }}",
                        "data": function(d) {
                            d.type = 'credit';
                            d.only_payment_recovered = true;
                        }
                    },
                    "ordering": false,
                    "searching": false,
                    columns: [{
                            data: 'operation_date',
                            name: 'operation_date'
                        },
                        {
                            data: 'account_name',
                            name: 'account_name'
                        },
                        {
                            data: 'sub_type',
                            name: 'sub_type'
                        },
                        {
                            data: 'method',
                            name: 'TP.method'
                        },
                        {
                            data: 'payment_details',
                            name: 'payment_details',
                            searchable: false
                        },
                        {
                            data: 'credit',
                            name: 'amount'
                        },
                        {
                            data: 'balance',
                            name: 'balance'
                        },
                        {
                            data: 'total_balance',
                            name: 'total_balance'
                        },
                    ],
                    "fnDrawCallback": function(oSettings) {
                        __currency_convert_recursively($('#cash_flow_table'));
                    },
                    "footerCallback": function(row, data, start, end, display) {
                        var footer_total_credit = 0;

                        for (var r in data) {
                            footer_total_credit += $(data[r].credit).data('orig-value') ? parseFloat($(
                                data[r].credit).data('orig-value')) : 0;
                        }
                        $('.footer_total_credit').html(__currency_trans_from_en(footer_total_credit));
                    }
                });
            @endif

            $('#so_location').change(function() {
                sales_order_table.ajax.reload();
            });
            @if (!empty($common_settings['enable_purchase_order']))
                //Purchase table
                purchase_order_table = $('#purchase_order_table').DataTable({
                    processing: true,
                    serverSide: true,
                    aaSorting: [
                        [1, 'desc']
                    ],
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    ajax: {
                        url: '{{ action('PurchaseOrderController@index') }}',
                        data: function(d) {
                            d.from_dashboard = true;

                            if ($('#po_location').length > 0) {
                                d.location_id = $('#po_location').val();
                            }
                        },
                    },
                    columns: [{
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'transaction_date',
                            name: 'transaction_date'
                        },
                        {
                            data: 'ref_no',
                            name: 'ref_no'
                        },
                        {
                            data: 'location_name',
                            name: 'BS.name'
                        },
                        {
                            data: 'name',
                            name: 'contacts.name'
                        },
                        {
                            data: 'status',
                            name: 'transactions.status'
                        },
                        {
                            data: 'po_qty_remaining',
                            name: 'po_qty_remaining',
                            "searchable": false
                        },
                        {
                            data: 'added_by',
                            name: 'u.first_name'
                        }
                    ]
                })

                $('#po_location').change(function() {
                    purchase_order_table.ajax.reload();
                });
            @endif

            sell_table = $('#shipments_table').DataTable({
                processing: true,
                serverSide: true,
                aaSorting: [
                    [1, 'desc']
                ],
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                "ajax": {
                    "url": '{{ action('SellController@index') }}',
                    "data": function(d) {
                        d.only_pending_shipments = true;
                        if ($('#pending_shipments_location').length > 0) {
                            d.location_id = $('#pending_shipments_location').val();
                        }
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'transaction_date',
                        name: 'transaction_date'
                    },
                    {
                        data: 'invoice_no',
                        name: 'invoice_no'
                    },
                    {
                        data: 'conatct_name',
                        name: 'conatct_name'
                    },
                    {
                        data: 'mobile',
                        name: 'contacts.mobile'
                    },
                    {
                        data: 'business_location',
                        name: 'bl.name'
                    },
                    {
                        data: 'shipping_status',
                        name: 'shipping_status'
                    },
                    @if (!empty($custom_labels['shipping']['custom_field_1']))
                        {
                            data: 'shipping_custom_field_1',
                            name: 'shipping_custom_field_1'
                        },
                    @endif
                    @if (!empty($custom_labels['shipping']['custom_field_2']))
                        {
                            data: 'shipping_custom_field_2',
                            name: 'shipping_custom_field_2'
                        },
                    @endif
                    @if (!empty($custom_labels['shipping']['custom_field_3']))
                        {
                            data: 'shipping_custom_field_3',
                            name: 'shipping_custom_field_3'
                        },
                    @endif
                    @if (!empty($custom_labels['shipping']['custom_field_4']))
                        {
                            data: 'shipping_custom_field_4',
                            name: 'shipping_custom_field_4'
                        },
                    @endif
                    @if (!empty($custom_labels['shipping']['custom_field_5']))
                        {
                            data: 'shipping_custom_field_5',
                            name: 'shipping_custom_field_5'
                        },
                    @endif {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'waiter',
                        name: 'ss.first_name',
                        @if (empty($is_service_staff_enabled))
                            visible: false
                        @endif
                    }
                ],
                "fnDrawCallback": function(oSettings) {
                    __currency_convert_recursively($('#sell_table'));
                },
                createdRow: function(row, data, dataIndex) {
                    $(row).find('td:eq(4)').attr('class', 'clickable_td');
                }
            });

            $('#pending_shipments_location').change(function() {
                sell_table.ajax.reload();
            });
        });
    </script>
    <script>
        function hidePrideDiv() {
            // Hide div
            document.getElementById('PriceDivDisplay').style.display = 'none';

            // Save state to localStorage
            localStorage.setItem('priceDivHidden', '1');
        }

        // Check if div was previously hidden
        if (localStorage.getItem('priceDivHidden') == '1') {
            document.getElementById('PriceDivDisplay').style.display = 'none';
        } else {
            document.getElementById('PriceDivDisplay').style.display = 'block';
        }
    </script>
@endsection
