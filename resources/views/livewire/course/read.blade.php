<div>
  <div class="container-fluid py-1">
    <div class="row">
      <div class="col-lg-8 col-md-12 mx-auto">
        <div class="card card-body mt-4">
          <form wire:submit.prevent="update">
            <h6 class="mb-0">Nouveau cours</h6>
            <p class="text-sm mb-0">Créer un nouveau cours</p>
            <hr class="horizontal dark my-3">
            <div class="row">
              <div class="col-12">
                <label for="courseName" class="form-label">Nom</label>
                <input type="text" class="form-control" id="courseName" wire:model="course.name" required autofocus>
              </div>
            </div>
            <div class="row my-4">
              <div wire:ignore class="col-8">
                <label class="form-label">Professeur</label>
                <select wire:model="course.professor_id" class="form-control" aria-label="Professor select"
                  id="choices-professor">
                  <option value="{{$courseProfessor->id}}">{{$courseProfessor->firstname}} {{$courseProfessor->lastname}}</option>
                  @foreach ($professors as $professor)
                  @if ($professor->id != $courseProfessor->id )
                    <option value="{{$professor->id}}">{{$professor->firstname}} {{$professor->lastname}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="col-4">
                <label class="form-label">&nbsp;</label><br>
                <a href="{{ route('professor.create') }}" class="btn bg-gradient-dark btn-md"
                type="button">+</a>
              </div>

            </div>

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('dashboard') }}" class="btn btn-light m-0" type="button">Retour</a>
              <button type="submit" id="btn-submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Modifier le cours</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../../assets/js/plugins/choices.min.js"></script>

<script>
  if (document.getElementById('choices-professor')) {
        var professor = document.getElementById('choices-professor');
        const example = new Choices(professor);
    }
</script>