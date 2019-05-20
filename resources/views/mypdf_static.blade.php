<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table td {
           border: 1px solid black;
        }
     </style>
</head>
<body>


<p align="center"><span style="font-size: large;"><strong>PURCHASE ORDER</strong></span></p>

<table  class="table" width="100%"  cellpadding="10" cellspacing="0">
    <tr>

        <td colspan="4" rowspan="2">
            Invoice To: <br>
            {{ ucwords($pr_number->company) }}<br>
Company’s GSTIN/UIN: <b>27AAACW3955H1Z4</b> <br>
CIN: U72900MH2000PTC127830
        </td>

        <td colspan="2">
            Voucher No. <br>
            <b>
                {{ $pr_number->pr_no }}
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
            {{ ucwords($pr_number->vendor_supplier_name) }} <br>
             <br>

             GSTIN/UIN     : 27EHMPS7779R2ZN <br>
State Name   :  Maharashtra,  Code : 27
        </td>

        <td colspan="2">
            Supplier’s Ref./Order No.
            <br>
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
                1 Week
            </b>
        </td>
    </tr>
    <tr>
        <td>Sr NO.</td>
        <td colspan="2">Description Of Goods</td>
        <td>Due On</td>
        <td>Quantity</td>
        <td>Rate</td>
        <td>Per</td>
        <td>Amount</td>
    </tr>
    @php
        $rowspan=($pr_number->pr_items->count()>0?$pr_number->pr_items->count():1)
    @endphp
    <tr>
        <td>1</td>
        <td colspan="2">Mouse</td>
        <td>1-Nov-2018</td>
        <td>100 Nos.</td>
        <td>250.00</td>
        <td>Nos.</td>
        <td>25,000.00</td>
    </tr>
    <tr>
            <td>1</td>
            <td colspan="2">Mouse</td>
            <td>1-Nov-2018</td>
            <td>100 Nos.</td>
            <td>250.00</td>
            <td>Nos.</td>
            <td>25,000.00</td>
        </tr>
        <tr>
                <td>1</td>
                <td colspan="2">Mouse</td>
                <td>1-Nov-2018</td>
                <td>100 Nos.</td>
                <td>250.00</td>
                <td>Nos.</td>
                <td>25,000.00</td>
            </tr>

            <tr>
                    <td>1</td>
                    <td colspan="2">Mouse</td>
                    <td>1-Nov-2018</td>
                    <td>100 Nos.</td>
                    <td>250.00</td>
                    <td>Nos.</td>
                    <td>25,000.00</td>
                </tr>



    <tr>
        <td></td>
        <td colspan="2">
            <b>Total</b>
        </td>
        <td></td>
        <td>100 Nos.</td>
        <td></td>
        <td></td>
        <td>25,000.00</td>
    </tr>


    <tr>
        <td rowspan="2"></td>
        <td rowspan="2" colspan="2">
            Amount Chargeable (in words) <br>
            <b>
                    INR Twenty Five Thousand Only
            </b>
            <br>

            Company’s GSTIN/UIN : 7AAACW3955H1Z4  <br>
            Company’s Service Tax No. : AACW3955HST001 <br>
            Company’s PAN : AAACW3955H
        </td>

        <td>1-Nov-2018</td>
        <td>100 Nos.</td>
        <td>250.00</td>
        <td>Nos.</td>
        <td>25,000.00</td>
    </tr>
    <tr>

        <td colspan="5">
            For WW Dummy
            <br>
            <div align="right">
                Authorized Signatory
            </div>
        </td>
    </tr>
</table>

</body>


</html>

