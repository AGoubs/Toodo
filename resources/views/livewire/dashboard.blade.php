<main>
  @if (session()->has('success'))
    @livewire('components.alert', ['message' => session()->get('success')])
  @endif
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-7 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="d-flex flex-row justify-content-between">
                  <div>
                    <h5 class="mb-0">Cours</h5>
                  </div>
                  <a href="{{ route('course.create') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
                    Ajouter</a>
                </div>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">{{ $nbCourses }} cours</span> cette année
                </p>
              </div>

            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Cours</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Professeur</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($courses as $course)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            {{-- <img src="../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3"> --}}
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                              <a href="{{ route('lesson.view', ['courseId' => $course->id]) }}">{{ $course->name }}</a>
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group">
                          @livewire('photo.professor', ['professorId' => $course->professor_id, 'size' => 'xs'])
                        </div>
                      </td>
                      <td class="text-sm font-weight-bold text-center">
                        <span class="my-2 text-sm"><a href="{{ route('course.read', ['courseId' => $course->id]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editer">
                            <i class="fas fa-edit text-secondary" aria-hidden="true"></i>
                          </a>
                          <span>
                            <i onclick="confirm('Voulez-vous supprimer ce cours ?') || event.stopImmediatePropagation()" wire:click="deleteCourse({{ $course->id }})" class="cursor-pointer fas fa-trash text-secondary" data-bs-toggle="tooltip" data-bs-original-title="Supprimer" aria-hidden="true"></i>
                          </span></span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-6">
        <div class="card bg-gradient-dark h-100">
          <div class="card-header bg-transparent pb-0">
            <h6 class="text-white">Dernières leçons publiées</h6>
            <p class="text-sm">
              <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
              <span class="font-weight-bold">{{ $nbLessons }}</span> leçons
            </p>
          </div>
          <div class="card-body p-3">
            <div class="timeline timeline-one-side">
              @foreach ($lessons as $lesson)
                <div class="timeline-block mb-3">
                  <span class="timeline-step bg-dark">
                    <i class="ni ni-book-bookmark text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-white text-sm font-weight-bold mb-0">
                      <a href="{{ route('lesson.read', ['lessonId' => $lesson->id, 'courseId' => $lesson->course_id]) }}" style="color: white">
                        {{ $lesson->name }}</a>
                    </h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                      {{ strtoupper(date('d M h:m', strtotime($lesson->created_at))) }}</p>
                  </div>
                </div>
              @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-md-12 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="d-flex flex-row justify-content-between">
                  <div>
                    <h5 class="mb-0">Professeurs</h5>
                  </div>
                  <a href="{{ route('professor.create') }}" class="btn bg-gradient-dark btn-sm mb-0" type="button">+&nbsp;
                    Ajouter</a>
                </div>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">{{ $nbProfessors }} profs</span> cette année
                </p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Nom Prénom</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Photo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($professors as $professor)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            {{-- <img src="../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3"> --}}
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                              <a href="{{ route('professor.read', ['professorId' => $professor->id]) }}">{{ $professor->firstname }}
                                {{ $professor->lastname }}</a>
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group">
                          @livewire('photo.professor', ['professorId' => $professor->id, 'size' => 'sm'])
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        @livewire('components.calendar', ['height' => 550])
      </div>

    </div>
</main>
