 @if (session()->has('success'))
   <div>
     <div class="toast bg-success text-white" id="toast1" data-delay="100000" style="position: absolute; top: 1rem; right: 1rem; min-width:250px;" aria-live="assertive" aria-atomic="true">
       <div class="toast-body">
         <div class="d-flex mb-1">
           <div class="alert-icon me-1">
             <i class="ni ni-bell-55 mt-1"></i>
           </div>
           <span class="alert-text"><strong>Succès</strong></span>
         </div>
         <span class="text-sm">{{ session()->get('success') }}</span>
       </div>
     </div>
   </div>
 @endif
 <script>
   $(document).ready(function() {
     $('#toast1').toast('show');

     $('#toast1').on('click', function() {
       $('#toast1').toast('hide');
     })
   });
 </script>