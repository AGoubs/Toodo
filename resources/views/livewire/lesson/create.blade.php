<div class="container-fluid">
  <div class="page-header min-height-300 border-radius-xl mt-4"
    style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
    <span class="mask bg-gradient-dark opacity-6"></span>
  </div>
  <div class="card card-body blur shadow-blur mx-4 mt-n6">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">

        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            {{ $professor->firstname }} {{ $professor->lastname }}
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            {{ $course->name }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 mx-auto">
      <div class="card card-body mt-4">
        <h6 class="mb-0">Nouvelle leçon</h6>
        <p class="text-sm mb-0">Créer une nouvelle leçon</p>
        <hr class="horizontal dark my-3">
        <label for="lessonName" class="form-label">Nom</label>
        <input type="text" class="form-control" id="lessonName" autofocus>

        <label class="mt-4">Contenu</label>
        <p class="form-text text-muted text-xs ms-1">
          C'est ainsi que vous verrez votre leçon, alors faites-le bien !
        </p>
        <div id="editor" class="ql-container ql-snow">
          <div class="ql-editor" data-gramm="false" contenteditable="true">

          </div>
          <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
          <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank"
              href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com"
              data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
        </div>

        {{-- DROPZONE --}}
        {{-- <label class="mt-4 form-label">Starting Files</label>
        <form action="/file-upload" class="form-control dropzone dz-clickable" id="dropzone">

          <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to
              upload</button></div>
        </form> --}}
        <div class="d-flex justify-content-between mt-4">
          <button type="button" name="button" class="btn btn-light m-0">Retour</button>
          <button type="button" name="button" class="btn bg-gradient-dark m-0 ms-2">Ajouter une leçon</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../../assets/js/plugins/quill.min.js"></script>
<script>
  if (document.getElementById('editor')) {
    var quill = new Quill('#editor', {
      theme: 'snow' // Specify theme in configuration
    });
  }
</script>
