<script>
    @if(Session::has('add-unit-success'))
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
                title: '{{ session('add-unit-success') }}',  
                });
            
            });    
    @endif
  </script>

<script>
    @if(Session::has('unit_updated'))
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
                title: '{{ session('unit_updated') }}',  
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