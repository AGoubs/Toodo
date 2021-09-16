<div class="card widget-calendar" wire:ignore>
  <!-- Card header -->
  <div class="card-header pb-0">
    <div class="row">
      <div class="col-lg-12 col-12">
        <h5 class="mb-0">Calendrier</h5>
      </div>
    </div>
  </div>
  <!-- Card body -->
  <div class="card-body p-4">
    <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
  </div>
</div>

<script src="../../../assets/js/plugins/fullcalendar.min.js"></script>
<script src="../../../assets/js/plugins/locales-all.min.js"></script>

<script>
  document.addEventListener('livewire:load', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;
    var calendarEl = document.getElementById('calendar');
    var checkbox = document.getElementById('drop-remove');
    var data = @this.events;
    console.log(@this.events);
    var calendar = new Calendar(calendarEl, {
      height: 550,
      locale: 'fr',
      events: JSON.parse(data),
      eventDisplay: 'block',
      // eventClassNames: 'bg-gradient-primary',
      dateClick(info) {
        var title = prompt('Titre de votre évènement');
        var date = new Date(info.dateStr + 'T00:00:00');
        if (title != null && title != '') {
          var eventAdd = {
            title: title,
            start: date
          };
          let newId = Promise.resolve(@this.addevent(eventAdd));
          newId.then((value) => {
            calendar.addEvent({
              id: value,
              title: title,
              start: date,
              allDay: true
            });
          });


        }
      },
      eventClick: function(info) {
        if (confirm('Voulez supprimer l\'évènement : ' + info.event.title)) {
          @this.deleteEvent(info.event);
          info.event.remove();
        }
      },
      editable: true,
      selectable: true,
      displayEventTime: false,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      },
      eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
      loading: function(isLoading) {
        if (!isLoading) {
          // Reset custom events
          this.getEvents().forEach(function(e) {
            if (e.source === null) {
              e.remove();
            }
          });
        }
      }
    });
    calendar.render();
    @this.on(`refreshCalendar`, () => {
      calendar.refetchEvents()
    });
  });
</script>
{{-- <script>
  var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
    initialView: "dayGridMonth",
    height: 550,
    headerToolbar: {
      start: 'title', // will normally be on the left. if RTL, will be on the right
      center: '',
      end: 'today prev,next' // will normally be on the right. if RTL, will be on the left
    },
    selectable: true,
    editable: true,
    initialDate: '2020-12-01',
    events: [],
    dateClick: function(info) {
      @this.eventReceive(info);
      // alert('Clicked on: ' + info.dateStr);
    },
    views: {
      month: {
        titleFormat: {
          month: "long",
          year: "numeric"
        }
      },
      agendaWeek: {
        titleFormat: {
          month: "long",
          year: "numeric",
          day: "numeric"
        }
      },
      agendaDay: {
        titleFormat: {
          month: "short",
          year: "numeric",
          day: "numeric"
        }
      }
    },
  });

  calendar.setOption('locale', 'fr');
  calendar.render();
</script> --}}
