<div>
  <i
    class="fa fa-user me-sm-1 {{ in_array(
    request()->route()->getName(),
    ['profile', 'my-profile', 'lesson.view'],
)
    ? 'text-white'
    : '' }}"></i>
  <span
    class="d-sm-inline d-none {{ in_array(
    request()->route()->getName(),
    ['profile', 'my-profile', 'lesson.view'],
)
    ? 'text-white'
    : '' }}"
    wire:click="logout">Déconnexion</span>
</div>
