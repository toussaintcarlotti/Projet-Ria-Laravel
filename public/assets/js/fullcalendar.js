// sample calendar events data

var calendarEl = document.getElementById('fullcalendar');

var curYear = moment().format('YYYY');
var curMonth = moment().format('MM');

// Calendar Event Source
var calendarEvents = {
    id: 1,
    backgroundColor: 'rgba(1,104,250,0.45)',
    borderColor: '#0168fa',
    events: events
};

// initialize the calendar
var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
        left: "prev,today,next",
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    buttonText: {
        today:    'Aujourd\'hui',
        month:    'Mois',
        week:     'Semaine',
        day:      'Jour',
        list:     'Liste'
    },
    editable: false,
    droppable: false, // this allows things to be dropped onto the calendar
    fixedWeekCount: true,
    // height: 300,
    initialView: 'dayGridMonth',
    timeZone: 'UTC',
    locale: 'fr',
    hiddenDays: [],
    navLinks: 'true',
    // weekNumbers: true,
    // weekNumberFormat: {
    //   week:'numeric',
    // },
    dayMaxEvents: 2,
    events: [],
    eventSources: [calendarEvents],
    drop: function (info) {
        // remove the element from the "Draggable Events" list
        // info.draggedEl.parentNode.removeChild(info.draggedEl);
    },
    eventClick: function (info) {
        var eventObj = info.event;
        $('#modalTitle1').html(eventObj.title);
        $('#modalBody1').html(eventObj._def.extendedProps.description);
        $('#eventUrl').attr('href', eventObj.url);
        $('#fullCalModal').modal("show");
    },
    dateClick: function (info) {
        $("#createEventModal").modal("show");
    },

});
calendar.render();

