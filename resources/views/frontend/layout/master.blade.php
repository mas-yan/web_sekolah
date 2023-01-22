@inject('about', 'App\Models\About')
@include('frontend.layout.header')
        <!-- Sidebar -->
        {{-- @include('layouts.sidebar')
        <!-- End of Sidebar --> --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="overflow: visible;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('frontend.layout.navbar',['about' => $about])
                <!-- End of Topbar -->

                @yield('content')

                    <div class="mb-5 pb-5"></div>

                </div>
                <!-- /.container-fluid -->

            </div>
            </div>
            <!-- End of Main Content -->

        {{-- </div> --}}

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('frontend.layout.footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3/dist/notiflix-aio-3.2.5.min.js"></script>
  
    @yield('script')

</body>

</html>