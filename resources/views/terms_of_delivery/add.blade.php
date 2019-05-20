@extends('layouts.app')
@section('body')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Add Delivery Location
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_location" action="{{ route('delivery_location.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Location <span class="text-danger">*</span> :
                            </label>
                            <input type="text" class="form-control m-input" name="location" placeholder="Enter Delivery Location">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    {{--<div class="form-group m-form__group row">--}}
                        {{--<div class="col-md-9">--}}
                            {{--<label class="">--}}
                                {{--Company Logo:--}}
                            {{--</label>--}}
                            {{--<input type="file" class="form-control m-input" name="company_logo" placeholder="Enter Company Logo">--}}
                            {{--<span class="m-form__help">--}}
                                {{--<span style="color: red">--}}
                                    {{--@if(session('error'))--}}
                                        {{--{{ session('error') }}--}}
                                    {{--@endif--}}
                                {{--</span>--}}
                            {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
                                <a href="{{ route('delivery_location.index') }}" class="btn btn-secondary">Cancel</a>
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
            $('#add_location').validate({
                rules: {
                    location:{
                        required: true,
                    },
                    // company_logo:{
                    //     required: true,
                    //     extension: "jpg,jpeg"
                    // },
                },
                messages: {
                    // company_logo:{
                    //     extension: "Please upload files with .jpg and .jpeg extension."
                    // },
                }
            });
        });
    </script>
@endsection
