<div>
  <div class="container-fluid py-1">
    <div class="row">
      <div class="col-12 col-lg-12 mx-auto">
        <div class="card card-body mt-4" x-data="{ open: true }">
          <form wire:submit.prevent="update">
            <div class="d-flex flex-row justify-content-between">
              <div>
                <h6 class="mb-0">Modifier la leçon</h6>
              </div>
              <div>
                <button class="btn btn-sm mb-0" type="button" x-on:click="open = ! open" x-html="open ? `<i class='fas fa-expand' style='font-size: .80rem'></i>`: `<i class='fas fa-compress' style='font-size: .80rem'></i>`"></button>
                <button class="btn bg-gradient-danger btn-sm mb-0" type="button"
                  onclick="confirm('Supprimer cette leçon ?') || event.stopImmediatePropagation()"
                  wire:click="delete({{ $lessonId }})">
                  Supprimer</button>
              </div>
            </div>
            <div class="fullscreen-hidden" x-show="open" x-transition>
              <p class="text-sm mb-0">Créer une nouvelle leçon</p>
              <hr class="horizontal dark my-3">
              <label for="lessonName" class="form-label">Nom</label>
              <input type="text" class="form-control" id="lessonName" wire:model.defer="name" required autofocus
                wire:keydown="updateComponent()">
              <label class="mt-4">Contenu</label>
            </div>
            <p class="form-text text-muted text-xs ms-1" x-data>
              <span x-html="$wire.updated"></span>
            </p>
            <div id="editor" class="ql-container ql-snow" wire:ignore wire:keydown="updateComponent()">
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
