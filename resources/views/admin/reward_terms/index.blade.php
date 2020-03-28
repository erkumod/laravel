@extends('layouts.admin')

@section('title', 'vehicle_color')
@section('content')
<h4 class="header-title m-t-0 m-b-30">Default Example</h4>
<h4 class="header-title m-t-0 m-b-30">Color List</h4>
<div class="pull-right m-5">
    <a href="{{url('admin/vehicle_color/create')}}">
        <i class="fa fa-plus"></i>
        Create
    </a>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
@if(Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>      
        </tbody>
    </table>
@endsection


@push('script')
<script>
    var dtable;
    $(document).ready(function() {
        dtable = $('#datatable').DataTable({
            lengthMenu: [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
            processing: true,
            serverSide: true,
            stateSave: true,
            ajax: {
                url: 'vehicle_color/datatable',
            },
            columns: [
                {
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'code',
                    name: 'code',
                },
                {
                    "data": null,
                    "name": null,
                    "searchable": false,
                    "sortable": false,
                    "className": 'text-center',
                    "render": function (o) {
                        return "<a href='{!!url('admin/vehicle_color')!!}/" + o.id + "/edit' class='btn btn-primary btn-xs'>Edit</a>" +
                        "<span>&nbsp;&nbsp;</span>" +
                        "<a href='javascript:void(0);' class='btn btn-danger btn-xs'" +
                        "onclick='deleteRecord(" + o.id + ")'>Delete</a>";
                    }
                }
            ]
        });
    });

    $("#refreshDataTable").click(function(e) {
        dtable.draw(false);
    });
    function showToast(type, text) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](text)
    }
    function deleteRecord(id) {
        swal({
            title: "Are you sure?",
            customClass: 'custom-swal',
            text: "Do you really want to delete this vehicle color",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {
            $.ajax({
                url: "{!!url('admin/vehicle_color')!!}/" + id,
                type: "DELETE",
                processData: false,
                cache: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(success) {
                    showToast('success', success.message);
                    dtable.draw(false);
                    swal.close();
                },
                error: function(error) {
                    showToast('error', error.responseJSON.message);
                    dtable.draw(false);
                    swal.close();
                },
            });
        });
    }
</script>
@endpush
