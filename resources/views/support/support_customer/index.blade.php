@extends('layouts.app')
@section('title', ' الدعم الفني')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>الدعم الفني</h1>
    </section>

    <!-- Main content -->
    <section class="content no-print">
        <div class="row" style="">
            <div class="col-md-12">
                @component('components.filters', ['title' => __('report.filters')])
                    {!! Form::open([
                        'url' => action('ReportController@getStockReport'),
                        'method' => 'get',
                        'id' => 'sales_representative_filter_form',
                    ]) !!}
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('sr_id', __('report.user') . ':') !!}
                            {!! Form::select('sr_id', $users, null, [
                                'class' => 'form-control select2',
                                'style' => 'width:100%',
                                'placeholder' => __('report.all_users'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('sr_business_id', __('business.business_location') . ':') !!}
                            {!! Form::select('sr_business_id', $business_locations, null, [
                                'class' => 'form-control select2',
                                'style' => 'width:100%',
                            ]) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">

                            {!! Form::label('sr_date_filter', __('report.date_range') . ':') !!}
                            {!! Form::text('date_range', null, [
                                'placeholder' => __('lang_v1.select_a_date_range'),
                                'class' => 'form-control',
                                'id' => 'sr_date_filter',
                                'readonly',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('sr_status', __('business.status') . ':') !!}
                            <select name="sr_status" id="" class="select2 form-control">
                                <option value="" selected hidden>{{ __('report.all') }}</option>
                                <option value="1">محصل</option>
                                <option value="no">غير محصل</option>
                            </select>

                        </div>
                    </div>

                    {!! Form::close() !!}
                @endcomponent
            </div>
        </div>

        <div class="row nav-tabs-custom">
            <div class="col-md-12">
                <br><br>
                @php
                    $is_admin = auth()
                        ->user()
                        ->hasRole('Admin#' . session('business.id'))
                        ? true
                        : false;
                @endphp
           {{--      @if (auth()->user()->can('open_ticket') || $is_admin) --}}
                    <a href="{{ route('support_customer.create.ticket') }}" class="btn btn-primary">تذكرة جديدة <span
                            class="fa fa-plus"></span></a>
  {{--               @endif --}}
                <br><br><br>
            </div>
            <div class="col-md-12 ">
                <div class=" ">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="support_tickets" style="width: 100%;">
                            <thead>
                                <tr class="row-border blue-heading">
                                    <th>التاريخ</th>
                                    <th>العنوان</th>
                                    {{-- <th>النشاط</th> --}}
                                    <th>الحاله</th>
                                    <th>أولوية</th>
                                    <th>@lang('lang_v1.options')</th>
                                </tr>
                            </thead>

                        </table>
                        <div class="modal fade" id="Modal_" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="date" id="date" name="date" class="modal_istallment_date"
                                            value="">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>


@endsection

@section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/payment.js?v=' . $asset_v) }}"></script>
    <script></script>


@endsection
