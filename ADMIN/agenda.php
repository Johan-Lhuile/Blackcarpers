<?php
session_start();
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php'; 

?>

<script src='../INCLUDES/fullCalendar/packages/core/index.global.min.js'></script>
<script src='../INCLUDES/fullCalendar/packages/daygrid/index.global.min.js'></script>
<script src='../INCLUDES/fullCalendar/packages/timegrid/index.global.js'></script>
<script src='../INCLUDES/fullCalendar/packages/list/index.global.js'></script>
<script src='../INCLUDES/fullCalendar/packages/google-calendar/index.global.js'></script>
<script src='../INCLUDES/fullCalendar/packages/interaction/index.global.js'></script>
<script>

let evenement = [{
  'title': 'fait chier',
  'start': '2023-10-06',
  'end': '2023-10-08'
}]
  window.onload = () => {
    let calendarEl = document.getElementById('calendar')

          let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,list'
            },
            buttonText: {
              today: 'Aujourd\'hui',
              month: 'Mois',
              week: 'Semaine',
              list: 'Liste'
            },
            events: evenement,
            nowIndicator: true,
            editable: true
          })
          calendar.render()
        }
      
</script>

<style>
  #calendar {
    height: 70vh;
    width: 60vh;
    margin: 50px auto;
    color: white;
  }
</style>

<body>
  <div id='calendar'></div>

</body>

</html>
