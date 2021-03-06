@extends('layouts.app')
@section('body')
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                @if (session('success'))
                    <div class="alert alert-success" style="text-align: center" id="success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3 class="m-subheader__title ">
                    List of Users
                </h3>
                <h3 class="m-subheader__title " style="float: right">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
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
        function deleteVendor(url) {
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