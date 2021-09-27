<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main" data-color="dark">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
      <img src="../assets/img/logos/books.png" class="navbar-brand-img h-100" alt="..." style="margin-bottom: 2px">
      <span class="ms-1 font-weight-bold">&nbsp;Toodo Application</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item pb-2">
        <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-sm fa-bookmark ps-2 pe-2 text-center
                        {{ in_array(
    request()->route()->getName(),
    ['dashboard'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
          </div>
          <span class="nav-link-text ms-1">Tableau de bord</span>
        </a>
      </li>

      <li class="nav-item pb-2">
        <a class="nav-link {{ Route::currentRouteName() == 'calendar' ? 'active' : '' }}" href="{{ route('calendar') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="far fa-sm fa-calendar-alt ps-2 pe-2 text-center
                        {{ in_array(
    request()->route()->getName(),
    ['calendar'],
)
    ? 'text-white'
    : 'text-dark' }}"></i>
          </div>
          <span class="nav-link-text ms-1">Agenda</span>
        </a>
      </li>

      @livewire('components.sidebar-courses')

      @livewire('components.sidebar-professors')
    </ul>
  </div>
</aside>
