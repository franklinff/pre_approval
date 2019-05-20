@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    List of Pr number
                </h3>
                <h3 class="m-subheader__title " style="float: right">
                    <a href="{{ route('pr_number.create') }}" class="btn btn-primary">Add PR NO.</a>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet m-portlet--compact m-portlet--mobile">
            <div class="m-portlet__body">

            {!! $html->table() !!}

            </div>


        </div>
    </div>
@endsection
@section('datatablejs')
     {!! $html->scripts() !!}
    <script>

$(document).ready(function () {
        $('#example').DataTable( {
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('pr_number.index') }}",
            columns: [

                {data: 'id'},
                {data: 'company'},
                {data: 'pr_no'},
                {data: 'requested_by'},
                {data: 'dor'},
                {data: 'material_req_on_or_before'},
                {data: 'material_req_company_department'},
                {data: 'delivery_location'},

                {data: 'vendor_supplier_name'},
                {data: 'phone_no'},
                {data: 'address'},
                {data: 'edit_action'},
                {data: 'action'}
            ],
            columnDefs: [
                { orderable: false, targets: [ 0,6 ] }
            ],
            aaSorting: [],
            // dom: 'Bfrtip',
            paging:true,
            pageLength: '<?php echo config('commonConfig.list_num_of_records_per_page'); ?>',

        } );

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });

        $('.delete_all').on('click', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {
                var check = confirm("Are you sure you want to delete this row?");
                if(check == true){
                    $('#allRecords').submit();
                }
            }
            return false;
        });

        $('.sub_chk').on('click', function(e) {
            $(".sub_chk").each(function() {
                if(!$(this).attr('checked'))
                {
                    $('#master').prop('checked', false);
                }
            });
        });
    });


/*        function deleteVendor(url) {
            if (confirm("Are you sure to delete?")) {
                console.log(url);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    // data: {
                    //     "id": id,
                    //     "_method": 'DELETE',
                    // },
                    url: url,
                    success: function (res) {
                        console.log(res);
                        $("#row_"+res).fadeOut("slow");
                    }
                });
            }
        }*/
    </script>
@endsection
