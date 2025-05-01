    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2rem">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-black h4" style="color: #ff9800;">Perbarui Password</h4>
                <p class="text-secondary " style="margin-top: -0.5rem"><small>Silakan isi formulir di bawah ini untuk memperbarui kata sandi Anda.</small></p>

            </div>

        </div>
        @if ($message = Session::get('password-success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <form action={{ route('password.update') }} method="POST">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password Sekarang</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="current_password"
                        placeholder="Masukkan password lama ">
                    @if ($errors->updatePassword->get('current_password'))
                        <div class="alert alert-danger mt-1">
                            @foreach ($errors->updatePassword->get('current_password') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="password" placeholder="Masukkan password baru">
                    @if ($errors->updatePassword->get('password'))
                        <div class="alert alert-danger mt-1">
                            @foreach ($errors->updatePassword->get('password') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="password_confirmation"
                        placeholder="Masukkan password baru anda lagi">
                    @if ($errors->updatePassword->get('password_confirmation'))
                        <div class="alert alert-danger mt-1">
                            @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                                <li>{{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex flex-row-reverse" style="gap:8px;">
                <button class="btn btn-success btn-lg" type="submit">Simpan Password Baru</button>
            </div>


        </form>

    </div>
