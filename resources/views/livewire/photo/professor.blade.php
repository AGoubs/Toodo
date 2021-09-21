<div>

  @if (isset($professor))
    @if (isset($size))
      @if (isset($professor->photo))
        <a href="{{ route('professor.read', ['professorId' => $professor->id]) }}" class="avatar avatar-{{ $size }} rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $professor->firstname }} {{ $professor->lastname }}">
        @else
          <a href="" class="avatar avatar-{{ $size }} rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $professor->firstname }} {{ $professor->lastname }}">
      @endif
    @endif

    @if (isset($professor->photo) && file_exists(public_path('storage/photos/' . $professor->photo)))
      <img src="{{ asset('storage/photos/' . $professor->photo) }}" alt="profile picture" class="w-100 border-radius-lg shadow-sm">
    @else
      <img src="../assets/img/user-placeholder.png" alt="..." class="w-100 border-radius-lg shadow-sm">
    @endif

    @if (isset($size))
      </a>
    @endif
  @endif

</div>
