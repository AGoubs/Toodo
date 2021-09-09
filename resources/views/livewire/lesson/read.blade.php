<div>
  <div class="container-fluid py-1">
    <div class="row">
      <div class="col-12 mx-auto">
        <div class="card card-body mt-4">
          <form wire:submit.prevent="update">
            <h6 class="mb-0">Nouvelle leçon</h6>
            <p class="text-sm mb-0">Créer une nouvelle leçon</p>
            <hr class="horizontal dark my-3">
            <label for="lessonName" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lessonName" wire:model="name" required autofocus>
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
                  data-video="Embed URL" required><a class="ql-action"></a><a class="ql-remove"></a></div>
            </div>
            <input type="hidden" name="content" id="content" wire:model="content">

            <div class="d-flex justify-content-between mt-4">
              <a href="{{ route('lesson.view', ['courseId' => $course->id]) }}" class="btn btn-light m-0"
                type="button">Retour</a>
              <button type="submit" id="btn-submit" name="button" class="btn bg-gradient-dark m-0 ms-2">Modifier la
                leçon</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../../assets/js/plugins/quill.min.js"></script>
<script>
  var quill = new Quill('#editor', {
    theme: 'snow' // Specify theme in configuration
  });

  document.addEventListener('livewire:load', function() {
    var someValue = @this.content;
    quill.clipboard.dangerouslyPasteHTML(someValue);
    // quill.setText(someValue);
  });
  // $('.ql-toolbar *').each(function(i) {
  //   $(this).attr('tabindex', -1);
  // });

  $('#btn-submit').on('click', () => {
    // Get HTML content
    var html = quill.root.innerHTML;

    @this.content = html;
    // Copy HTML content in hidden form
    // $('#content').val(html)
  })
</script>
