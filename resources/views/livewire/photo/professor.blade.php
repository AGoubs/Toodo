<div>
  @if (isset($professor->photo))

    @if (isset($size))
      <a href="{{ route('professor.read', ['professorId' => $professor->id]) }}" class="avatar avatar-{{ $size }} rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $professor->firstname }} {{ $professor->lastname }}">
    @endif

    @if (file_exists(public_path('storage/photos/' . $professor->photo)))
      <img src="{{ asset('storage/photos/' . $professor->photo) }}" alt="profile picture" class="w-100 border-radius-lg shadow-sm">
    @else
      <img src="../assets/img/user-placeholder.png" alt="..." class="w-100 border-radius-lg shadow-sm">
    @endif

    @if (isset($size))
      </a>
    @endif
  @endif

</div>
