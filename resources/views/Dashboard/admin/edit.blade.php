@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href={{ route('data-admin.index') }}>User</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit User
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Edit User</h4>

            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form action={{ route('data-admin.update', $data->id) }} method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{ $data->name }}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Umur</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="number" value="{{ $data->age }}" name="age">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Nomer HP</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" value="{{ $data->number }}" name="number">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="email" value="{{ $data->email }}" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="" value="{{ $data->address }}" name="address">
                </div>
            </div>


            <div class="flex-row-reverse d-flex" style="gap:8px;">
                <button class="btn btn-large btn-info " type="submit">Edit</button>
                <a href={{ route('data-admin.index') }} class="btn btn-large btn-dark ">Batal</a>
            </div>


        </form>

    </div>

    <!-- basic table  End -->
@endsection
