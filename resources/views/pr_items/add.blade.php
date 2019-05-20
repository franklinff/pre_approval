@extends('layouts.app')
@section('body')

<div class="m-content">
    <!--Begin::Main Portlet-->
    <div class="m-portlet">
        <div class="m-subheader ">

            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Purchase @if($purchase_type == 'po') Order no @endif @if($purchase_type == 'pr') Request no @endif - {{ $id }}
                       {{-- <span style="float:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Add purchase items</button></span>--}}
                    </h3>
                </div>
            </div>

            @if (session('item_added'))
                <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert"></a>
                    {{ session('item_added') }}
                </div>
            @endif
            @if (session('deleted'))
                <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert"></a>
                    {{ session('deleted') }}
                </div>
            @endif
            @if (session('updated'))
                <div class="alert alert-success">
                    {{ session('updated') }}
                </div>
            @endif


            @if($count_pr_items != 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="text-align:right">
                            @csrf
                            <a href="{{route('generate.purchase_order_pdf',[$purchase_type_id])}}" target="_blank"  class="btn btn-primary m-btn m-btn--custom">View PDF -Purchase Order {{ $id }} </a>
                        </div>
                    </div>
                </div>
            @endif

            <div id="addModal" role="dialog">
                <div>
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Item</h4>
                            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        </div>
                        <div class="modal-body">
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="add_pr_item" action="{{ route('pr_items.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="m-portlet__body">
                                    <div class="m-form__group row">
                                        <div class="col-md-6 form-group">
                                            <label>
                                                Quantity:
                                            </label>
                                            <input type="number" class="form-control m-input" id="quantity" name="quantity" placeholder="Enter Quantity">
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label>
                                                Unit Price:
                                            </label>
                                            <input type="number" class="form-control m-input" id="unit_price" name="unit_price" placeholder="Enter Unit Price">
                                        </div>
                                    </div>
                                    <div class="m-form__group row">
                                        <div class="col-md-6 form-group">
                                            <label>
                                                Total Amount:
                                            </label>
                                            <input type="number" class="form-control m-input" id="total_amount" name="total_amount" placeholder="Total Amount">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>
                                                Date:
                                            </label>
                                           @if($purchase_type == 'pr')
                                                <input type="hidden" name="pr_no_id" value="{{ $id }}">
                                            @endif
                                            @if($purchase_type == 'po')
                                                <input type="hidden" name="po_no_id" value="{{ $id }}">
                                            @endif
                                            <div class='input-group date' id='m_datepicker'>
                                                <span class="input-group-addon">
													<i class="la la-calendar-check-o glyphicon-th"></i>
												</span>
                                                <input type='text' class="form-control m-input"  name="date" placeholder="Select date & time" readonly/>
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
                                            <input type="text" class="form-control m-input" name="purpose" placeholder="Enter Purpose">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>
                                                Material Description:
                                            </label>
                                            <textarea type="text" class="form-control m-input" name="material_description" placeholder="Enter Material Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div id="addErrorDiv" class="text-danger">

                                </div>

                                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                    <div class="m-form__actions m-form__actions--solid">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-8">
                                                <button type="submit" class="btn btn-primary">
                                                    Add
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
                        </div>

                    </div>

                </div>
            </div>


            @if($count_pr_items != 0)
                {!! $html->table() !!}
            @endif

        </div>


        </div>
        {{--</div>--}}
    </div>
    <!--End::Main Portlet-->
</div>
@endsection
@section('js')
    {!! $html->scripts() !!}
    <script>
        $(document).ready(function () {
            $('#add_pr_item').validate({
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
                    quantity:{
                        required:true,
                        number: true
                    },
                    unit_price:{
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
                        date:"Please enter date",
                    },
                    purpose:{
                        required:"Purpose required"
                    },
                    quantity:{
                        required:"Please enter quantity",
                        number: "Enter valid number"
                    },
                    unit_price:{
                        required:"Please enter price",
                        number: "Enter valid number"
                    }

                }
            });

            $('#quantity').on('keyup', function () {
                var quantity = $(this).val();
                var unit_price = $('#unit_price').val();
                var total_amount = quantity*unit_price;
                $('#total_amount').attr('value', total_amount);
            });

            $('#unit_price').on('keyup', function () {
                var unit_price = $(this).val();
                var quantity = $('#quantity').val();
                var total_amount = quantity*unit_price;
                $('#total_amount').attr('value', total_amount);
            });
            
        });

        function deletePRitems(url) {
            if (confirm("Are you sure to delete?")) {
                console.log(url);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: url,
                    success: function (res) {
                        console.log(res);
                        $("#row_"+res).fadeOut("slow");
                    }
                });
            }
        }


        function clearPRitemsfields() {
            var pr_no_id = $('input[name="pr_no_id"]').val();
            $('input[name="date"]').attr('value', '');
            $('#material_description').html('<textarea type="text" class="form-control m-input" name="material_description" placeholder="Enter Material Description"></textarea>');
            $('input[name="pr_no_id"]').attr('value', pr_no_id);
            $('input[name="purpose"]').attr('value', '');
            $('input[name="quantity"]').attr('value', '');
            $('input[name="unit_price"]').attr('value', '');
            $('input[name="total_amount"]').attr('value', '');
        }

        function editPRitems(url) {
                console.log(url);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: url,
                success: function (res) {
                    var pr_items_details = res;


                    console.log(res);

                    $('#editModal').modal('show');

                    $('#edit_pr_item').attr('action', pr_items_details.url);
                    $('input[name="date"]').attr('value', pr_items_details.date);
                    $('#material_description').html('<textarea type="text" class="form-control m-input" name="material_description" placeholder="Enter Material Description">'+ pr_items_details.material_description +'</textarea>');
                    $('input[name="pr_no_id"]').attr('value', pr_items_details.pr_no_id);
                    $('input[name="purpose"]').attr('value', pr_items_details.purpose);
                    $('input[name="quantity"]').attr('value', pr_items_details.quantity);
                    $('input[name="unit_price"]').attr('value', pr_items_details.unit_price);
                    $('input[name="total_amount"]').attr('value', pr_items_details.quantity*pr_items_details.unit_price);
                }
            });
        }


        $('#m_datepicker').on('changeDate', function(ev){
            $(this).datepicker('hide');
        });


        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(750);
        });

    </script>
@endsection
