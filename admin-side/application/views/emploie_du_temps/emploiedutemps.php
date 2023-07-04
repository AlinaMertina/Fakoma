<?php
  // Décodez la chaîne JSON en un tableau PHP
  $huhu = "Aroooooo";
  if(isset($jsonString)){
    $data = json_decode($jsonString, true);
  }
?>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendrier</title>

 <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()."assets/plugins/fontawesome-free/css/all.min.css"?>">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?= base_url()."assets/plugins/fullcalendar/main.css"?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()."assets/dist/css/adminlte1.css"?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
               
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <form id="formulaire" method="post">
                    <div class="input-group">
                      <input id="new-event"  type="text" name="evenement" class="form-control" placeholder="Event Title">
                      <div class="input-group-append">
                        <!-- <button id="add-new-event" type="button" class="btn btn-primary">Add</button> -->
                        <input id="add-new-event" class="btn btn-primary" type="submit" value="Add">
                      </div>
                      <!-- /btn-group -->
                    </div>
                  </form>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url("assets/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url("assests/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- jQuery UI -->
<script src="<?= base_url("assests/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assests/dist/js/adminlte.min.js")?>"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?= base_url("assets/plugins/moment/moment.min.js")?>"></script>
<script src="<?= base_url("assets/plugins/fullcalendar/main.js")?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets/dist/js/demo.js")?>"></script>
<!-- Page specific script -->
<script>
  // function dragAndDrop(variable){

  // }
  function convertRgbToHex(rgb) {
    // Récupérer les valeurs numériques de chaque composante
    var valeurs = rgb.match(/\d+/g);
    var rouge = parseInt(valeurs[0]);
    var vert = parseInt(valeurs[1]);
    var bleu = parseInt(valeurs[2]);
    // Convertir les valeurs en format hexadécimal
    var hex = "#" + ((rouge << 16) | (vert << 8) | bleu).toString(16).padStart(6, '0');
    return hex;
  }
  var table = <?php echo json_encode($table); ?>;
  $(function () {
    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)
      })
    }
    ini_events($('#external-events div.external-event'))
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),m = date.getMonth(), y = date.getFullYear();
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;
    var containerEl = document.getElementById('external-events');
    var calendarEl = document.getElementById('calendar');
    // initialize the external events
    // -----------------------------------------------------------------
    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });
    var color = '#3c8dbc'; 
    var count = 0;
    var events1 = [];
    for (var i = 0; i <table.length ; i++) {
      var eventDate = new Date(table[i]['daterdv']);
      var event = {
        title: table[i]['evenement'],
        start: eventDate,
        backgroundColor: table[i]['faisabilite'],
        borderColor: table[i]['faisabilite'],
        allDay: false,
        publicId:table[i]['idemploiedutemp']
      };
      events1.push(event);
    }
    var calendar = new Calendar(calendarEl, {
      eventReceive: function(info) {
        var droppedEvent = info.event;
        var evenementDate = droppedEvent.start;
        // console.log(info);
        var formData = new FormData();
        formData.append('evenement',info.event._def.title);
        formData.append('daterdv',evenementDate);
        formData.append('faisabilite',color);
        console.log(formData);
        var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              // Réponse du serveur
              var response = xhr.responseText;
              console.log(response); // Afficher la réponse dans la console
              // Faire d'autres manipulations ou afficher un message de succès ici
            }
          }
        // Ouvrir la requête AJAX
        xhr.open('POST', 'CT_emploie_du_temp/insert/', true);
        // Envoyer la requête AJAX avec les données du formulaire
        xhr.send(formData);
      },
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: events1,
      eventDidMount: function(info) {
      // Event listener for default events
        var event = info.event;
        count++;
        if(count > events1.length){
          console.log('Default event:', event.title);
          var droppedEvent = info.event;
          var evenementDate = droppedEvent.start;
          console.log(info.event._def.extendedProps.publicId);
          var formData = new FormData();
          formData.append('idEvenement',info.event._def.extendedProps.publicId);
          formData.append('daterdv',evenementDate);
          var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                // Réponse du serveur
                var response = xhr.responseText;
              }
            }
          // Ouvrir la requête AJAX
          xhr.open('POST', 'CT_emploie_du_temp/update', true);
          // Envoyer la requête AJAX avec les données du formulaire
          xhr.send(formData);
        }
      },
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
 
    });
    calendar.render();
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
      var couleurRgb = currColor;
      var couleurHex = convertRgbToHex(couleurRgb);
      color = couleurHex;
      console.log(couleurHex);
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault();
      // Get value and make sure it is not null
      var val = $('#new-event').val();
      if (val.length == 0) {
          return;
      }
      // Create events
      var event = $('<div />');
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event');
        event.text(val);
      $('#external-events').prepend(event);
      // Add draggable funtionality
      ini_events(event);
      // Get the date of the event
      var date = calendar.getDate(); // Get the current date of the calendar
      var eventDate = date.toISOString(); // Convert the date to ISO format
    })
})

</script>
</body>
</html>
