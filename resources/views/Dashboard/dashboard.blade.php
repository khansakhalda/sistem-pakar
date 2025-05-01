@extends('Dashboard.layout.app')

@section('content')
    <div class="xs-pd-20-10 pd-ltr-20">
        @role('admin')
            <div class="pb-10 row" style="margin-top: -1.2em">
                <div class="mb-1 col-xl-4 col-lg-4 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $gejala }}</div>
                                <div class="font-14 text-secondary weight-500">Data Gejala</div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#00eccf">
                                    <i class="icon-copy dw dw-calendar1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 col-xl-4 col-lg-4 col-md-6">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $penyakit }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Data Penyakit
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon" data-color="#ff5b5b">
                                    <span class="icon-copy ti-heart"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 col-xl-4 col-lg-4 col-md-12">
                    <div class="card-box height-100-p widget-style3">
                        <div class="flex-wrap d-flex">
                            <div class="widget-data">
                                <div class="weight-700 font-24 text-dark">{{ $rule }}</div>
                                <div class="font-14 text-secondary weight-500">
                                    Data Pengetahuan
                                </div>
                            </div>
                            <div class="widget-icon">
                                <div class="icon">
                                    <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endrole

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
                @role('user')
                    <div class="flex justify-center pt-2 pb-4 text-center " style="margin-top: -1rem">
                        <a href={{ route('diagnosis.index') }} class="text-white btn btn-info ">
                            Cek Kondisi Anda Sekarang!
                        </a>
                    </div>
                @endrole

            </div>

        </div>

    </div>
    @push('chatbot')
        <script src='https://app.wotnot.io/chat-widget/{{ env('WOTNOT_WIDGET_ID') }}.js' defer></script>
    @endpush
    @push('scripts')
        <script>
            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            // Mengubah nilai cookie "introjs-dontShowAgain" menjadi false
            setCookie("introjs-dontShowAgain", "false", 7); // 7 di sini berarti cookie akan bertahan 7 hari

            // Memastikan nilai cookie telah diubah
            console.log(getCookie("introjs-dontShowAgain")); // Harusnya mengembalikan "false"
        </script>
    @endpush
@endsection
