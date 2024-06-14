@extends('admin.layout.master')
@section('title','Manage Product')
@section('content')
@push('styles')
<link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- Responsive Table css -->
<link href="{{ asset('backend/assets/libs/admin-resources/rwd-table/rwd-table.min.css') }}" rel="stylesheet"
    type="text/css" />

@endpush

<div class="content">

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- start table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <a href="{{ route('supplier.add') }}"
                                    class="button btn btn-primary waves-effect waves-light" style="float: right;">
                                    <i class="mdi mdi-plus-circle me-1"></i>
                                    Add Product
                                </a>
                            </div>
                        </div>
                        <table id="basic-datatable" {{-- class="table dt-responsive nowrap w-100" --}}
                            class="table table-centered table-nowrap table-striped">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Supplier</th>
                                    <th>Unit</th>
                                    <th>Category</th>

                                    <th style="width: 85px;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($product as $key => $item)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td class="table-user">

                                        <a href="{{ route('supplier.edit',$item->id) }}" class="text-body fw-semibold">{{ $item->name
                                            }}</a>
                                    </td>
                                    {{-- <td>{{ $item->name }}</td> --}}
                                    
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->supplier_id }}</td>
                                    <td>{{ $item->unit_id }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>
                                        @if ($item->status ==1)
                                        <span class="badge bg-soft-success text-success">Active</span>
                                        @endif
                                        @if (!$item->status == 1)
                                        <span class="badge bg-soft-danger text-danger">Inactive</span>

                                        @endif



                                    </td>
                                    <td>


                                        {{-- <a href="{{ route('supplier.view',$item->id) }}" class="action-icon">

                                            <i class="mdi mdi-eye" style="color: blue;" title="View"></i>
                                        </a> --}}

                                        <a href="{{ route('supplier.edit',$item->id) }}" class="action-icon">
                                            <i class="mdi mdi-square-edit-outline" style="color: yellowgreen;"
                                                title="Edit"></i>
                                        </a>
                                        <a href="{{ route('supplier.delete',$item->id) }}" class="action-icon"
                                            id="delete">
                                            <i class="mdi mdi-delete" style="color: red;" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

        {{-- end table --}}
    </div>
    <!-- end container-fluid -->
</div>


@push('scripts')
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
@include('backend.product.script')

@endpush
@endsection