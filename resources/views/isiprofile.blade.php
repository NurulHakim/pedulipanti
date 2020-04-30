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
                            <a class="nav-link active" href="/profile_panti">
                                <span data-feather="users"></span>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
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
                            <input name='nama_pemilik' type="text" class="form-control" id="namapempanti"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon Pemilik Panti</label>
                        <div class="col-sm-10">
                            <input name='no_telepon_pemilik' type="text" class="form-control" id="notelppem"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Alamat Panti</label>
                        <div class="col-sm-10">
                            <textarea name='alamat_panti' class="form-control " id="alamat" rows="6"
                                style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <select name="provinsi" id="provinsi" class="form-control dynamic" data-dependent='kabupaten'>
                                <option value="">== Pilih Provinsi ==</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-10">
                            <select name='kabupaten' id="kabupaten" class="form-control dynamic" >
                                <option value="">== Pilih Kabupaten ==</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <select name='kecamatan' class="form-control dynamic" id="kecamatan">
                                <option value="">== Pilih Kecamatan ==</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-10">
                            <select name='kelurahan' class="form-control dynamic" id="kelurahan">
                                <option value="">== Pilih Kelurahan ==</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Deskripsi Panti</label>
                        <div class="col-sm-10">
                            <textarea name='deskripsi_panti' class="form-control " name="alamat" id="alamat" rows="6"
                                style="resize: none"></textarea>
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
                            <textarea name='deskripsi_kebutuhan' class="form-control " name="alamat" id="alamat"
                                rows="6" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Pengurus Panti</label>
                        <div class="col-sm-10">
                            <input name='jumlah_pengurus' type="number" class="form-control" id="notelppem"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Anak Laki-laki</label>
                        <div class="col-sm-10">
                            <input name='jumlah_anak_laki' type="number" class="form-control" id="notelppem"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Jumlah Perempuan</label>
                        <div class="col-sm-10">
                            <input name='jumlah_anak_perempuan' type="number" class="form-control" id="notelppem"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Logo Panti Asuhan</label>
                        <div class="col-sm-10">
                            <div class="col-sm-2 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input name='logo_panti' type="file" class="uploadFile img"
                                        value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
                                    Upload<input name='foto_panti' type="file" class="uploadFile img"
                                        value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
                                    Upload<input name='sertifikat_panti' type="file" class="uploadFile img"
                                        value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button name='submit' type="submit" class="btn btn-primary"
                                style="background-color: rgb(245, 121, 12); border-color: rgb(245, 121, 12)">Save
                                Data</button>
                        </div>
                    </div>
                    {{ csrf_field()}}

                </form>

                <footer class="page-footer font-small blue" style="padding-top: 1em; padding-bottom: 1em">

                    <!-- Copyright -->
                    <div class="footer-copyright text-center py-3">© 2020 Copyright: v09042929
                    </div>
                    <!-- Copyright -->

                </footer>
            </main>














            <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous">

            </script>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                crossorigin="anonymous">
            </script> -->

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
            </script>
            <script src="{{asset('js/popper.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <script src="{{asset('js/holder.min.js')}}"></script>
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

            <script type="text/javascript">
                $(function () {
                    $('#provinsi').on('change', function () {
                        axios.post('{{ route('getKabupaten') }}', {id: $(this).val()})
                            .then(function (response) {
                                $('#kabupaten').empty();

                                $.each(response.data, function (id, name) {
                                    $('#kabupaten').append(new Option(name, id))
                                })
                            });
                    });

                    $('#kabupaten').on('change', function () {
                        axios.post('{{ route('getKecamatan') }}', {id: $(this).val()})
                            .then(function (response) {
                                $('#kecamatan').empty();

                                $.each(response.data, function (id, name) {
                                    $('#kecamatan').append(new Option(name, id))
                                })
                            });
                    });

                    $('#kecamatan').on('change', function () {
                        axios.post('{{ route('getKelurahan') }}', {id: $(this).val()})
                            .then(function (response) {
                                $('#kelurahan').empty();

                                $.each(response.data, function (id, name) {
                                    $('#kelurahan').append(new Option(name, id))
                                })
                            });
                    });
                    
                    
                });
            </script>



            <script type="text/javascript">
                $(document).ready(function () {
                    $("#sidebar").mCustomScrollbar({
                        theme: "minimal"
                    });

                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar, #content').toggleClass('active');
                        $('.collapse.in').toggleClass('in');
                        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                    });
                });

            </script>
            <script text="text/javascript">
                $(function () {
                    $(document).on("change", ".uploadFile", function () {
                        var uploadFile = $(this);
                        var files = !!this.files ? this.files : [];
                        if (!files.length || !window.FileReader)
                            return; // no file selected, or no FileReader support

                        if (/^image/.test(files[0].type)) {
                            // only image file
                            var reader = new FileReader(); // instance of the FileReader
                            reader.readAsDataURL(files[0]); // read the local file

                            reader.onloadend = function () {
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
