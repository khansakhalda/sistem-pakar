@extends('Dashboard.layout.app')

@section('content')
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="mb-20">
            <div class="card-box ">

                {{-- <div id="carouselExampleControls" class=" carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="border-radius: 8px">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src={{ asset('assets/src/images/1.png') }} alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src={{ asset('assets/src/images/2.png') }} alt="First slide">
                        </div>


                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div> --}}
                <div class="w-100">
                    <img class="d-block w-100" src={{ asset('assets/vendors/images/banner.png') }} />
                </div>
                <p class="p-3" style="text-align: center;">Selamat datang di <strong>Sistem Informasi Penyakit dan
                        Deteksi ISPA Klinis (SIPDIK)</strong>! Kami
                    hadir untuk
                    memberikan bantuan dalam
                    mengidentifikasi dan mengelola penyakit ISPA. Mari bersama-sama menjaga
                    kesehatan dan meningkatkan kesadaran kita mengenai
                    penyakit ini.</p>
                <div class="flex justify-center pt-2 pb-4 text-center " style="margin-top: -1rem">
                    <a href={{ route('register') }} class="text-white btn btn-info ">
                        <i class="micon bi bi-person-plus-fill"></i>&nbsp; Buat Akun
                    </a>
                </div>
            </div>

        </div>









    </div>
@endsection
@push('chatbot')
    <script src='https://app.wotnot.io/chat-widget/{{ env('WOTNOT_WIDGET_ID') }}.js' defer></script>
@endpush
