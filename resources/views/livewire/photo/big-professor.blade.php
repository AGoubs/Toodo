<div>
  @if (isset($photo) && file_exists(public_path('storage/photos/' . $photo)))
    <img src="{{ asset('storage/photos/' . $photo) }}" alt="profile picture" class="w-100 border-radius-lg shadow-sm">

  @else
    <img src="../assets/img/user-placeholder.png" alt="..." class="w-100 border-radius-lg shadow-sm">
  @endif
</div>
