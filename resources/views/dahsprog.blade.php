<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    @include('header.headDashboard')
</head>

<body style="height: 100%;">
    @include('header.headerDashboard')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile_panti">
                                <span data-feather="users"></span>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/profile_panti">
                                <img src="https://img.icons8.com/ios/20/000000/activity-feed.png" />
                                Program <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 bg-light" style=" ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Program Panti Kamu</h1>

                </div>

                <main role="main" class="">
                    <div class="container col-lg-12 ">
                        <div class="row">
                            @foreach ($program as $program)
                            <div class="col-md-4" style="width: 380px; padding-left: 0em">
                                <div class="card mb-4 box-shadow" style="min-height: 565px; width: 380px; ">
                                    <img class="card-img-top" src="{{ asset('upload/panti/program/' . $program->photo_program) }}" alt="Card image cap" style="height: 200px; background-position: center center; background-repeat: no-repeat;">
                                    <div class="card-body">
                                        <h4 style="margin-bottom: 0em">{{ $program->judul }}</h4>
                                        <p class="card-text">{!! substr($program->deskripsi_program,0, 100)!!}</p>
                                        <p class="card-text"> Program ini Membutuhkan Dana Sebesar <b> Rp.{{$program->biaya}} </b></p>
                                        <div class="d-flex justify-content-between align-items-left">
                                            <div class="btn-group">
                                                <a href="{{route('edit_program', $program->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
        </div>

    </div>

   

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('upload_photo') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <input name="photo" type="file" accept="image/png, image/jpeg">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-style: solid; border-color:#014b85;  border-width: 3px">Upload</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="color: #014b85; background-color: white; border-style: solid; border-color:#014b85;  border-width: 3px">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Program Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_program" action="{{ route('tambah_program') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <h3>Photo Program</h3>
                        <input name="photo_prog" type="file" accept="image/png, image/jpeg" required>
                        <h2><br></h2>
                        <h3>Judul Program</h3>
                        <input type="text" name="judul_program" id="" required style="width: 300px; font-size: 14pt">
                        <h2><br></h2>
                        <h3>No Telepon</h3>
                        <input type="number" name="telp_program" id="" required style="width: 300px; font-size: 14pt">
                        <h2><br></h2>
                        <h3>Biaya Yang Diperlukan</h3>
                        <input type="number" name="biaya_program" id="" required style="width: 300px; font-size: 14pt">
                        <h2><br></h2>
                        <h3>Deskripsi Program</h3>
                        <textarea id="form-program" rows="4" cols="50" name="deskripsi_program" form="form_program" style="margin-left: 1em; margin-right: 1em;resize: none;" placeholder="  Masukkan Deskripsi Program" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-style: solid; border-color:#014b85;  border-width: 3px">Tambah</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="color: #014b85; background-color: white; border-style: solid; border-color:#014b85;  border-width: 3px">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/holder.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script text="text/javascript">
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) {
                    // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() {
                        // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile
                            .closest(".imgUp")
                            .find(".imagePreview")
                            .css("background-image", "url(" + this.result + ")");
                    };
                }
            });
        });
    </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('form-program');
    </script>

    <!-- Graphs -->
</body>

</html>