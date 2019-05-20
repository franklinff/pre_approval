@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Edit Vendor Name
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet">
        {{--<div class="row">--}}
        <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_vendor_name" action="{{ route('vendor.update', $vendor_detail->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Vendor Name:
                            </label>
                            <input type="text" class="form-control m-input" name="vendor_name" placeholder="Enter Vendor name" value="{{ $vendor_detail->vendor_name }}">
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                            <div class="col-md-9">
                                <label>
                                    GST IN/UIN <span class="text-danger"></span>:
                                </label>
                                <input type="text" class="form-control m-input" name="gstin_uin" placeholder="Enter GSTIN/UIN"  value="{{ $vendor_detail->gstin_uin }}">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                                <div class="col-md-9">
                                    <label>
                                        Address <span class="text-danger">*</span>:
                                    </label>
                                    <textarea name="address" id="address" class="form-control m-input" placeholder="Enter Address">{{ $vendor_detail->address }}</textarea>
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
                                <a href="{{ route('vendor.index') }}" class="btn btn-secondary">Cancel</a>
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
            $('#edit_vendor_name').validate({
                rules: {
                    vendor_name:{
                        required: true,
                    },
                    address:{
                        required:true
                    },
                    gstin_uin:{
                        required: true
                    }
                },
                messages: {
                    vendor_name:{
                        required: "Please enter vendor name."
                    },
                    gstin_uin:{
                        required: "Please enter GST no."
                    },
                    address:{
                        required: "Please enter vendor address."
                    }
                }
            });
        });
    </script>
@endsection
