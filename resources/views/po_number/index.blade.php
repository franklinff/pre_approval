@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    List of Purchase Orders
                </h3>
                <h3 class="m-subheader__title " style="float: right">
                    <a href="{{ route('po_number.create') }}" class="btn btn-primary">Add Purchase Order</a>
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--Begin::Main Portlet-->
        <div class="m-portlet m-portlet--compact m-portlet--mobile">
            <div class="m-portlet__body">
                <div class="table table-responsive m_datatable">
                    {!! $html->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('datatablejs')
    {!! $html->scripts() !!}
    <script>
        function deletePO(url) {
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
        }

        $(document).ready(function(){
            $('#success').slideUp("slow");
        });
    </script>
@endsection