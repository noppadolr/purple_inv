@extends('admin.layout.master')
@section('title','Manage Unit')
@section('content')
@push('styles')
<link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
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
                            <li class="breadcrumb-item active">Unit</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Unit</h4>
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
                                <a href="{{ route('unit.create') }}"
                                    class="button btn btn-primary waves-effect waves-light" style="float: right;">
                                    <i class="mdi mdi-plus-circle me-1"></i>
                                    Add Unit
                                </a>
                            </div>
                        </div>
                        <table id="basic-datatable" {{-- class="table dt-responsive nowrap w-100" --}}
                            class="table table-centered table-nowrap table-striped">
                            <thead>

                                <tr>
                                    <th width="5%">#</th>
                                    <th style="width: 55%">Name</th>
                                    <th style="width: 10%">Created at</th>
                                    <th style="width: 10%">Created by</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($units as $key => $item)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td class="table-user">
                                        <a href="{{ route('unit.edit',$item->id) }}" class="text-body fw-semibold">{{ $item->name}}</a>
                                    </td>
                                    <td>{{date('d-M-Y', strtotime($item->created_at )) }}</td>
                                    <td>{{ $item->created_by }}</td>
                                    <td>
                                        @if ($item->status ==1)
                                        <span class="badge bg-soft-success text-success">Active</span>
                                        @endif
                                        @if (!$item->status == 1)
                                        <span class="badge bg-soft-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('unit.edit',$item->id) }}" class="action-icon">
                                            <i class="mdi mdi-square-edit-outline" style="color: yellowgreen;"
                                                title="Edit"></i>
                                        </a>
                                        <a href="{{ route('unit.delete',$item->id) }}" class="action-icon"
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
@include('backend.unit.script')

@endpush
@endsection