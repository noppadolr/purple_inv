@extends('admin.layout.master')
@section('title','Create Unit')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Unit</a></li>
                                <li class="breadcrumb-item active">Add</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add New Unit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- start table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('unit.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text"
                                        class="form-control
                                        @error('name')
                                            is-invalid
                                        @enderror"
                                        id="name" name="name" >
                                        @error('name')
                                            <spane class="text-danger">
                                                {{ $message }}
                                            </spane>
                                        @enderror
                                    </div>
                                </div>
                                {{-- row --}}





                                <button class="btn btn-primary" type="submit">
                                    <i class="mdi mdi-content-save"  title="Edit"></i>
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

@endpush
@endsection
