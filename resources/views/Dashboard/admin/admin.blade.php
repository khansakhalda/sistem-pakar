@extends('Dashboard.layout.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Data User</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{ route('dashboard') }}>Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data User
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30" style="margin-top: -1.2em">
        <div class="clearfix mb-12">
            <div class="pull-left">
                <h4 class="text-blue h4">Daftar User</h4>

            </div>
            {{-- <div class="pull-right">
                <a href="{{ route('data-admin.create') }}" class="mb-4 btn btn-large btn-success"> + Tambah Admin
                </a>
            </div> --}}

        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    {{-- <th scope="col">Role</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $admin)
                    @if ($admin->id != Auth::user()->id)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->address }}</td>
                            {{-- <td>{{ $admin->getRoleNames()[0] }}</td> --}}
                            <td>
                                <div class="flex-wrap d-flex" style="gap:5px;">

                                    <a href={{ route('data-admin.edit', $admin->id) }} class="text-white btn btn-info">
                                        <i class="bi bi-pencil-square"></i> &nbsp; Edit &nbsp;
                                    </a>
                                    <form method="POST" action={{ route('data-admin.destroy', $admin->id) }}>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('apakah yakin?')" type="submit"
                                            class="text-white btn btn-danger ">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach


            </tbody>
        </table>
    </div>

    <!-- basic table  End -->
@endsection
