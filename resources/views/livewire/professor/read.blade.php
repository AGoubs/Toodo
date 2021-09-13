<div>
  <div class="container-fluid my-3 py-3 d-flex flex-column">
    <div class="row mb-5 justify-content-center align-items-center">
      <div class="col-9">
        @if (session()->has('success'))
        <div
          class="alert position-absolute top-0 border-0 text-white w-50 end-0 start-0 mt-2 mx-auto py-2 alert-success"
          style=" opacity: 1 !important; transition: all 0.35s ease 0s;" x-data="{ show: true }" x-show="show"
          x-init="setTimeout(() => show = false, 3000)">
          <div class="d-flex mb-1">
            <div class="alert-icon me-1"><i class="ni ni-bell-55 mt-1"></i></div><span
              class="alert-text"><strong>Succès</strong></span>
          </div>
          <span class="text-sm">{{ session()->get('success') }}</span>
        </div>
        @endif

        <!-- Card Profile -->
        <div class="card card-body" id="profile">
          <div class="row justify-content-center align-items-center">
            <div class="col-auto">
              <form wire:submit.prevent="submit">
                <div class="avatar avatar-xl position-relative">
                  <div>
                    <label for="file-input"
                      class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                      <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                        aria-hidden="true" data-bs-original-title="Edit Image" aria-label="Edit Image"></i><span
                        class="sr-only">Edit Image</span>
                    </label>

                    <input type="file" wire:model="photo" id="file-input" accept="image/*" class="d-none">
                    <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                      @livewire('photo.professor', ['professorId' => $professor->id])
                    </span>
                  </div>
                </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  {{ $professor->firstname }}
                  {{ $professor->lastname }}
                </h5>
              </div>
            </div>
            <div class="col-auto ms-auto">
              <button class="btn bg-gradient-danger btn-sm mb-0" type="button"  onclick="confirm('Supprimer ce professeur ?') || event.stopImmediatePropagation()" wire:click="delete({{$professor->id}})">
                Supprimer</button>
            </div>
          </div>
        </div>

        <!-- Card Basic Info -->
        <div class="card mt-4" id="basic-info">
          <div class="card-header">
            <h5>Basic Info</h5>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-6 align-self-center">
                <label class="form-label" for="#firstName">First Name</label>
                <div class="input-group ">
                  <input wire:model="professor.firstname" id="firstName" name="firstName" class="form-control"
                    type="text" placeholder="Robert" required="required">
                  @error('professor.firstname') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
              </div>
              <div class="col-6">
                <label class="form-label" for="#lastName">Last Name</label>
                <div class="input-group ">
                  <input wire:model="professor.lastname" id="lastName" name="lastName" class="form-control" type="text"
                    placeholder="Martin" required="required">
                  @error('professor.lastname') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
              </div>
            </div>
            <div class="">
              <button type=" submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Sauvegarder</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>