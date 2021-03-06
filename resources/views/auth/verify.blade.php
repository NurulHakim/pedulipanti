@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card border-0">
            <div class="card-header text-center"  style="background-color: white">
                <img class="mb-4" src="{{asset('upload/panti/pedulipanti.png')}}" alt="" width="72" height="72">
                    <h3><b>Verifikasi Email</b></h3>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('autan verifikasi baru telah dikirim ke alamat email kamu.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, silakan periksa email kamu untuk verifikasi. ') }}
                    {{ __('Jika kamu tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik di sini untuk mengirim ulang tautan verifikasi') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
