@extends('layouts.app')
@section('body')

    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet">

            @if(count($errors))
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

        <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            Edit Purchase Request -{{ $prnumber_data->pr_no }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            {{--<div class="row">--}}
        <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_pr_no" action="{{ route('pr_number.update',$prnumber_data->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                Company Name:
                            </label>
                            <select class="form-control m-input" name="company_id">
                                <option value="">
                                    Select
                                </option>
                                @foreach($company_details as $company_detail)
                                    <option value="{{ $company_detail->id }}" {{ $prnumber_data->company_id == $company_detail->id ? 'selected="selected"' : '' }}>{{ $company_detail->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>
                                PR Number:
                            </label>
                            <input type="text" class="form-control m-input" name="pr_no" placeholder="Enter PR number" value="{{ $prnumber_data->pr_no }}" readonly>
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    <div class="m-form__group row">
                        <div class="col-md-6 form-group">
                            <label>
                                Requested by:
                            </label>
                            <input type="text" class="form-control m-input" name="requested_by" value="{{ $prnumber_data->requested_by }}">

                        </div>
                        <div class="col-md-6 form-group">
                            <label>
                                Date of Request:
                            </label>
                            <div class='input-group date' id='m_datetimepicker'>
                                <input type='text' class="form-control m-input" readonly name="dor" value="{{ $prnumber_data->dor }}"/>
                                <span class="input-group-addon"><i class="la la-calendar-check-o glyphicon-th"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="m-form__group row">
                        <div class="col-md-6 form-group">
                            <label>
                                Material required on or before:
                            </label>
                            <input type="text" class="form-control m-input" name="material_req_on_or_before" value="{{ $prnumber_data->material_req_on_or_before }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>
                                Material required for Company & Department:
                            </label>
                            <input type="text" class="form-control m-input" name="material_req_company_department" value="{{ $prnumber_data->material_req_company_department }}">
                        </div>
                    </div>


                    <div class="m-form__group row">
                        <div class="col-md-6 form-group">
                            <label>
                                Delivery location:
                            </label>
                            <select class="form-control m-input" name="delivery_location">
                                <option value="">
                                    Select
                                </option>
                                @foreach($delivery_locations as $delivery_location)
                                    <option value="{{ $delivery_location->id }}" {{ $prnumber_data->delivery_location == $delivery_location->id ? 'selected="selected"' : '' }}>{{ $delivery_location->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>
                                Vendor / Supplier Name:
                            </label>

                            <select class="form-control m-input" name="vendor_supplier_name">
                                <option value="">
                                    Select
                                </option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" {{ $prnumber_data->vendor_supplier_name == $vendor->id ? 'selected="selected"' : '' }}>{{ $vendor->vendor_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="m-form__group row">
                        <div class="col-md-6 form-group">
                            <label>
                                Terms of delivery:
                            </label>
                            <select class="form-control m-input" name="terms_of_delivery">
                                <option value="">
                                    Select
                                </option>
                                @foreach($terms_of_deliveries as $delivery)
                                    <option value="{{ $delivery->id }}" {{ $prnumber_data->terms_of_delivery == $delivery->id ? 'selected="selected"' : ''}}>{{ $delivery->term_of_delivery }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="m-form__group row">
                        <div class="col-md-6 form-group">
                            <label>
                                Phone No:
                            </label>
                            <input type="text" class="form-control m-input" name="phone_no" value="{{ $prnumber_data->phone_no }}">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                        <div class="col-md-6 form-group">
                            <label>
                                Address:
                            </label>
                            <textarea type="text" class="form-control m-input" name="address">{{ $prnumber_data->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                {{--<button type="reset" class="btn btn-secondary">--}}
                                {{--Cancel--}}
                                {{--</button>--}}
                                <a href="{{ route('pr_number.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
            {{--</div>--}}
        </div>
        <!--End::Main Portlet-->
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $('#edit_pr_no').validate({
                rules: {
                    company_id:{
                        required: true,
                    },
                    requested_by:{
                        required: true,
                    },
                    material_req_on_or_before:{
                        required: true,
                    },
                    phone_no:{
                        required: true,
                        number: true
                    },
                    address:{
                        required: true,
                    },
                    material_req_company_department:{
                        required: true,
                    },
                    dor:{
                        required: true,
                    },
                    delivery_location:{
                        required: true,
                    },
                    vendor_supplier_name:{
                        required: true,
                    }
                },
                messages: {
                    company_id:{
                        required: "Please select company."
                    },
                    requested_by:{
                        required: "Please enter requester name"
                    },
                    material_req_on_or_before:{
                        required: "Please mention date."
                    },
                    phone_no:{
                        required: "Please mention phone number.",
                        number: "Please enter number."
                    },
                    address:{
                        required: "Address please"
                    },
                    material_req_company_department:{
                        required: "Department please."
                    },
                    dor:{
                        required: "Please select date."
                    },
                    delivery_location:{
                        required: "Please select delivery location"
                    },
                    vendor_supplier_name:{
                        required: "Please select vendor."
                    }
                }
            });

        });
    </script>
@endsection