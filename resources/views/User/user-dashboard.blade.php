@extends('Dashboard.layout.app')

@section('content')
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="mb-20">
            <div class="card-box">

                {{-- Carousel bisa diaktifkan jika ingin gambar berganti --}}
                <div class="w-100">
                    <img class="d-block w-100" src={{ asset('assets/vendors/images/banner.png') }} />
                </div>

                <p class="p-3" style="text-align: center;">
                    Selamat datang di <strong>Sistem Informasi Diagnosa Penyakit Akibat Gigitan Nyamuk (SIDINYAM)</strong>! 
                    Aplikasi ini hadir untuk membantu mengidentifikasi dan mengelola penyakit yang disebabkan oleh gigitan nyamuk, seperti DBD, Malaria, Chikungunya, Encephalitis, Zika, Filariasis, dan Demam Kuning. 
                    Mari bersama-sama menjaga kesehatan dan meningkatkan kesadaran terhadap penyakit tropis ini.
                </p>

            </div>
        </div>

    </div>
@endsection

@push('chatbot')
    <script src='https://app.wotnot.io/chat-widget/{{ env('WOTNOT_WIDGET_ID') }}.js' defer></script>
@endpush
