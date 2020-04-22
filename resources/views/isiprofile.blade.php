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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/"> PeduliPanti</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
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

                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Tipe Panti</label>
                        <div class="col-sm-10">
                            <select name='tipe_panti' class="form-control" id="exampleFormControlSelect1">

                                <option>LKSA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jenis Yayasan</label>
                        <div class="col-sm-10">
                            <select name='jenis_yayasan' class="form-control" id="exampleFormControlSelect1">

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
                            <input name='nama_panti' type="text" class="form-control" id="namapanti" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon Panti</label>
                        <div class="col-sm-10">
                            <input name='no_telepon' type="text" class="form-control" id="notelp" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nama Pemilik Panti</label>
                        <div class="col-sm-10">
                            <input name='nama_pemilik' type="text" class="form-control" id="namapempanti" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon Pemilik Panti</label>
                        <div class="col-sm-10">
                            <input name='no_telepon_pemilik' type="text" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Alamat Panti</label>
                        <div class="col-sm-10">
                            <textarea name='alamat_panti' class="form-control " id="alamat" rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <select name='provinsi' class="form-control" id="exampleFormControlSelect1">

                                <option>--------- Pilih Provinsi ----------</option>
                                <option value='Lampung'>Lampung</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-10">
                            <select name='kabupaten_kota' class="form-control" id="exampleFormControlSelect1">

                                <option>--------- Pilih Kabupaten/Kota ----------</option>
                                <option value='Bandar Lampung'>Bandar Lampung</option>
                                <option value='Lampung Barat'>Lampung Barat</option>
                                <option value='Lampung Selatan'>Lampung Lampung Selatan</option>
                                <option value='Lampung Tengah '>Lampung Tengah </option>
                                <option value='Lampung Utara '>Lampung Utara </option>
                                <option value='Lampung Timur '>Lampung Timur </option>
                                <option value='Metro'>Metro</option>
                                <option value='Mesuji'>Mesuji</option>
                                <option value='Pesawaran'>Pesawaran</option>
                                <option value='Pesisir Barat'>Pesisir Barat</option>
                                <option value='Metro'>Metro</option>
                                <option value='Pringsewu'>Pringsewu</option>
                                <option value='Tulang Bawang'>Tulang Bawang</option>
                                <option value='Tulang Bawang Barat'>Tulang Bawang Barat</option>
                                <option value='Tanggamus'>Tanggamus</option>
                                <option value='Way Kanan'>Way Kanan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select name='kecamatan' class="form-control" id="exampleFormControlSelect1">

                                <option>--------- Pilih Kecamatan ----------</option>
                                <option value='cilincing'>Cilincing</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <select name='kelurahan' class="form-control" id="exampleFormControlSelect1">

                                <option>--------- Pilih Kelurahan ----------</option>
                                <option value='sukapura'>Sukapura</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Deskripsi Panti</label>
                        <div class="col-sm-10">
                            <textarea name='deskripsi_panti' class="form-control " name="alamat" id="alamat" rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Tag Kebutuhan Panti</label>
                        <div class="col-sm-10">
                            <select name='kebutuhan_panti' class="form-control" id="exampleFormControlSelect1">

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
                            <textarea name='deskripsi_kebutuhan' class="form-control " name="alamat" id="alamat" rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Pengurus Panti</label>
                        <div class="col-sm-10">
                            <input name='jumlah_pengurus' type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Anak Laki-laki</label>
                        <div class="col-sm-10">
                            <input name='jumlah_anak_laki' type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Perempuan</label>
                        <div class="col-sm-10">
                            <input name='jumlah_anak_perempuan' type="number" class="form-control" id="notelppem" placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Logo Panti Asuhan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input name='logo_panti' type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
                                    Upload<input name='foto_panti' type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
                                    Upload<input name='sertifikat_panti' type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button name='submit' type="submit" class="btn btn-primary" style="background-color: rgb(245, 121, 12); border-color: rgb(245, 121, 12)">Save Data</button>
                        </div>
                    </div>

                </form>

                <footer class="page-footer font-small blue" style="padding-top: 1em; padding-bottom: 1em">

                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2020 Copyright: v09042929
                    </div>
                    <!-- Copyright -->

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