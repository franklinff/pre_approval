{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<title>Document</title>--}}

    {{--<style>--}}
        {{--table td,th  {--}}
           {{--border: 1px solid black;--}}
        {{--}--}}
     {{--</style>--}}
{{--</head>--}}
{{--<body>--}}


{{--<p align="center"><span style="font-size: large;"><strong>PURCHASE ORDER</strong></span></p>--}}

{{--<table  class="table" width="100%"  cellpadding="10" cellspacing="0">--}}
    {{--<tr>--}}
{{--<<<<<<< HEAD--}}
        {{--<td colspan="4" rowspan="2">--}}
            {{--Invoice To: <br>--}}
            {{--WW Dummy <br>--}}
{{--Company’s GSTIN/UIN: <b>27AAACW3955H1Z4</b> <br>--}}
{{--CIN: U72900MH2000PTC127830--}}
{{--=======--}}

        {{--<td colspan="4" rowspan="2">--}}
            {{--Invoice To: <br>--}}
            {{--{{ ucwords($pr_number->company) }}--}}

            {{--@if(isset($pr_number->company_gstin_uin))--}}
                {{--<br>--}}
                {{--Company’s GSTIN/UIN : {{$pr_number->company_gstin_uin}}--}}
            {{--@endif--}}
            {{--@if(isset($pr_number->company_pan))--}}
            {{--<br>--}}
                {{--Company’s PAN : {{$pr_number->company_pan}}  <br>--}}
            {{--@endif--}}
        {{--</td>--}}

        {{--<td colspan="2">--}}
            {{--Voucher No. <br>--}}
            {{--<b>--}}
                {{--{{ $pr_number->pr_no }}--}}
            {{--</b>--}}
        {{--</td>--}}
        {{--<td colspan="2">--}}
            {{--Dated :  <br>--}}
            {{--<b>--}}
                {{--{{ date('d-M-Y H:i A',strtotime($pr_number->dor)) }}--}}
            {{--</b>--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="2">--}}

        {{--</td>--}}
        {{--<td colspan="2">--}}
            {{--Mode/Terms of Payment <br>--}}
            {{--<b>--}}
                {{--30--}}
            {{--</b>--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="4" rowspan="3">--}}
            {{--Supplier: <br>--}}
{{--<<<<<<< HEAD--}}
            {{--A-1 Power System <br>--}}
             {{--<br>--}}

             {{--GSTIN/UIN     : 27EHMPS7779R2ZN <br>--}}
{{--State Name   :  Maharashtra,  Code : 27--}}
{{--=======--}}
            {{--{{ ucwords($pr_number->vendor_supplier_name) }} <br>--}}
             {{--<br>--}}

            {{--@if(!empty($pr_number->gstin_uin))--}}
                {{--GSTIN/UIN     : {{$pr_number->gstin_uin}} <br>--}}
            {{--@endif--}}
            {{--{{$pr_number->address}}--}}
        {{--</td>--}}

        {{--<td colspan="2">--}}
            {{--Supplier’s Ref./Order No.--}}
            {{--<br>--}}
            {{--<b>--}}
                {{--1--}}
            {{--</b>--}}
        {{--</td>--}}
        {{--<td colspan="2">--}}
            {{--Other Reference(s)--}}

        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="2">--}}
            {{--Dispatch through--}}
        {{--</td>--}}
        {{--<td colspan="2">--}}
            {{--Destination--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="4">--}}
            {{--Terms of Delivery <br>--}}
            {{--<b>--}}
                {{--1 Week--}}
            {{--</b>--}}
        {{--</td>--}}
    {{--</tr>--}}
{{--<<<<<<< HEAD--}}
    {{--<tr>--}}
        {{--<td>Sr NO.</td>--}}
        {{--<td colspan="2">Description Of Goods</td>--}}
        {{--<td>Due On</td>--}}
        {{--<td>Quantity</td>--}}
        {{--<td>Rate</td>--}}
        {{--<td>Per</td>--}}
        {{--<td>Amount</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td rowspan="4">1</td>--}}
        {{--<td rowspan="4" colspan="2">Mouse</td>--}}
        {{--<td rowspan="4">1-Nov-2018</td>--}}
        {{--<td rowspan="4">100 Nos.</td>--}}
        {{--<td rowspan="4">250.00</td>--}}
        {{--<td rowspan="4">Nos.</td>--}}
        {{--<td rowspan="4">25,000.00</td>--}}
    {{--</tr>--}}
    {{--<tr></tr>--}}
    {{--<tr></tr>--}}
    {{--<tr></tr>--}}


    {{--<tr>--}}
        {{--<td></td>--}}
        {{--<td colspan="2">--}}
            {{--<b>Total</b>--}}
        {{--</td>--}}
        {{--<td></td>--}}
        {{--<td>100 Nos.</td>--}}
        {{--<td></td>--}}
        {{--<td></td>--}}
        {{--<td>25,000.00</td>--}}
    {{--</tr>--}}


    {{--<tr>--}}
        {{--<td rowspan="2"></td>--}}
        {{--<td rowspan="2" colspan="2">--}}
            {{--Amount Chargeable (in words) <br>--}}
            {{--<b>--}}
                    {{--INR Twenty Five Thousand Only--}}
            {{--</b>--}}
            {{--<br>--}}

            {{--Company’s GSTIN/UIN : 7AAACW3955H1Z4  <br>--}}
            {{--Company’s Service Tax No. : AACW3955HST001 <br>--}}
            {{--Company’s PAN : AAACW3955H--}}
        {{--</td>--}}

        {{--<td>1-Nov-2018</td>--}}
        {{--<td>100 Nos.</td>--}}
        {{--<td>250.00</td>--}}
        {{--<td>Nos.</td>--}}
        {{--<td>25,000.00</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}

        {{--<td colspan="5">--}}
            {{--For WW Dummy--}}
            {{--<br>--}}
            {{--<div align="right">--}}
                {{--Authorized Signatory--}}
            {{--</div>--}}
        {{--</td>--}}
    {{--</tr>--}}
{{--</table>--}}

{{--</body>--}}


{{--</html>--}}
{{--=======--}}



    {{--<tr>--}}
        {{--<th>Sr NO.</th>--}}
        {{--<th colspan="2">Description Of Goods</th>--}}
        {{--<th>Due On</th>--}}
        {{--<th>Quantity</th>--}}
        {{--<th>Rate</th>--}}
        {{--<th>Per</th>--}}
        {{--<th>Amount</th>--}}
    {{--</tr>--}}
    {{--@php--}}
        {{--$i=1;--}}
        {{--$total_amount=0;--}}
        {{--$total_qty=0;--}}
    {{--@endphp--}}
    {{--@if ($pr_number->pr_items->count()>0)--}}

        {{--@foreach ($pr_number->pr_items as $item)--}}
            {{--@php--}}
                {{--$row_amount=0;--}}
                {{--$row_amount=$item->quantity*$item->unit_price;--}}
                {{--$total_amount+=$row_amount;--}}
                {{--$total_qty+=$item->quantity;--}}
            {{--@endphp--}}
            {{--<tr>--}}
                {{--<td>{{$i}}</td>--}}
                {{--<td colspan="2">{{$item->material_description}}</td>--}}
                {{--<td>{{date('d-M-Y',strtotime($item->date))}}</td>--}}
                {{--<td>{{$item->quantity}} </td>--}}
                {{--<td>{{$item->unit_price}}</td>--}}
                {{--<td>Unit</td>--}}
                {{--<td>{{number_format($row_amount,2)}}</td>--}}
            {{--</tr>--}}
            {{--@php--}}
                {{--$i++;--}}
            {{--@endphp--}}
        {{--@endforeach--}}
    {{--@else--}}
        {{--<tr>--}}
            {{--<td colspan="8" align="center"> No PR Items Found!!</td>--}}
        {{--</tr>--}}
    {{--@endif--}}

    {{--<tr>--}}
            {{--<td rowspan="2"></td>--}}
            {{--<td rowspan="2" colspan="2">--}}
                {{--Amount Chargeable (in words) <br>--}}
                {{--<b>--}}
                    {{--@php--}}
                        {{--$dlcObject=new \App\Http\Controllers\DeliveryLocationController();--}}
                    {{--@endphp--}}

                    {{--: {{ ucwords($dlcObject->getIndianCurrency($total_amount))}}--}}
                {{--</b>--}}
                {{--<br>--}}
                {{--@if(isset($pr_number->company_gstin_uin))--}}
                    {{--Company’s GSTIN/UIN : {{$pr_number->company_gstin_uin}}  <br>--}}
                {{--@endif--}}
                {{--@if(isset($pr_number->company_pan))--}}
                    {{--Company’s PAN : {{$pr_number->company_pan}}  <br>--}}
                {{--@endif--}}
            {{--</td>--}}

            {{--<td></td>--}}
            {{--<td>{{ $total_qty }}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>{{number_format($total_amount,2)}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}

            {{--<td colspan="5">--}}
                {{--For {{ ucwords($pr_number->company) }}--}}
                {{--<br>--}}
                {{--<div align="right">--}}
                    {{--Authorized Signatory--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}

    {{--</body>--}}


    {{--</html>--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table td,th  {
            border: 1px solid black;
        }
    </style>
</head>
<body>


<p align="center"><span style="font-size: large;"><strong>PURCHASE ORDER</strong></span></p>

<table  class="table" width="100%"  cellpadding="10" cellspacing="0">
    <tr>

        <td colspan="4" rowspan="2">
            Invoice To:
            {{ ucwords($pr_number->get_company_name->company_name) }}

            @if(isset($pr_number->get_company_name->gstin_uin))
                <br>
                Company’s GSTIN/UIN : {{$pr_number->get_company_name->gstin_uin}}
            @endif
            @if(isset($pr_number->get_company_name->pan))
                <br>
                Company’s PAN : {{$pr_number->get_company_name->pan}}  <br>
            @endif
        </td>

        <td colspan="2">
            Voucher No. <br>
            <b>
                {{ ($ids[1] == 'po')? $pr_number->po_no: $pr_number->pr_no }}
            </b>
        </td>
        <td colspan="2">
            Dated :  <br>
            <b>
                {{ date('d-M-Y H:i A',strtotime($pr_number->dor)) }}
            </b>
        </td>
    </tr>
    <tr>
        <td colspan="2">

        </td>
        <td colspan="2">
            Mode/Terms of Payment <br>
            <b>
                30
            </b>
        </td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3">
            Supplier: <br>
            {{ ucwords($pr_number->get_vendor_name->vendor_name) }} <br>
            <br>

            @if(!empty($pr_number->get_vendor_name->gstin_uin))
                GSTIN/UIN     : {{$pr_number->get_vendor_name->gstin_uin}} <br>
            @endif
            {{$pr_number->address}}
        </td>

        <td colspan="2">
            Supplier’s Ref./Order No.:
            <b>
                1
            </b>
        </td>
        <td colspan="2">
            Other Reference(s)

        </td>
    </tr>
    <tr>
        <td colspan="2">
            Dispatch through
        </td>
        <td colspan="2">
            Destination
        </td>
    </tr>
    <tr>
        <td colspan="4">
            Terms of Delivery <br>
            <b>
                {{ $pr_number->delivery_terms->term_of_delivery }}
            </b>
        </td>
    </tr>



    <tr>
        <th>Sr NO.</th>
        <th colspan="2">Description Of Goods</th>
        <th>Due On</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Per</th>
        <th>Amount</th>
    </tr>
    @php
        $i=1;
        $total_amount=0;
        $total_qty=0;
    @endphp
    @if ($pr_number->pr_items->count()>0)

        @foreach ($pr_number->pr_items as $item)
            @php
                $row_amount=0;
                $row_amount=$item->quantity*$item->unit_price;
                $total_amount+=$row_amount;
                $total_qty+=$item->quantity;
            @endphp
            <tr>
                <td>{{$i}}</td>
                <td colspan="2">{{$item->material_description}}</td>
                <td>{{date('d-M-Y',strtotime($item->date))}}</td>
                <td>{{$item->quantity}} </td>
                <td>{{$item->unit_price}}</td>
                <td>Unit</td>
                <td>{{number_format($row_amount,2)}}</td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <tr>
            <td colspan="8" align="center"> No PR Items Found!!</td>
        </tr>
    @endif

    <tr>
        <td rowspan="2"></td>
        <td rowspan="2" colspan="2">
            Amount Chargeable (in words) <br>
            <b>
                @php
                    $dlcObject=new \App\Http\Controllers\DeliveryLocationController();
                @endphp

                : {{ ucwords($dlcObject->getIndianCurrency($total_amount))}}
            </b>
            <br>
            @if(isset($pr_number->get_company_name->gstin_uin))
                Company’s GSTIN/UIN : {{$pr_number->gstin_uin}}  <br>
            @endif
            @if(isset($pr_number->get_company_name->pan))
                Company’s PAN : {{$pr_number->get_company_name->pan}}  <br>
            @endif
        </td>

        <td></td>
        <td>{{ $total_qty }}</td>
        <td></td>
        <td></td>
        <td>{{number_format($total_amount,2)}}</td>
    </tr>
    <tr>

        <td colspan="5">
            For {{ ucwords($pr_number->get_company_name->company_name) }}
            <br>
            <div align="right">
                Authorized Signatory
            </div>
        </td>
    </tr>
</table>

</body>


</html>

