<script>
    @if(Session::has('add_success'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    backdrop: false,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('add_success') }}',  
                });
            
            });    
    @endif
  </script>

<script src="{{ asset('validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 

            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
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

<script>
    @if(Session::has('category_updated'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    backdrop: false,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('category_updated') }}',  
                });
            
            });    
    @endif
</script> 

<script>
    @if(Session::has('add_success'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    backdrop: false,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('add_success') }}',  
                });
            
            });    
    @endif
  </script> 

<script>
    @if(Session::has('delete_success'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    backdrop: false,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('delete_success') }}',  
                });
            
            });    
    @endif
  </script>

<script>
    @if(Session::has('add_success'))
        $(document).ready( function () {
            const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    backdrop: false,
                    });
                Toast.fire({
                icon: "success",
                title: '{{ session('add_success') }}',  
                });
            
            });    
    @endif
  </script> 

<script>
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
    
      
                      Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete This Data?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          window.location.href = link
                        }
                      });
    
    
        });
    
      });
    </script>