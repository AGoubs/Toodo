  <li class="nav-item mt-2">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Professeurs</h6>
  </li>
  <li class="nav-item pb-2">
    <a class="nav-link {{ Route::currentRouteName() == 'professor.create' ? 'active' : '' }}" href="{{ route('professor.create') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: .75rem;" class="fas fa-sm fa-user-plus ps-2 pe-2 text-center
                        {{ in_array(
    request()->route()->getName(),
    ['professor.create'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
      </div>
      <span class="nav-link-text ms-1">Ajouter un prof</span>
    </a>
  </li>
  <li class="nav-item">
    <a data-bs-toggle="collapse" href="#professors" class="nav-link collapse {{ Route::currentRouteName() == 'professor.read' ? 'active' : '' }}" aria-controls="professors" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: .80rem;" class="fas fa-sm fa-users ps-2 pe-2 text-center
                        {{ in_array(
    request()->route()->getName(),
    ['professor.read'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
      </div>
      <span class="nav-link-text ms-1">Professeurs </span>
    </a>
    <div class="collapse" id="professors" style="">
      <ul class="nav ms-4 ps-3">
        @if (isset($professors))
          @foreach ($professors as $professor)
            <li class="nav-item ">
              <a class="nav-link " href="{{ route('professor.read', ['professorId' => $professor->id]) }}">
                <span class="sidenav-mini-icon"> D </span>
                <span class="sidenav-normal cut-text"> {{ $professor->firstname }} {{ $professor->lastname }}</span>

              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </li>
