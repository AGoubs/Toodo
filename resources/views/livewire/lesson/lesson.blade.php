<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-dark opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
          <a href="javascript:;"
            class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
          </a>
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            {{ $professor->firstname }} {{ $professor->lastname }}
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            {{ $course->name }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="card">
    <!-- Card header -->
    <div class="card-header" style="padding-bottom: 0 !important">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Liste des cours</h5>
        </div>
        <a href="https://soft-ui-dashboard-pro-laravel.creative-tim.com/laravel-new-role"
          class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp; Ajouter</a>
      </div>
      <p class="text-sm mb-0">
        {{ $course->name }}
      </p>
    </div>
    <div class="table-responsive">
      <table class="table table-flush" id="datatable-search">
        <thead class="thead-light">
          <tr>
            <th>Nom</th>
            <th>Contenu</th>
            <th>Date</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nom</th>
            <th>Contenu</th>
            <th>Date</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach ($lessons as $lesson)
            <tr>
              <td class="text-sm font-weight-normal text-justify">{{ $lesson->name }}</td>
              <td class="text-sm font-weight-normal text-justify">{{ $lesson->content }}</td>
              <td class="text-sm font-weight-normal">{{ date('d/m/Y', strtotime($lesson->created_at)) }}</td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="../../assets/js/plugins/datatables.js"></script>

<script>
  const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    searchable: true,
    fixedHeight: true
  });
</script>
