<section>
  <div class="page-header section-height-75">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
          <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
              <h3 class="font-weight-bolder text-info text-gradient">{{ __('Bienvenue') }}</h3>
            </div>
            <div class="card-body">
              <form wire:submit.prevent="register" action="#" method="POST" role="form text-left">
                <div class="mb-3">
                  <label for="name">{{ __('Nom') }}</label>
                  <input wire:model="name" type="text" class="form-control  @error('name') border border-danger  @enderror" placeholder="Nom" aria-label="Name" aria-describedby="email-addon">
                  @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                  <label for="email">{{ __('Email') }}</label>
                  <input wire:model="email" type="email" class="form-control  @error('email') border border-danger  @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                  <label for="password">{{ __('Mot de passe') }}</label>
                  <input wire:model="password" type="password" class="form-control  @error('password') border border-danger  @enderror" placeholder="Mot de passe" aria-label="Password" aria-describedby="password-addon">
                  @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Créer un compte') }}</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              {{-- <small class="text-muted">{{ __('Mot de passe oublié ? Réinitilisez votre mot de passe') }} <a href="{{ route('forgot-password') }}" class="text-info text-gradient font-weight-bold">{{ __('ici') }}</a></small> --}}
              <p class="mb-4 text-sm mx-auto">
                {{ __(' Déjà un compte ?') }}
                <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">{{ __('Se connecter') }}</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
