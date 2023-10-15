<head>
    <link rel="stylesheet" href="{{ asset('css/InvoiceLayouts.css') }}">
	<style>
		@media print{@page {size: landscape}}
	</style>
</head>

<div style="height: 100%;">
	<table  style="width:50%;min-height: 1000px;">


		<tbody>
			<tr>
				<td class="text-center" style="line-height: 15px !important; padding-bottom: 10px !important">
					@if (!empty($receipt_details->header_text))
						{!! $receipt_details->header_text !!}
					@endif

					@php
						$sub_headings = implode('<br/>', array_filter([$receipt_details->sub_heading_line1, $receipt_details->sub_heading_line2, $receipt_details->sub_heading_line3, $receipt_details->sub_heading_line4, $receipt_details->sub_heading_line5]));
					@endphp

					@if (!empty($sub_headings))
						<span>{!! $sub_headings !!}</span>
					@endif

					@if (!empty($receipt_details->invoice_heading))
						<h2 style="font-weight: bold; font-size: 35px !important; margin-top: 10px;">{!! $receipt_details->invoice_heading !!}
						</h2>
					@endif
				</td>
			</tr>
			<div style="margin-right:200px">
				@if (!empty($receipt_details->logo))
				<img style="max-height: 70px; width: 70px;" src="{{ $receipt_details->logo }}" class="img ">
			@endif
			</div>
			<!-- Logo -->

			<tr>
				<td>

					<!-- business information here -->
					<div class="row invoice-info">

						<div class="col-md-6 invoice-col width-50">

							<div class="text-right fontdroidsmall">
								@if (!empty($receipt_details->invoice_no_prefix))
									<span class="pull-left">{!! $receipt_details->invoice_no_prefix !!}</span>
								@endif
								<div class="text-center">
									{{ $receipt_details->invoice_no }}

								</div>
							</div>

							<!-- Date--> {{--  --}}
							@if (!empty($receipt_details->date_label))
								<div class="text-right fontdroidsmall ">
									<span class="pull-left">
										{{ $receipt_details->date_label }}
									</span>
									<div class="text-center">
										{{ $receipt_details->invoice_date }}
									</div>

								</div>
							@endif
							<!-- customer label--> {{--  --}}
							@if (!empty($receipt_details->customer_label))
								<div class="text-right fontdroidsmall ">
									<span class="pull-left">
										{{ $receipt_details->customer_label }}
									</span>
									<div class="text-center">
										{!! $receipt_details->customer_name !!}
									</div>
								</div>
							@endif

							<!-- customer Mobile--> {{--  --}}
							@if (!empty($receipt_details->customer_label))
								<div class="text-right fontdroidsmall ">
									<span class="pull-left">
										@lang('lang_v1.Invoice_mobile_number')
									</span>
									<div class="text-center">
										{!! $receipt_details->customer_mobile !!}
									</div>
								</div>
							@endif

							<div class="word-wrap">
								{{--  @if (!empty($receipt_details->customer_label))
									<b>{{ $receipt_details->customer_label }}</b><br />
								@endif

								<!-- customer info -->
								@if (!empty($receipt_details->customer_info))
									{!! $receipt_details->customer_info !!}
								@endif --}}
								@if (!empty($receipt_details->client_id_label))
									<br />
									<strong>{{ $receipt_details->client_id_label }}</strong>
									{{ $receipt_details->client_id }}
								@endif
								@if (!empty($receipt_details->customer_tax_label))
									<br />
									<strong>{{ $receipt_details->customer_tax_label }}</strong>
									{{ $receipt_details->customer_tax_number }}
								@endif
								@if (!empty($receipt_details->customer_custom_fields))
									<br />{!! $receipt_details->customer_custom_fields !!}
								@endif
								@if (!empty($receipt_details->sales_person_label))
									<br />
									<strong>{{ $receipt_details->sales_person_label }}</strong>
									{{ $receipt_details->sales_person }}
								@endif

								@if (!empty($receipt_details->commission_agent_label))
									<br />
									<strong>{{ $receipt_details->commission_agent_label }}</strong>
									{{ $receipt_details->commission_agent }}
								@endif

								@if (!empty($receipt_details->customer_rp_label))
									<br />
									<strong>{{ $receipt_details->customer_rp_label }}</strong>
									{{ $receipt_details->customer_total_rp }}
								@endif

								<!-- Display type of service details -->
								@if (!empty($receipt_details->types_of_service))
									<span class="pull-left text-left">
										<strong>{!! $receipt_details->types_of_service_label !!}:</strong>
										{{ $receipt_details->types_of_service }}
										<!-- Waiter info -->
										@if (!empty($receipt_details->types_of_service_custom_fields))
											<br>
											@foreach ($receipt_details->types_of_service_custom_fields as $key => $value)
												<strong>{{ $key }}: </strong> {{ $value }}@if (!$loop->last)
													,
												@endif
											@endforeach
										@endif
									</span>
								@endif
							</div>

						</div>

						<div class="col-md-6 invoice-col width-50 center-block text-center">



							<!-- Shop & Location Name  -->

							<span class="fontdroidsmall">
								@if (!empty($receipt_details->display_name))
									{{ $receipt_details->display_name }}
									<br />
								@endif

								@if (!empty($receipt_details->address))
									{!! $receipt_details->address !!}
								@endif

								@if (!empty($receipt_details->contact))
									<br />{!! $receipt_details->contact !!}
								@endif

								@if (!empty($receipt_details->website))
									<br />{{ $receipt_details->website }}
								@endif

								@if (!empty($receipt_details->tax_info1))
									<br />{{ $receipt_details->tax_label1 }} {{ $receipt_details->tax_info1 }}
								@endif

								@if (!empty($receipt_details->tax_info2))
									<br />{{ $receipt_details->tax_label2 }} {{ $receipt_details->tax_info2 }}
								@endif

								@if (!empty($receipt_details->location_custom_fields))
									<br />{{ $receipt_details->location_custom_fields }}
								@endif
							</span>


							<!-- Table information-->
							@if (!empty($receipt_details->table_label) || !empty($receipt_details->table))
								<p>
									@if (!empty($receipt_details->table_label))
										{!! $receipt_details->table_label !!}
									@endif
									{{ $receipt_details->table }}
								</p>
							@endif

							<!-- Waiter info -->
							@if (!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
								<p>
									@if (!empty($receipt_details->service_staff_label))
										{!! $receipt_details->service_staff_label !!}
									@endif
									{{ $receipt_details->service_staff }}
								</p>
							@endif



							<div class="word-wrap">

								<p class="text-right ">

									@if (!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
										@if (!empty($receipt_details->brand_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->brand_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_brand }}<br>
									@endif


									@if (!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
										@if (!empty($receipt_details->device_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->device_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_device }}<br>
									@endif

									@if (!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
										@if (!empty($receipt_details->model_no_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->model_no_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_model_no }} <br>
									@endif

									@if (!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
										@if (!empty($receipt_details->serial_no_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->serial_no_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_serial_no }}<br>
									@endif
									@if (!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
										@if (!empty($receipt_details->repair_status_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->repair_status_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_status }}<br>
									@endif

									@if (!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
										@if (!empty($receipt_details->repair_warranty_label))
											<span class="pull-left">
												<strong>{!! $receipt_details->repair_warranty_label !!}</strong>
											</span>
										@endif
										{{ $receipt_details->repair_warranty }}
										<br>
									@endif
								</p>
							</div>
						</div>
					</div>
					@if (!empty($receipt_details->shipping_custom_field_1_label) ||
						!empty($receipt_details->shipping_custom_field_2_label))
						<div class="row">
							<div class="col-xs-6">
								@if (!empty($receipt_details->shipping_custom_field_1_label))
									<strong>{!! $receipt_details->shipping_custom_field_1_label !!} :</strong> {!! $receipt_details->shipping_custom_field_1_value ?? '' !!}
								@endif
							</div>
							<div class="col-xs-6">
								@if (!empty($receipt_details->shipping_custom_field_2_label))
									<strong>{!! $receipt_details->shipping_custom_field_2_label !!}:</strong> {!! $receipt_details->shipping_custom_field_2_value ?? '' !!}
								@endif
							</div>
						</div>
					@endif
					@if (!empty($receipt_details->shipping_custom_field_3_label) ||
						!empty($receipt_details->shipping_custom_field_4_label))
						<div class="row">
							<div class="col-xs-6">
								@if (!empty($receipt_details->shipping_custom_field_3_label))
									<strong>{!! $receipt_details->shipping_custom_field_3_label !!} :</strong> {!! $receipt_details->shipping_custom_field_3_value ?? '' !!}
								@endif
							</div>
							<div class="col-xs-6">
								@if (!empty($receipt_details->shipping_custom_field_4_label))
									<strong>{!! $receipt_details->shipping_custom_field_4_label !!}:</strong> {!! $receipt_details->shipping_custom_field_4_value ?? '' !!}
								@endif
							</div>
						</div>
					@endif
					@if (!empty($receipt_details->shipping_custom_field_5_label))
						<div class="row">
							<div class="col-xs-6">
								@if (!empty($receipt_details->shipping_custom_field_5_label))
									<strong>{!! $receipt_details->shipping_custom_field_5_label !!} :</strong> {!! $receipt_details->shipping_custom_field_5_value ?? '' !!}
								@endif
							</div>
						</div>
					@endif
					@if (!empty($receipt_details->sale_orders_invoice_no) || !empty($receipt_details->sale_orders_invoice_date))
						<div class="row">
							<div class="col-xs-6">
								<strong>@lang('restaurant.order_no'):</strong> {!! $receipt_details->sale_orders_invoice_no ?? '' !!}
							</div>
							<div class="col-xs-6">
								<strong>@lang('lang_v1.order_dates'):</strong> {!! $receipt_details->sale_orders_invoice_date ?? '' !!}
							</div>
						</div>
					@endif
					<div class="row">
						@includeIf('sale_pos.receipts.partial.common_repair_invoice')
					</div>
					<div class="row  mt-5">
						<div class="col-xs-12">
							<table style="margin-bottom: 0px !important;height: 200px"
								class="table table-bordered  table-slim mb-12">
								<thead>
									<tr style="background-color: #357ca5 !important; color: black !important; font-size: 20px !important"
										class="  text-center">
										<td
											style="background-color: #357ca5 !important; color: black !important; width: 5% !important">
											#
										</td>

										{{--       @if ($receipt_details->show_cat_code == 1)
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->cat_code_label }}</td>
										@endif --}}



										@if (!empty($receipt_details->item_discount_label))
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 50% !important">
												{{ $receipt_details->table_product_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->discounted_unit_price_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->item_discount_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 5% !important;">
												{{ $receipt_details->table_qty_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->table_unit_price_label }}
											</td>
										@else
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 60% !important">
												{{ $receipt_details->table_product_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->table_qty_label }}
											</td>
											<td
												style="background-color: #357ca5 !important; color: black !important; width: 10% !important;">
												{{ $receipt_details->table_unit_price_label }}
											</td>
										@endif

										<td
											style="background-color: #357ca5 !important; color: black !important; width: 15% !important;">
											{{ $receipt_details->table_subtotal_label }}
										</td>
									</tr>
								</thead>
								<tbody>
									@php
										$subtotal = 0;
									@endphp
									@foreach ($receipt_details->lines as $line)
										<tr>
											<td class="text-center">
												{{ $loop->iteration }}
											</td>
											<td class="text-center">
												@if (!empty($line['image']))
													<img src="{{ $line['image'] }}" alt="Image" width="50"
														style="float: left; margin-right: 8px;">
												@endif
												{{ $line['name'] }} {{ $line['product_variation'] }}
												{{ $line['variation'] }}
												@if (!empty($line['sub_sku']))
													, {{ $line['sub_sku'] }}
													@endif @if (!empty($line['brand']))
														, {{ $line['brand'] }}
													@endif
													@if (!empty($line['product_custom_fields']))
														, {{ $line['product_custom_fields'] }}
													@endif
													@if (!empty($line['sell_line_note']))
														<br>
														<small>{!! $line['sell_line_note'] !!}</small>
													@endif
													@if (!empty($line['lot_number']))
														<br> {{ $line['lot_number_label'] }}: {{ $line['lot_number'] }}
													@endif
													@if (!empty($line['product_expiry']))
														, {{ $line['product_expiry_label'] }}:
														{{ $line['product_expiry'] }}
													@endif

													@if (!empty($line['warranty_name']))
														<br><small>{{ $line['warranty_name'] }} </small>
														@endif @if (!empty($line['warranty_exp_date']))
															<small>- {{ @format_date($line['warranty_exp_date']) }}
															</small>
														@endif
														@if (!empty($line['warranty_description']))
															<small> {{ $line['warranty_description'] ?? '' }}</small>
														@endif

														@if ($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1)
															<br><small>
																1 {{ $line['units'] }} =
																{{ $line['base_unit_multiplier'] }}
																{{ $line['base_unit_name'] }} <br>
																{{ $line['unit_price_inc_tax'] }} x
																{{ $line['quantity'] }} = {{ $line['line_total'] }}
															</small>
														@endif
											</td>

											{{--      @if ($receipt_details->show_cat_code == 1)
												<td>
													@if (!empty($line['cat_code']))
														{{ $line['cat_code'] }}
													@endif
												</td>
											@endif --}}

											<td class="text-center">
												{{ $line['quantity'] }} {{ $line['units'] }}

												@if ($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1)
													<br><small>
														{{ $line['quantity'] }} x {{ $line['base_unit_multiplier'] }} =
														{{ $line['orig_quantity'] }} {{ $line['base_unit_name'] }}
													</small>
												@endif
											</td>
											<td class="text-center">
												{{ $line['unit_price_before_discount'] }}
											</td>
											@if (!empty($receipt_details->discounted_unit_price_label))
												<td class="text-center">
													{{ $line['unit_price_inc_tax'] }}
												</td>
											@endif

											@if (!empty($receipt_details->item_discount_label))
												<td class="text-center">
													{{ $line['total_line_discount'] ?? '0.00' }}
													@if (!empty($line['line_discount_percent']))
														({{ $line['line_discount_percent'] }}%)
													@endif
												</td>
											@endif
											<td class="text-center">
												{{ $line['line_total_exc_tax'] }}
											</td>
										</tr>
										@if (!empty($line['modifiers']))
											@foreach ($line['modifiers'] as $modifier)
												<tr>
													<td class="text-center">
														&nbsp;
													</td>
													<td>
														{{ $modifier['name'] }} {{ $modifier['variation'] }}
														@if (!empty($modifier['sub_sku']))
															, {{ $modifier['sub_sku'] }}
														@endif
														@if (!empty($modifier['sell_line_note']))
															({!! $modifier['sell_line_note'] !!})
														@endif
													</td>

													@if ($receipt_details->show_cat_code == 1)
														<td>
															@if (!empty($modifier['cat_code']))
																{{ $modifier['cat_code'] }}
															@endif
														</td>
													@endif

													<td class="text-right">
														{{ $modifier['quantity'] }} {{ $modifier['units'] }}
													</td>
													<td class="text-right">
														{{ $modifier['unit_price_exc_tax'] }}
													</td>
													@if (!empty($receipt_details->discounted_unit_price_label))
														<td class="text-right">{{ $modifier['unit_price_exc_tax'] }}</td>
													@endif
													@if (!empty($receipt_details->item_discount_label))
														<td class="text-right">0.00</td>
													@endif
													<td class="text-right">
														{{ $modifier['line_total'] }}
													</td>
												</tr>
											@endforeach
										@endif
									@endforeach

								{{--     @php
										$lines = count($receipt_details->lines);
									@endphp

									@for ($i = $lines; $i < 7; $i++)
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											@if (!empty($receipt_details->discounted_unit_price_label))
												<td></td>
											@endif
											@if (!empty($receipt_details->item_discount_label))
												<td></td>
											@endif
											<td>&nbsp;</td>
										</tr>
									@endfor --}}

								</tbody>
							</table>

						</div>
					</div>


					<div class="row invoice-info " style="page-break-inside: avoid !important">
						<div class="col-md-6 invoice-col width-50 ">
							<table class="table table-slim">

							</table>

						</div>

						<div class="col-md-6 invoice-col width-50">
							<table class="table-no-side-cell-border table-no-top-cell-border width-100 table-slim">
								<tbody>
									<!-- Total --> {{-- قيمة الفاتورة --}}
							<div style="margin-bottom: 10px;color:black;width:100% !important" class=" text-left fontdroid padding-5">
								<span style="color:black !important;" class="pull-left ">
									{!! $receipt_details->subtotal_label !!}
								</span>
								<div style="color:black !important;" class="text-right fontdroid">
									{{ $receipt_details->subtotal_exc_tax }}
								</div>
							</div>
									@if (!empty($receipt_details->total_quantity_label))
										<tr style="color:black !important;" >
											<td style="width:50%;color:black !important;">
												{!! $receipt_details->total_quantity_label !!}
											</td>
											<td style="color:black !important;" class="text-right">
												{{ $receipt_details->total_quantity }}
											</td>
										</tr>
									@endif
									@if (!empty($receipt_details->total_items_label))
										<tr>
											<td style="width:50%;color:black !important;">
												{!! $receipt_details->total_items_label !!}
											</td>
											<td style="color:black !important;" class="text-right">
												{{ $receipt_details->total_items }}
											</td>
										</tr>
									@endif

									<!-- Shipping Charges -->
									@if (!empty($receipt_details->shipping_charges))
										<tr>
											<td style="width:50%;color:black !important;">
												{!! $receipt_details->shipping_charges_label !!}
											</td>
											<td style="color:black !important;" class="text-right">
												{{ $receipt_details->shipping_charges }}
											</td>
										</tr>
									@endif

									@if (!empty($receipt_details->packing_charge))
										<tr>
											<td style="width:50%;color:black !important;">
												{!! $receipt_details->packing_charge_label !!}
											</td>
											<td style="color:black !important;" class="text-right">
												{{ $receipt_details->packing_charge }}
											</td>
										</tr>
									@endif

									<!-- Tax -->
									@if (!empty($receipt_details->taxes))
										@foreach ($receipt_details->taxes as $k => $v)
											<tr>
												<td>{{ $k }}</td>
												<td class="text-right">(+) {{ $v }}</td>
											</tr>
										@endforeach
									@endif



									@if (!empty($receipt_details->additional_expenses))
										@foreach ($receipt_details->additional_expenses as $key => $val)
											<tr>
												<td>
													{{ $key }}:
												</td>

												<td class="text-right">
													(+)
													{{ $val }}
												</td>
											</tr>
										@endforeach
									@endif

									@if (!empty($receipt_details->reward_point_label))
										<tr>
											<td>
												{!! $receipt_details->reward_point_label !!}
											</td>

											<td class="text-right">
												(-) {{ $receipt_details->reward_point_amount }}
											</td>
										</tr>
									@endif

									@if (!empty($receipt_details->group_tax_details))
										@foreach ($receipt_details->group_tax_details as $key => $value)
											<tr>
												<td>
													{!! $key !!}
												</td>
												<td class="text-right">
													(+)
													{{ $value }}
												</td>
											</tr>
										@endforeach
									@else
										@if (!empty($receipt_details->tax))
											<tr>
												<td>
													{!! $receipt_details->tax_label !!}
												</td>
												<td class="text-right">
													(+) {{ $receipt_details->tax }}
												</td>
											</tr>
										@endif
									@endif

									@if ($receipt_details->round_off_amount > 0)
										<tr>
											<td>
												{!! $receipt_details->round_off_label !!}
											</td>
											<td class="text-right">
												{{ $receipt_details->round_off }}
											</td>
										</tr>
									@endif



									<!-- Discount --> {{-- الخصم --}}
									@if (!empty($receipt_details->discount))
										<div style="color:black !important;" class=" text-right fontdroid padding-5">
											<span style="color:black !important;" class="pull-left ">
												{!! $receipt_details->discount_label !!}
											</span>
											(-) {{ $receipt_details->discount }}
										</div>
									@endif
									<!-- Sub total --> {{--   الاجمالى المستحق --}}

									<div style="color:black !important;" class=" text-right fontdroid padding-5">
										<span style="color:black !important;" class="pull-left ">
											{!! $receipt_details->total_label !!}
										</span>

										{{ $receipt_details->total }}

									</div>
									@if (!empty($receipt_details->payments))
									@foreach ($receipt_details->payments as $payment)
										<tr>
											<div style="color:black !important;" class=" text-left fontdroid padding-5">
												<span style="color:black !important;" class="pull-left ">
													@lang('lang_v1.Invoice_paymentmethod'):
												</span>


												<div style="color:black !important;" colspan="2" class="text-right fontdroid">
													{{ $payment['method'] }}
												</div>
											</div>


											<!-- Total Paid--> {{-- المدفوع --}}
											@if (!empty($receipt_details->total_paid))
												<div style="color:black !important;" class=" text-right fontdroid padding-5">
													<span style="color:black !important;" class="pull-left ">
														{!! $receipt_details->total_paid_label !!}
													</span>
													{{ $receipt_details->total_paid }}
												</div>
											@endif
											<!-- Total Due--> {{-- المستحق --}}
											@if (!empty($receipt_details->total_due) && !empty($receipt_details->total_due_label))
												<div style="color:black !important;" class=" text-right fontdroid padding-5">
													<span style="color:black !important;" class="pull-left ">
														{!! $receipt_details->total_due_label !!}
													</span>
													{{ $receipt_details->total_due }}
												</div>
											@endif



										</tr>
									@endforeach
								@endif

									@if (!empty($receipt_details->total_line_discount))
										<tr style="color:black !important;">
											<td style="color:black !important;">
												{!! $receipt_details->line_discount_label !!}
											</td>

											<td style="color:black !important;" class="text-right">
												(-) {{ $receipt_details->total_line_discount }}
											</td>
										</tr>
									@endif


									@if (!empty($receipt_details->due_date_label))
										<div class="text-right fontdroid ">
											<span class="pull-left">
												{{ $receipt_details->due_date_label }}
											</span>

											{{ $receipt_details->due_date ?? '' }}
										</div>
									@endif
									@if (!empty($receipt_details->total_in_words))
										<tr>
											<td colspan="2" class="text-right">
												<small>({{ $receipt_details->total_in_words }})</small>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>

					<div class="border-bottom col-md-12">
						@if (empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label))
							<!-- tax -->
							@if (!empty($receipt_details->taxes))
								<table class="table table-slim table-bordered">
									<tr>
										<th colspan="2" class="text-center">{{ $receipt_details->tax_summary_label }}
										</th>
									</tr>
									@foreach ($receipt_details->taxes as $key => $val)
										<tr>
											<td class="text-center"><b>{{ $key }}</b></td>
											<td class="text-center">{{ $val }}</td>
										</tr>
									@endforeach
								</table>
							@endif
						@endif
					</div>

					@if (!empty($receipt_details->additional_notes))
						<div class="row">
							<div class="col-xs-12">
								<br>
								<p>{!! nl2br($receipt_details->additional_notes) !!}</p>
							</div>
						</div>
					@endif

					<div class="row ">
						@if (!empty($receipt_details->footer_text))
							<div class="@if ($receipt_details->show_barcode || $receipt_details->show_qr_code) col-xs-8 @else col-xs-12 @endif">
								{!! $receipt_details->footer_text !!}
							</div>
						@endif
						@if ($receipt_details->show_barcode || $receipt_details->show_qr_code)
							<div class="@if (!empty($receipt_details->footer_text)) col-xs-4 @else col-xs-12 @endif text-center">
								{{-- Barcode --}}
								@if ($receipt_details->show_barcode)
									<img class="center-block"
										src="data:image/png;base64,{{ DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2, 30, [39, 48, 54], true) }}">
								@endif

								@if ($receipt_details->show_qr_code && !empty($receipt_details->qr_code_text))
									<img class="center-block mt-5"
										src="data:image/png;base64,{{ DNS2D::getBarcodePNG($receipt_details->qr_code_text, 'QRCODE', 3, 3, [39, 48, 54]) }}">
								@endif
							</div>
						@endif
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>


<style type="text/css">
    body {
        color: #000000;
    }
</style>
