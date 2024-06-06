@extends('admin.layout.master')
@section('title','')
@section('content')
@push('styles')

@endpush
<div class="content">

    {{-- header --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    {{-- end header --}}
    {{-- body --}}
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ url($adminData->avatar) }}"class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">

                    <h4 class="mb-0">{{ $adminData->name }}</h4>
                    <p class="text-muted">{{ $adminData->email }}</p>



                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>

                        <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2">{{
                                $adminData->name }}</span></p>
                        <p class="text-muted mb-2 font-13"><strong>User Name :</strong> <span class="ms-2">{{
                                $adminData->username }}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{
                                $adminData->phone }}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{
                                $adminData->email }}</span></p>

                        {{-- <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p> --}}
                    </div>


                </div>
            </div> <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Change Password</h4>
                <form action="{{ route('admin.password.update') }}" method="POST" >
                    @csrf
                    <div class="mb-2">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" id="current_password" name="current_password" 
                        class="form-control @error('current_password')  is-invalid @enderror">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" 
                        class="form-control @error('password')  is-invalid @enderror">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label">Comfirm New Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="form-control @error('password_confirmation')  is-invalid @enderror">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>                            
                        @enderror
                    </div>
                    <button class="btn btn-warning">Update Password</button>
                </form>

                </div>
            </div> <!-- end card-->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Edit Profile</h4>
                <form class="needs-validation" method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input  
                                type="text" id="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ $adminData->name }}"
                        >
                        {{-- input --}}
                        @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input  type="text" 
                                id="username" 
                                class="form-control @error('username') is-invalid @enderror" 
                                name="username"
                                value="{{ $adminData->username }}"
                                >
                                {{-- input --}}

                        @error('username')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input  type="text" 
                                id="phone" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                name="phone"
                                value="{{ $adminData->phone }}"
                                >
                                {{-- input --}}

                        @error('phone')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input  type="email" 
                                id="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email"
                                value="{{ $adminData->email }}"
                                >
                                {{-- input --}}

                        @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Default file
                            input</label>
                        <input type="file" id="image" name="avatar" class="form-control">
                    </div>
                    <div class="mb-3">
                        <img src="{{ url($adminData->avatar) }}" alt="image" id="showImage" class="img-fluid avatar-xl rounded-circle">

                    </div>
                    <div class="">
                        <button class="btn btn-primary" style="display: flex;float: right;">Update Profile</button>
                    </div>
                </form>



                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        {{-- end body --}}




    </div>
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

    @endpush
    @endsection