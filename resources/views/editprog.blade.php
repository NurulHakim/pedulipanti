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

                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('dash_program')}}">
                                <img src="https://img.icons8.com/ios/20/000000/activity-feed.png" />
                                Program <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Program Donasi</h1>
                </div>
                @foreach($data as $datas)
                <form action="{{ route('edit_program_post', $datas->id) }}" id="form_program"method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Judul Program</label>
                        <div class="col-sm-10">
                            <input name='judul' type="text" class="form-control" id="judul" placeholder="" value="{{$datas->judul}}" required>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input name='no_telepon' type="text" class="form-control" id="notelp" placeholder="" value="{{$datas->telp}}" required>
                        </div>
                    </div>

                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Biaya Yang Diperlukan</label>
                        <div class="col-sm-10">
                            <input name='biaya' type="number" class="form-control" id="biaya" placeholder="" value="{{$datas->biaya}}" required>
                        </div>
                    </div>
                    <div class="form-grup row" style="margin-bottom: 1em">
                        <label for="typePanti" class="col-sm-2 col-form-label">Deskripsi Program</label>
                        <div class="col-sm-10">
                        <textarea id="form-program" rows="4" cols="50" name="deskripsi_program" form="form_program" style="margin-left: 1em; margin-right: 1em;resize: none;" placeholder="  Masukkan Deskripsi Program" required>{!!$datas->deskripsi_program!!}</textarea>
                        </div>
                    </div> <div class="form-grup row" style="margin-bottom: 1em">
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
                    @endforeach
                    {{ csrf_field()}}
                </form>
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
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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