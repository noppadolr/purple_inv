@extends('admin.layout.master')
@section('title','Edit Supplier')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Supplier</h4>
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
                                <div class="col-sm-12" >
                                    <a  href="{{ route('supplier.all') }}" 
                                        class="button btn btn-primary waves-effect waves-light" 
                                        style="float: right;">
                                        <i class="mdi mdi-arrow-left-bold-outline me-1"></i>  
                                        Back
                                    </a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('supplier.update') }}">
                                @csrf
                                <input type="hidden" name="find_id" id="find_id" value="{{ $suppliers->id }}">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" 
                                        class="form-control 
                                        @error('name')
                                            is-invalid
                                        @enderror" 
                                        id="name" name="name" value="{{ $suppliers->name }}">
                                        @error('name')
                                            <spane class="text-danger">
                                                {{ $message }}
                                            </spane>
                                        @enderror
                                    </div>
                                </div>
                                {{-- row --}}

                                <div class="row">
                                    <div class="col md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" 
                                            class="form-control                                         
                                            @error('phone')
                                             is-invalid
                                            @enderror" 
                                            id="phone" name="phone" value="{{ $suppliers->phone }}" >
                                            @error('phone')
                                            <spane class="text-danger">
                                                {{ $message }}
                                            </spane>
                                        @enderror
                                        </div>
                                    </div>
                                    {{-- col --}}
                                    <div class="col md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control                                            
                                             @error('email')
                                            is-invalid
                                           @enderror" id="email" name="email" value="{{ $suppliers->email }}" >
                                           @error('email')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                        </div>
                                    </div>
                                    {{-- col --}}
                                </div>
                                {{-- row --}}
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" 
                                        class="form-control
                                        @error('address')
                                            is-invalid
                                        @enderror" 
                                        id="address" name="address" value="{{ $suppliers->address }}" >
                                        @error('address')
                                           <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                                {{-- row --}}


                                <button class="btn btn-primary" type="submit">
                                    <i class="mdi mdi-content-save"  title="Edit"></i>
                                    Update
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
    
@endpush
@endsection