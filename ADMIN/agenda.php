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
  window.onload = () => {
    let calendarEl = document.getElementById('calendar')

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {

          let evenements = JSON.parse(xmlhttp.responseText)

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
            events: evenements,
            nowIndicator: true,
            editable: true
          })
          calendar.render()
        }

      }
    }
    xmlhttp.open('get', 'http://localhost/blackcarpers/ADMIN/CRUD/getAgenda.php', true);
    xmlhttp.send(null);
  }
</script>

<style>
  #calendar {
    height: 80vh;
    width: 50vw;
    margin: 50px auto;
    color: white;
  }
</style>

<body>
  <div id='calendar'></div>

</body>

</html>