<div>
  <div class="toast bg-success text-white" id="toast" style="position: absolute; top: 1rem; right: 1.5rem; min-width:250px;z-index:1000">
    <div class="toast-body">
      <div class="d-flex mb-1">
        <div class="alert-icon me-1">
          <i class="ni ni-bell-55 mt-1"></i>
        </div>
        <span class="alert-text"><strong>Succès</strong></span>
      </div>
      <span class="text-sm">{{ $message }}</span>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#toast').toast('show');

    $('#toast').on('click', function() {
      $('#toast').toast('hide');
    })
  });
</script>
