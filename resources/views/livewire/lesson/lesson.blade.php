<div>
  <div class="container-fluid">
    <div class="page-header min-height-250 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
      <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @if (isset($professor->id))
              @livewire('photo.professor', ['professorId' => $professor->id])
            @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              @if (isset($professor->id))
                <a href="{{ route('professor.read', ['professorId' => $professor->id]) }}">
                  {{ $professor->firstname }} {{ $professor->lastname }}</a>
              @endif
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              <a href="{{ route('course.read', ['courseId' => $course->id]) }}">
                {{ $course->name }}</a>

            </p>
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
              <h5 class="mb-0">Liste des leçons</h5>
            </div>
            <a href="{{ route('lesson.create', ['courseId' => $course->id]) }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
              Ajouter</a>
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
                <th>Date Création</th>
                <th>Dernière Modification</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nom</th>
                <th>Date Création</th>
                <th>Dernière Modification</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($lessons as $lesson)
                <tr wire:key="{{ $lesson->id }}" wire:click="lessonRead({{ $lesson->id }})" class="clickable_row">
                  <td class=" text-sm font-weight-normal text-justify">{{ $lesson->name }}</td>
                  <td class="text-sm font-weight-normal text-justify" style="display: none;"> {{ $lesson->content }} </td>
                  <td class="text-sm font-weight-normal">{{ date('d/m/Y', strtotime($lesson->created_at)) }}</td>
                  <td class="text-sm font-weight-normal">{{ date('d/m/Y', strtotime($lesson->updated_at)) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="../../assets/js/plugins/datatables.js"></script>
  <script src="https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"></script>
  <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true,
      perPage: 25,
    });
  </script>
