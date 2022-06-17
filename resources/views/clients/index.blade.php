@include('clients.layout.header')
        <!-- Sidebar -->
        {{-- @include('layouts.sidebar')
        <!-- End of Sidebar --> --}}

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="overflow: visible;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('clients.layout.navbar')
                <!-- End of Topbar -->

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="https://source.unsplash.com/random/200x70?sig=1" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="https://source.unsplash.com/random/200x70?sig=2" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="https://source.unsplash.com/random/200x70?sig=3" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev border-0 bg-transparent" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </button>
                      <button class="carousel-control-next border-0 bg-transparent" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </button>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="mt-3"></div>
                    

                    {{-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> --}}
                    @for ($i = 0; $i < 10; $i++)
                    <div class="card">
                      <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque vitae dicta molestiae aperiam, officia ea necessitatibus consectetur cupiditate nam placeat iste aut praesentium dolorum repudiandae quas quam, voluptatibus, consequuntur error beatae debitis cum harum doloremque possimus modi! Necessitatibus distinctio sint saepe alias vero natus ducimus nam mollitia totam sunt vel quisquam quo, inventore voluptates eos illum nihil deleniti consequuntur corrupti aut. Quis error inventore ipsam soluta deleniti rerum non commodi vero eum dignissimos quo amet incidunt, molestiae animi eius ut cupiditate aliquid repellat veritatis repellendus similique, consectetur nam. Earum, praesentium cum ducimus excepturi tempore doloribus placeat cupiditate voluptatem hic in!
                      </div>
                    </div>
                    @endfor

                    <div class="mb-5 pb-5"></div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingni Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout untuk mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

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