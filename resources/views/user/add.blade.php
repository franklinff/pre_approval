@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Add User Name
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_vendor_name" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-6">
                            <label>
                                User Name:
                            </label>
                            <input type="text" class="form-control m-input" name="name" placeholder="Enter User name">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                            <span id="name" class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="col-md-6">
                            <label>
                                Email id:
                            </label>
                            <input type="text" class="form-control m-input" name="email" placeholder="Enter User email">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                            <span id="email" class="text-danger">{{$errors->first('email')}}</span>
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
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                            <span id="role_id" class="text-danger">{{$errors->first('role_id')}}</span>
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
                    name:{
                        required: true,
                    },
                    email:{
                        required: true,
                        email: true
                    },
                    role_id:{
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

            $('input[name=email]').keyup(function(){
                var email = $('input[name=email]').val();
                var url = "{{ route('user.store') }}";
                console.log(email);
                if(email != null && email.length > 2){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('user.store') }}',
                        method: 'post',
                        data: {
                            email: email,
                        },
                        success: function(res){
                            if(res.email != undefined){
                                $('#email').text(res.email[0]);
                            }else{
                                $('#email').text('');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection