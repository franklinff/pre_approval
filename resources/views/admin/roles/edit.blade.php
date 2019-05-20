@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Edit Roles
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_role_name" action="{{ route('role.update',[$role->id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Role Name:
                            </label>


                            <input type="text" class="form-control m-input" name="role_name" placeholder="Enter Role name" value="{{ $role->role_name }}">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Role Description:
                            </label>
                            {{-- <input type="text" class="form-control m-input" name="description" placeholder="Enter Role description"> --}}
                            <textarea name="description" id="description" class="form-control m-input" placeholder="Enter Role description">{{$role->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Display Name:
                            </label>
                        <input type="text" class="form-control m-input" name="display_name" placeholder="Enter display name" value="{{$role->display_name}}">
                            <!-- <span class="m-form__help">
                                Please enter Company name
                            </span> -->
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Parent Role:
                            </label>
                            <select class="form-control m-input" name="parent_id">
                                <option value="">
                                    Select
                                </option>
                                @foreach($roles as $roleRow)
                                    <option value="{{ $roleRow->id }}" {{!empty($role->parent_id)?($role->parent_id==$roleRow->id?'selected':'') :''}}  >{{ $roleRow->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Redirect to after login:
                            </label>
                            <select class="form-control m-input" name="redirect_to">
                                <option value="">
                                    Select
                                </option>
                                @foreach($routes as $route)
                                    @if(isset($route->action['as']))
                                        @if(!in_array(explode('.', $route->action['as'])[0], config('commonConfig.route_prefixes_not_req.names')))
                                            @if(explode('.', $route->action['as'])[1] == 'index')
                                                <option value="{{ $route->action['as'] }}"  {{($role->redirect_to==$route->action['as'])?'selected':''}}>{{ $route->action['as'] }}</option>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-9">
                            <label>
                                Permissions:
                            </label>
                            <select class="form-control m-input" name="permissions[]" multiple size="5{{--{{ count($routes) }}--}}">
                                @foreach($routes as $route)
                                    @if(isset($route->action['as']))
                                        @if(!in_array(explode('.', $route->action['as'])[0], config('commonConfig.route_prefixes_not_req.names')))
                                            <option value="{{ $route->action['as'] }}" {{ (in_array($route->action['as'],$permittedRoutes)) ? 'selected' : ''}}>{{ $route->action['as'] }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
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
                                <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
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
            $('#edit_role_name').validate({
                rules: {
                    role_name:{
                        required: true,
                    },
                    description:{
                        required: true
                    },
                    redirect_to:{
                        required: true
                    },
                    display_name:{
                        required: true
                    }
                },
                messages: {
                    role_name:{
                        required: true,
                    },
                    description:{
                        required: true
                    },
                    redirect_to:{
                        required: true
                    },
                    display_name:{
                        required: true
                    }
                }
            });
        });
    </script>
@endsection
