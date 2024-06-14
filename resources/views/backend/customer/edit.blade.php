@extends('admin.layout.master')
@section('title','Edit Customer')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Customer</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- start table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('customer.update') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group  mb-3">
                                        <input type="hidden" name="id" id="id" value="{{ $customers->id }}">
                                        <label for="name" class="form-label">Name</label>
                                        <div class="form-group">
                                            <input type="text"
                                                   class="form-control
                                            @error('name')
                                                is-invalid
                                            @enderror"
                                                   id="name" name="name" value="{{ $customers->name }}">
                                            @error('name')
                                            <spane class="text-danger">
                                                {{ $message }}
                                            </spane>
                                            @enderror
                                        </div>
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
                                                   id="phone" name="phone" value="{{ $customers->phone }}" >
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
                                           @enderror" id="email" name="email" value="{{ $customers->email }}">
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
                                               id="address" name="address" value="{{ $customers->address }}" >
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- row --}}
                                <div class="row">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Default file
                                        input</label>
                                    <input type="file" id="image" name="customer_image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <img src="{{ (!empty($customers->customer_image))? url($customers->customer_image):url('upload/no_image.jpg') }}" alt="image" id="showImage" class="img-fluid avatar-xl rounded-circle">

                                </div>
                                </div>
                                {{--row--}}


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
{{--     container-fluid"  --}}
    </div>
{{--    content--}}









    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    <script src="{{ asset('validate.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    }, 
                    phone: {
                        required : true,
                    },
                     email: {
                        required : true,
                    },
                     address: {
                        required : true,
                    },
                },
                messages :{
                    name: {
                        required : 'Please Enter Your Name',
                    },
                    phone: {
                        required : 'Please Enter Your Mobile Number',
                    },
                    email: {
                        required : 'Please Enter Your Email',
                    },
                    address: {
                        required : 'Please Enter Your Address',
                    },
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>


    @endpush

@endsection
