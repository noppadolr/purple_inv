@extends('admin.layout.master')
@section('title','Add Product')
@section('content')
@push('styles')


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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add New Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- start table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" id="myForm" action="{{ route('product.store') }}">
                            @csrf


                            <div class="row">
                                <div class="form-group  mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control
                                        @error('name')
                                            is-invalid
                                        @enderror" id="name" name="name">
                                    {{-- @error('name')
                                    <spane class="text-danger">
                                        {{ $message }}
                                    </spane>
                                    @enderror --}}
                                </div>
                            </div>
                            {{-- row --}}

                            {{-- row begin --}}
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <h4 class="header-title">Unit</h4>
                                    <select class="form-select form-control @error('unit_id')
                                          is-invalid
                                      @enderror" name="unit_id" id="test">
                                        <option selected="" value="">Open this select menu</option>
                                        @foreach ($unit as $u)
                                        <option class="form-select" value="{{ $u->id }}">
                                            {{ $u->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('unit_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror



                                </div>
                                <div class="form-group  col-md-9">
                                    <h4 class="header-title">Supplier</h4>
                                    <select class="form-select form-control @error('supplier_id')
                                          is-invalid
                                      @enderror" name="supplier_id" id="test">
                                        <option selected="" value="">Open this select menu</option>
                                        @foreach ($supplier as $s)
                                        <option class="form-select" value="{{ $s->id }}">
                                            {{ $s->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('supplier_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- row end --}}

                            {{-- row begin --}}
                            <div class="row mb-3">
                                <div class="form-group  col-md-12">
                                    <h4 class="header-title">Category</h4>
                                    <select class="form-select form-control @error('category_id')
                                          is-invalid
                                      @enderror" name="category_id" id="test">
                                        <option selected="" value="">Open this select menu</option>
                                        @foreach ($category as $c)
                                        <option class="form-select" value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- row end --}}
                            <button class="btn btn-primary" type="submit">
                                <i class="mdi mdi-content-save" title="Edit"></i>
                                Save
                            </button>
                        </form>

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
<!-- Plugin js-->
<script src="{{ asset('backend/assets/libs/parsleyjs/parsley.min.js') }}"></script>

<!-- Validation init js-->
<script src="{{ asset('backend/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('validate.min.js') }}"></script>

@include('backend.product.script')

@endpush
@endsection