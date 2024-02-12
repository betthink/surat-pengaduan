 @extends('public.layouts.containerTable')
 @section('containerTable')
     <div class="row">
         <div class="col">

             @if (session('success'))
                 <script>
                     document.addEventListener('DOMContentLoaded', function() {
                         Swal.fire({
                             title: 'Success!',
                             text: "'{{ session('success') }}'",
                             icon: 'success',
                             position: "top",
                             showConfirmButton: false,
                             timer: 1500
                         });
                     });
                 </script>
             @endif
             <div class="card  mt-5 container mx-5  p-2">

                 <div class="card card-body ">
                     <h1>Profile</h1>
                 </div>
             </div>

         </div>
     </div>
 @endsection
