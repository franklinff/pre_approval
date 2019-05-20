@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Edit User Name
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_vendor_name" action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                User Name:
                            </label>
                            <input type="text" class="form-control m-input" name="name" placeholder="Enter User name" value="{{ $user->name }}">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                        <div class="col-md-6">
                            <label>
                                Roles:
                            </label>
                            <select class="form-control m-input" name="role_id">
                                <option value="">
                                    Select
                                </option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @foreach($role_users as $role_user) @if($role->id == $role_user->role_id) {{ "selected" }} @endif @endforeach>{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
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
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
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