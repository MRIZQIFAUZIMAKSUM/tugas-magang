<?= $this->extend('templates/index') ?>
  <!-- Content Wrapper. Contains page content -->
<?= $this->section('content') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php if (session('msg')=='File has been uploaded') : ?>
        <div class="alert alert-info alert-dismissible">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        </div>
    <?php elseif (session('msg')==''): 
else: ?>
        <div class="alert alert-danger alert-dismissible">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        </div>
    <?php endif; ?>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
                <form id="uploadktp" action="<?php echo base_url('/uploadktp');?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

              <div class="card-header">
                <h3 class="card-title">Silahkan pilih menu setting dibawah untuk mengedit profile</h3>
              </div>
              <div class="card-body">
                <div id="actionsktp" class="row">
                  <div class="col-lg-6">
                    <a href="/changepswd">ganti kata sandi </a><br>
                    <a href="/uploadpp">ganti photo profile </a><br>
                    <a href="/uploadktp">upload data diri </a>
                  </div>
                  
                  </div>
                </div>
            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?= $this->endSection()?>
<?= $this->section('myjs') ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNodepp = document.querySelector("#templatepp")
  previewNodepp.id = ""
  var previewTemplatepp = previewNodepp.parentNode.innerHTML
      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNodektp = document.querySelector("#templatektp")
    previewNodektp.id = ""
    var previewTemplatektp = previewNodektp.parentNode.innerHTML
    previewNodektp.parentNode.removeChild(previewNodektp)
 
  previewNodepp.parentNode.removeChild(previewNodepp)
  var myDropzonepp = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/imgprofile", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplatepp,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previewspp", // Define the container to display the previews
    clickable: ".fileinput-buttonpp" // Define the element that should be used as click trigger to select files.
  })
  var myDropzonektp = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/uploadktp", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplatektp,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previewsktp", // Define the container to display the previews
    clickable: ".fileinput-buttonktp" // Define the element that should be used as click trigger to select files.
  })
  myDropzonepp.on("addedfilepp", function(filepp) {
    // Hookup the start button
    filepp.previewElement.querySelector(".startpp").onclick = function() { myDropzonepp.enqueueFile(filepp) }
  })

  // Update the total progress bar
  myDropzonepp.on("totaluploadprogresspp", function(progresspp) {
    document.querySelector("#total-progresspp .progress-barpp").style.width = progresspp + "%"
  })

  myDropzonepp.on("sendingpp", function(filepp) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progresspp").style.opacity = "1"
    // And disable the start button
    filepp.previewElement.querySelector(".startpp").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzonepp.on("queuecompletepp", function(progresspp) {
    document.querySelector("#total-progresspp").style.opacity = "0"
  })

  myDropzonektp.on("addedfilektp", function(filektp) {
    // Hookup the start button
    filektp.previewElement.querySelector(".startktp").onclick = function() { myDropzonektp.enqueueFile(filektp) }
  })

  // Update the total progress bar
  myDropzonektp.on("totaluploadprogress", function(progressktp) {
    document.querySelector("#total-progressktp .progress-barktp").style.width = progressktp + "%"
  })

  myDropzonektp.on("sending", function(filektp) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progressktp").style.opacity = "1"
    // And disable the start button
    filektp.previewElement.querySelector(".startktp").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzonektp.on("queuecomplete", function(progressktp) {
    document.querySelector("#total-progressktp").style.opacity = "0"
  })
  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actionspp .startpp").onclick = function() {
    myDropzonepp.enqueueFiles(myDropzonepp.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actionspp .cancelpp").onclick = function() {
    myDropzonepp.removeAllFiles(true)
  }
  
  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actionsktp .startktp").onclick = function() {
    $('#imgprofile').submit('file',filektp)
    myDropzonektp.enqueueFiles(myDropzonektp.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actionsktp .cancelktp").onclick = function() {
    myDropzonektp.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End

</script>

<?= $this->endSection()?>
