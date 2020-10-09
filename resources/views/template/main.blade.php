<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.header')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    {{-- @include('template.sidebar') --}}
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('template.navbar')
        <!-- End of Topbar -->

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if (Session::has('message'))
          <p class="alert alert-{{ Session::get('class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('template.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  @stack('modals')

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets') }}/vendor/chart.js/Chart.min.js"></script>
  <script src="{{ asset('assets') }}/vendor/chart.js/Chart.min.js"></script>
  <script src="{{ asset('assets') }}/js/app.js"></script>

  <!-- Page level custom scripts -->
  {{-- <script src="{{ asset('assets') }}/js/demo/chart-area-demo.js"></script>
  <script src="{{ asset('assets') }}/js/demo/chart-pie-demo.js"></script> --}}

  <script>
    $(document).on('click', 'button.scroll-to', function(e) {
      var $btn = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($btn.attr('data-position')).offset().top)
      }, 900, 'easeInOutExpo');
      e.preventDefault();
    });

    let template = null;
    $('.modal').on('show.bs.modal', function(event) {
      template = $(this).html();
    });

    $('.modal').on('hidden.bs.modal', function(e) {
      $(this).html(template);
      template = null;
    });

  </script>

  @stack('script')

</body>

</html>
