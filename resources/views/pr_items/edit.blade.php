@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Purchase order no - {{ $pr_items_details->pr_no_id  }}
                </h3>
            </div>
        </div>
    </div>



    <!-- END: Subheader -->
    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet">

                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Item</h4>
                                </div>
{{--                                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_pr_item" action="{{ route('pr_items.update',$pr_items_details->id) }}" method="post" enctype="multipart/form-data">--}}
                                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="edit_pr_item" action="{{ route('pr_items.update', $purchase_type_id) }}" method="post" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="m-portlet__body">
                                            <div class="m-form__group row">
                                                <div class="col-md-6 form-group">
                                                    <label>
                                                        Quantity:
                                                    </label>
                                                    <input type="number" class="form-control m-input" id="quantity_edit" name="quantity_edit" value="{{ $pr_items_details->quantity }}">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>
                                                        Unit Price:
                                                    </label>
                                                    <input type="number" class="form-control m-input" id="unit_price_edit" name="unit_price_edit" value="{{ $pr_items_details->unit_price }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">

                                                <div class="col-md-6">
                                                    <label>
                                                        Total Amount:
                                                    </label>
                                                    <input type="number" class="form-control m-input" id="total_amount_edit" name="total_amount_edit" value="{{ $pr_items_details->unit_price * $pr_items_details->quantity }}" readonly>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>
                                                        Date:
                                                    </label>
                                                    <input type="hidden" name="pr_no_id" value="{{ $pr_items_details->pr_no_id }}">
                                                    <div class='input-group date' id='m_datepicker'>
                                                        <input type='text' class="form-control m-input" id="m_datepicker" name="m_datepicker" value="{{ $pr_items_details->date }}" readonly />
                                                        <span class="input-group-addon">
													    <i class="la la-calendar-check-o glyphicon-th"></i>
												        </span>
                                                    </div>
                                                    <div class="clear-fix date-error">

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="m-form__group row">
                                                <div class="col-md-6 form-group">
                                                    <label>
                                                        Purpose:
                                                    </label>
                                                    <input type="text" class="form-control m-input" name="purpose" value="{{ $pr_items_details->purpose }}">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>
                                                        Material Description:
                                                    </label>
                                                    <div id="material_description">
                                                        <textarea type="text" class="form-control m-input" name="material_description" >{{ $pr_items_details->material_description }}</textarea>
                                                    </div>
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

                                                        <a href="{{ route('pr_items.show', $purchase_type) }}" class="btn btn-secondary">Cancel</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

        </div>
        <!--End::Main Portlet-->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $('#edit_pr_item').validate({
                rules: {
                    material_description:{
                        required:true,
                    },
                    date:{
                        required:true,
                        date:true
                    },
                    purpose:{
                        required:true,
                    },
                    quantity_edit:{
                        required:true,
                        number: true
                    },
                    unit_price_edit:{
                        required:true,
                        number: true
                    }

                },
                messages: {
                    material_description:{
                        required:"Please enter description",
                    },
                    date:{
                        required:"Date required",
                        date:"Please enter description",
                    },
                    purpose:{
                        required:"Purpose required"
                    },
                    quantity_edit:{
                        required:"Please enter quantity",
                        number: "Enter valid number"
                    },
                    unit_price_edit:{
                        required:"Please enter price",
                        number: "Enter valid number"
                    }

                }
            });

            $('#quantity_edit').on('keyup', function () {
                var quantity = $(this).val();
                var unit_price = $('#unit_price_edit').val();
                var total_amount = quantity*unit_price;
                $('#total_amount_edit').attr('value', total_amount);
            });

            $('#unit_price_edit').on('keyup', function () {
                var unit_price = $(this).val();
                var quantity = $('#quantity_edit').val();
                var total_amount = quantity*unit_price;
                $('#total_amount_edit').attr('value', total_amount);
            });

        });
    </script>
@endsection