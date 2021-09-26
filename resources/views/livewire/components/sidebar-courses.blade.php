<div>
  <li class="nav-item mt-2">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cours</h6>
  </li>
  <li class="nav-item pb-2">
    <a class="nav-link {{ Route::currentRouteName() == 'course.create' ? 'active' : '' }}" href="{{ route('course.create') }}">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: 1rem;" class="fas fa-sm fa-file-medical ps-2 pe-2 text-center {{ in_array(
    request()->route()->getName(),
    ['course.create'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
      </div>
      <span class="nav-link-text ms-1">Ajouter un cours</span>
    </a>
  </li>
  <li class="nav-item">
    <a data-bs-toggle="collapse" href="#courses" class="nav-link collapsed" aria-controls="courses" role="button" aria-expanded="false">
      <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i style="font-size: .70rem;" class="fas fa-sm fa-users ps-2 pe-2 text-center
                        {{ in_array(
    request()->route()->getName(),
    ['professor.create'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
      </div>
      <span class="nav-link-text ms-1">Cours </span>
    </a>
    <div class="collapse" id="courses" style="">
      <ul class="nav ms-4 ps-3">
        @if (isset($courses))
          @foreach ($courses as $course)
            <li class="nav-item ">
              <a class="nav-link " href="{{ route('lesson.view', ['courseId' => $course->id]) }}">
                <span class="sidenav-mini-icon"> D </span>
                <span class="sidenav-normal cut-text"> {{ $course->name }}</span>
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </li>
</div>
