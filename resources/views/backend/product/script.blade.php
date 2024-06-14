<script>
    @if(Session::has('added'))
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
                title: '{{ session('added') }}',  
                });
            
            });    
    @endif
  </script>

<script>
    @if(Session::has('updated'))
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
                title: '{{ session('updated') }}',  
                });
            
            });    
    @endif
</script>

<script>
    @if(Session::has('deleted'))
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
                title: '{{ session('deleted') }}',  
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