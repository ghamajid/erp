<!DOCTYPE html>
<html>
<head>

    <title>Invoice</title>

    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="{{asset('backEnd/')}}/css/rtl/bootstrap.min.css"/>

    <style>
        <?php
               $font_name= !$pdf_font  ? 'DejDejaVu Sans' : $pdf_font->name;
          ?>
@font-face {
            font-family: <?php echo $font_name ?>;
            @if($pdf_font)
             src: url("{{asset('fonts/'.$pdf_font->font_file)}}") format('truetype');
            @endif
             font-style: normal;
        }

        body {
            font-family: <?php echo $font_name ?>, sans-serif;
        }

        .invoice_heading {
            border-bottom: 1px solid black;
            padding: 20px;
            text-transform: capitalize;
        }

        .invoice_logo {
            width: 33.33%;
            float: left;
            text-align: left;
        }

        .invoice_no {
            text-align: right;
            color: #415094;
        }

        .invoice_info {
            padding: 20px;
            width: 100%;
            text-transform: capitalize;
        }

        .t-100 {
            min-height: 100px;
        }

        .billing_info {
            margin-top: 100px;
        }

        table {
            text-align: left;
            font-family: <?php echo $font_name ?>, sans-serif;
            font-weight: normal;
        }

        td, th {
            color: #828bb2;
            font-size: 10px;
            padding: 0;
            font-family: <?php echo $font_name ?>, sans-serif;
            font-weight: normal;
        }

        th {
            font-family: <?php echo $font_name ?>, sans-serif;
            font-weight: normal;
        }

        li {
            list-style-type: none;
            text-align: right;
        }

        .sale_note {
            width: 45%;
            float: left;
            text-align: left;
        }

        .notes {
            color: #415094;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .note_details {
            font-size: 12px;
            font-weight: 600;
            color: #828BB2 !important;
        }

        .margin_120 {
            margin-top: 120px;
            font-size: 12px;
        }

        .margin_12 {
            margin-bottom: 120px;
            font-size: 12px;
        }

        .invoice_footer {
            position: absolute;
            left: 0;
            bottom: 180px;
            width: 100%;
        }

        .invoice_info_footer {
            padding: 0px;
            width: 100%;
            left: 0;
            text-transform: capitalize;
            position: inherit;
        }

        p {
            font-size: 10px;
            color: #454545;
            line-height: 16px;
        }

        .extra_div {
            height: 40px;
        }

        .a4_width {
            max-width: 1145.28px;
            margin: auto;
        }

        .nowrap {
            white-space: nowrap;
        }

        h5 {
            font-size: 13px !important;
            font-weight: 500;
            line-height: 12px;
        }

        .hpb-1 {
            padding: 0;
        }

        .width_custom {
            max-width: 200px;
        }
    </style>
</head>
<body>
@php
    $setting = app('general_setting');
@endphp
<div class="container-fluid a4_width">
    <div class="invoice_heading">
        <div class="invoice_logo">
            @if ($setting->logo)
                <img src="{{asset($setting->logo)}}" width="100px" alt="">
            @else
                <img src="{{asset('frontend/')}}/img/logo.png" width="100px" alt="">
            @endif
        </div>
        <div class="invoice_no">
            <h5 class="hpb-1">{{$setting->company_name}}</h5>
            <h5 class="hpb-1">{{$setting->phone}}</h5>
            <h5 class="hpb-1">{{$setting->email}}</h5>
            <h5>{{$setting->address}}</h5>
        </div>
    </div>
    <div class="invoice_info">
        <div class="invoice_logo" style="width:75%">
            <table class="table-borderless">
                @php
                    $name = ($data->customer_id != null) ? $data->customer->name : $data->agentuser->name;
                    $mobile = ($data->customer_id != null) ? $data->customer->mobile : $data->agentuser->agent->phone;
                    $email = ($data->customer_id != null) ? $data->customer->email : $data->agentuser->email;
                    $address = ($data->customer_id != null) ? $data->customer->address : $data->agentuser->address;
                @endphp
                <tr>
                    <td>{{__('common.Bill No')}}</td>
                    <td>: {{$data->invoice_no}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Bill Date')}}</td>
                    <td>: {{ showDate($data->created_at) }}</td>
                </tr>
                <tr>
                    <td>{{__('common.Party Name')}}</td>
                    <td>: {{@$name}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Party Address')}}</td>
                    <td>: {{@$address}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Phone')}}</td>
                    <td>: {{@$mobile}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Email')}}</td>
                    <td>: {{@$email}}</td>
                </tr>
            </table>
        </div>
        <div class="invoice_logo" style="width:25%">
            <table class="table-borderless mr_0 ml_auto">
                <tr>
                    <td>{{__('common.Served By')}}</td>
                    <td>: {{$data->creator->name}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Entry Time')}}</td>
                    <td>: {{date('m-d-Y H:i:s', strtotime($data->created_at))}}</td>
                </tr>
                <tr>
                    <td>{{__('sale.Ref. No')}}</td>
                    <td>: {{$data->ref_no}}</td>
                </tr>
                <tr>
                    <td>{{__('common.Status')}}</td>
                    <td>: {{$data->status == 1 ? trans('sale.Paid') : trans('sale.Unpaid')}}</td>
                </tr>
                <tr>
                    <td>{{__('sale.Branch')}}</td>
                    <td>: {{@$data->quotationable->name}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="extra_div">
    </div>
    <br>
    <br>
    <div class="invoice_info">
        <table class="table table-bordered billing_info" style="width: 100%;">
            <tr class="m-0">
                <th scope="col">{{ __('common.No') }}</th>
                <th scope="col">{{__('sale.Product Name')}}</th>
                @if (app('general_setting')->origin == 1)
                    <th scope="col">{{__('product.Part No.')}}</th>
                @endif
                <th scope="col">{{__('product.Model')}}</th>
                <th scope="col">{{__('product.Brand')}}</th>
                <th scope="col">{{__('sale.Price')}}</th>
                <th scope="col">{{__('sale.Qty')}}</th>
                <th scope="col">{{__('sale.Tax')}}</th>
                <th scope="col" style="text-align:right;">{{__('sale.Discount')}} (%)</th>
                <th scope="col" style="text-align:right;">{{__('sale.SubTotal')}}</th>
            </tr>

            @foreach($data->items as $key=> $item)
                @php
                    $variantName = variantName($item);
                @endphp

                @if ($item->productable->product)
                    @php
                        $type =$item->product_sku_id.",'sku'" ;
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><input type="hidden" name="items[]"
                                   value="{{$item->product_sku_id}}">
                            {{$item->productable->product->product_name}}
                            <br>
                            @if ($variantName)
                                ({{ $variantName }})
                            @endif
                        </td>
                        @if (app('general_setting')->origin == 1)
                            <td>
                                {{@$item->productable->product->origin}}
                            </td>
                        @endif
                        <td>{{@$item->productable->product->model->name}}</td>
                        <td>{{@$item->productable->product->brand->name}}</td>
                        <td>{{single_price_pdf($item->price)}}</td>
                        <td style="text-align:center;">{{$item->quantity}}</td>
                        <td>{{$item->tax}}%</td>
                        <td style="text-align:right;">{{$item->discount}}</td>
                        <td style="text-align:right;"> {{single_price_pdf($item->price * $item->quantity)}} </td>
                    </tr>
                @else
                    @php
                        $type =$item->product_sku_id.",'combo'" ;
                    @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{$item->productable->name}}
                            <br> {!!$variantName!!}
                        </td>

                        <td></td>
                        @if (app('general_setting')->origin == 1)
                            <td></td>
                        @endif
                        <td></td>

                        <td>{{single_price_pdf($item->price)}}</td>

                        <td style="text-align:center;">{{$item->quantity}}</td>

                        <td>{{$item->tax}}%</td>

                        <td style="text-align:right;">{{$item->discount}}</td>
                        <td style="text-align:right;"> {{single_price_pdf($item->price * $item->quantity)}} </td>
                    </tr>
                @endif
            @endforeach
            <tfoot>
            @php
                $subtotal = $data->items->sum('price') * $data->items->sum('quantity');
                $total_due = 0;
                $this_due = 0;
                $tax = 0;
                $discountProductTotal = 0;
                $subTotalAmount = 0;
                foreach ($data->items as $product) {

                    $prductDiscount = $product->price * $product->discount / 100;

                    $tax +=(($product->price - $prductDiscount) * $product->quantity ) * $product->tax / 100;

                    if ($product->discount > 0) {
                        $discountProductTotal += $prductDiscount * $product->quantity;
                    }
                    $subTotalAmount += $product->price * $product->quantity;
                }
                $discount = $data->total_discount;
                $price_after_discount = $data->amount - $discount;
                $vat = ($price_after_discount * $data->total_vat) / 100;
            @endphp
            @php
                $paid =0;
            @endphp
            <tr>
                <td colspan="8" style="text-align: right">
                        <p class="nowrap">{{__('quotation.SubTotal')}}
                            :
                        </p>
                        @if ($discountProductTotal > 0)
                            <p>{{__('sale.Product Wise Discount')}}
                                :
                            </p>
                        @endif
                        @if ($tax > 0)
                            <p>{{__('sale.Product Wise Tax')}}
                                :
                            </p>
                        @endif
                        <p>{{__('sale.Grand Total')}}
                            :
                        </p>
                        @if ($vat > 0)
                            <p>{{__('quotation.Other Tax')}} ({{ $data->total_vat }}%)
                                :
                            </p>
                        @endif
                        @if ($discount > 0)
                            <p>{{__('quotation.Discount')}}
                                :
                            </p>
                        @endif

                        @if($data->shipping_charge > 0)
                            <p>{{__('purchase.Shipping Charge')}}
                                :
                            </p>
                        @endif
                        @if($data->other_charge > 0)
                            <p>{{__('purchase.Other Charge')}}
                                :
                            </p>
                        @endif
                        <p class="border-top-0">{{__('sale.Total Amount')}}
                            :
                        </p>
                </td>

                <td class="text-right mr-0 pr-2">
                        <p class="nowrap">{{single_price_pdf($subTotalAmount)}}</p>
                        @if ($discountProductTotal > 0)
                            <p class="nowrap">(-) {{single_price_pdf($discountProductTotal)}}
                            </p>
                        @endif
                        @if ($tax > 0)
                            <p class="nowrap">{{single_price_pdf($tax)}}
                            </p>
                        @endif
                        <p class="nowrap">{{single_price_pdf($subTotalAmount - $discountProductTotal + $tax)}}</p>
                        @if ($vat > 0)
                            <p class="nowrap">{{single_price_pdf($vat)}}
                            </p>
                        @endif
                        @if ($discount > 0)
                            <p class="nowrap">(-) {{single_price_pdf($discount)}}</p>
                        @endif
                        @if($data->shipping_charge > 0)
                            <p class="nowrap">{{single_price_pdf($data->shipping_charge)}}</p>
                        @endif
                        @if($data->other_charge > 0)
                            <p class="nowrap">{{single_price_pdf($data->other_charge)}}</p>
                        @endif
                        <p>{{single_price_pdf($data->payable_amount)}}</p>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    @php
        $class = '';
        if($data->notes and app('general_setting')->terms_conditions){
            $class = 'sale_note';
        }
    @endphp
    <div class="invoice_info margin_12 custom_margin" style="display: flex;justify-content: space-between; width:100%;">
        @if ($data->notes)
            <div class="{{ $class }}" style="">
                <div class="sale_note_inner text-justify">

                    <h3 class="notes">{{__('common.Note')}}</h3>
                    <div class="note_details">{!! $data->notes !!}</div>

                </div>
            </div>
        @endif
        @if (app('general_setting')->terms_conditions)
            <div class="{{ $class }}"
                 @if ($data->notes)style="display: flex;justify-content: flex-end; padding-left: 60px"
                 @else style="display: flex;justify-content: flex-end;" @endif>
                <div class="sale_note_inner text-justify">
                    <h3 class="notes">{{__('setting.Terms & Condition')}}</h3>
                    <div class="note_details">{{app('general_setting')->terms_conditions}}</div>

                </div>
            </div>
        @endif
    </div>
</div>

<div class="extra_div">

</div>
<footer class="invoice_footer">
    <div class="invoice_info_footer">
        <div class="invoice_logo text-center">
            <img src="{{ asset('frontend/img/signature.png') }}" alt="">
            <p style="margin-bottom:5px">--------------------------</p>
            <p style="margin:0; line-height:14px;">{{__('sale.Customer')}} {{__('sale.Signature')}}</p>
        </div>
        <div class="invoice_logo text-center">
            <img
                src="{{ $data->creator->signature ? asset($data->creator->signature) : asset('frontend/img/signature.png') }}"
                alt="">
                <p style="margin-bottom:5px">--------------------------</p>
                <p style="margin:0; line-height:14px;">{{__('sale.Accountant')}} {{__('sale.Signature')}}</p>
        </div>
        <div class="invoice_logo text-center">
            <img
                src="{{ $data->updator->signature ? asset($data->updator->signature) : asset('frontend/img/signature.png') }}"
                alt="">
                <p style="margin-bottom:5px">--------------------------</p>
                <p style="margin:0; line-height:14px;">{{__('sale.Authorized')}} {{__('sale.Signature')}}</p>
        </div>
    </div>
</footer>
</body>
</html>
