@extends('layouts.app')
@section('body')

    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            PO request
                        </h3>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
        {{--<div class="row">--}}
        <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_po_no" action="{{ route('po_number.store') }}" method="post" enctype="multipart/form-data">
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
                                    <option value="{{ $company_detail->id }}">{{ $company_detail->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>
                                PO Number:
                            </label>
                            <input type="text" class="form-control m-input" name="po_no" placeholder="Enter PO number" value="{{ $pr_number }}">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                Requested by:
                            </label>
                            <input type="text" class="form-control m-input" name="requested_by" placeholder="Requested by">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                        <div class="col-md-6">
                            <label>
                                Date of Request:
                            </label>
                            <div class='input-group date' id='m_datetimepicker'>
                                <input type='text' class="form-control m-input" readonly name="dor" placeholder="Select date & time"/>
                                <span class="input-group-addon">
													<i class="la la-calendar-check-o glyphicon-th"></i>
												</span>
                            </div>
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                Material required on or before:
                            </label>
                            <input type="text" class="form-control m-input" name="material_req_on_or_before" placeholder="Enter Material required on or before">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                        <div class="col-md-6">
                            <label>
                                Material required for Company & Department:
                            </label>
                            <input type="text" class="form-control m-input" name="material_req_company_department" placeholder="Material required for Company & Department">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                Delivery location:
                            </label>
                            <select class="form-control m-input" name="delivery_location">
                                <option value="">
                                    Select
                                </option>
                                @foreach($delivery_locations as $delivery_location)
                                    <option value="{{ $delivery_location->id }}">{{ $delivery_location->location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>
                                Vendor / Supplier Name:
                            </label>
                            <select class="form-control m-input" name="vendor_supplier_name">
                                <option value="">
                                    Select
                                </option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
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
                                    <option value="{{ $delivery->id }}">{{ $delivery->term_of_delivery }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                Phone No:
                            </label>
                            <input type="text" class="form-control m-input" name="phone_no" placeholder="Enter Phone No">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                        <div class="col-md-6">
                            <label>
                                Address:
                            </label>
                            <textarea type="text" class="form-control m-input" name="address" placeholder="Enter Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                {{--<button type="reset" class="btn btn-secondary">--}}
                                {{--Cancel--}}
                                {{--</button>--}}
                                <a href="{{ route('po_number.index') }}" class="btn btn-secondary">Cancel</a>
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
            $('#add_po_no').validate({
                rules: {
                    company_id:{
                        required: true,
                    },
                    requested_by:{
                        required: true,
                    },
                    dor:{
                        required: true,
                    },
                    material_req_on_or_before:{
                        required: true,
                    },
                    material_req_company_department:{
                        required: true,
                    },
                    delivery_location:{
                        required: true,
                    },
                    phone_no:{
                        required: true,
                    },
                    address:{
                        required: true,
                    },
                    terms_of_delivery:{
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
                    dor:{
                        required: "Please select date."
                    },

                    material_req_on_or_before:{
                        required: "Please mention date."
                    },
                    material_req_company_department:{
                        required: "Department please."
                    },
                    delivery_location:{
                        required: "Please select location"
                    },
                    phone_no:{
                        required: "Please mention phone number."
                    },
                    address:{
                        required: "Address please"
                    },
                    terms_of_delivery:{
                        required:"Please slect delivery terms."
                    },vendor_supplier_name:{
                        required: "Please select vendor.",
                    }
                }
            });
        });
    </script>
@endsection