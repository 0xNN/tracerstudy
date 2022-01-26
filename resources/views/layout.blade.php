
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TRACER STUDY</title>


  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.5.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/jajaxloader.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/spiral.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/colordots.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/flipping_square.css') }}">
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/spinning_square.css') }}">
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/thecube.css') }}">
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/ventilator.css') }}">
  <link rel="stylesheet" href="{{ asset('jajaxloader/skin/cssload/zenith.css') }}"> --}}


  @yield('css')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('utama.sidebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('utama.header')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         @yield('konten')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     @include('utama.footer')
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js" defer></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js" defer></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous" defer></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous" defer></script>
  {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js" defer></script> --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous" defer></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous" defer></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
   <script src="assets/vendor/datatables/jquery.dataTables.min.js" defer></script>
   <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js" defer></script>
   <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.5.min.js"></script>
   {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
       integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
       integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
       <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" defer></script>
       <script type="text/javascript"  language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" defer></script>
       <script type="text/javascript"  language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
       <script type="text/javascript"  language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" defer></script>
       <script type="text/javascript" language="javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js" defer></script>
       <script type="text/javascript"  language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/4.6.3/papaparse.min.js" defer></script>
       <script type="text/javascript"  language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" defer></script>

       <script src="{{ asset('jajaxloader/js/jajaxloader.js') }}"></script>
       {{-- <script src="{{ asset('jajaxloader/skin/cssload/spiral.js') }}"></script> --}}
       <script src="{{ asset('jajaxloader/skin/cssload/colordots.js') }}"></script>
       {{-- <script src="{{ asset('jajaxloader/skin/cssload/flipping_square.js') }}"></script>
       <script src="{{ asset('jajaxloader/skin/cssload/spinning_square.js') }}"></script>
       <script src="{{ asset('jajaxloader/skin/cssload/thecube.js') }}"></script>
       <script src="{{ asset('jajaxloader/skin/cssload/ventilator.js') }}"></script>
       <script src="{{ asset('jajaxloader/skin/cssload/zenith.js') }}"></script> --}}
       
       @yield('js')
       {{-- <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.5.min.js"></script> --}}
       @yield('grid')

</body>

</html>
