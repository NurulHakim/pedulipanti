<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
    <link href="{{ asset('css/album.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href=""> PeduliPanti</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span data-feather="users"></span>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Isi Profile</h1>
                </div>
                <form action="" method="POST">
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Tipe Panti</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>LKSA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jenis Yayasan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>PSAA</option>
                                <option>TAS</option>
                                <option>Pusaka</option>
                                <option>RSG</option>
                                <option>NPSAA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nama Panti</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namapanti" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon Panti</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="notelp" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nama Pemilik Panti</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namapempanti" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon Pemilik Panti</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Alamat Panti</label>
                        <div class="col-sm-10">
                            <textarea class="form-control " name="alamat" id="alamat" rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>--------- Pilih Provinsi ----------</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>--------- Pilih Kabupaten/Kota ----------</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>--------- Pilih Kecamatan ----------</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>--------- Pilih Kelurahan ----------</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Tag Kebutuhan Panti</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Pakaian</option>
                                <option>Makanan</option>
                                <option>Uang</option>
                                <option>Infrastruktur</option>
                                <option>Pendidikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Deskripsi Kebutuhan Panti</label>
                        <div class="col-sm-10">
                            <textarea class="form-control " name="alamat" id="alamat" rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Pengurus Panti</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Anak Laki-laki</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Perempuan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Logo Panti Asuhan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Foto Panti Asuhan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Foto Sertifikat Panti Asuhan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: rgb(245, 121, 12); border-color: rgb(245, 121, 12)">Submit</button>
                        </div>
                    </div>



                </form>

                <footer class="text-muted border-top">
                    <div class="container "  style="border-top: 1pt red">
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <h5 class="card-title">Berdayakan panti bersama pedulipanti</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col-6 col-md-4">
                                <h5 class="card-title">Media Sosial</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="col-6 col-md-4">
                                <h5 class="card-title">Hubungi Kami</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                        </div>
                    </div>
                </footer>
            </main>


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

            <!-- Graphs -->

</body>

</html>