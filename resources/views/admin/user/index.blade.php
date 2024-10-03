@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
        </nav>
        <div class="card-body">

            @include('_message')

            <div class="table-responsive">
                @if (auth()->user()->role == 'admin')
                    <button type="button" class="btn btn-success mb-2 btn-sm" data-toggle="modal"
                        data-target="#modalCreate">
                        Tambah
                    </button>
                @endif
                <table class="table table-bordered table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date</th>
                            @if (auth()->user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->role }}</td>
                                <td>{{ $row->created_at }}</td>
                                @if (auth()->user()->role == 'admin')
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalUpdate{{ $row->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-danger"
                                            @if (auth()->user()->id === $row->id) disabled @endif
                                            onclick="confirmDelete('{{ route('user.destroy', $row->id) }}', '{{ $row->name }}')">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>

                                        <script>
                                            function confirmDelete(deleteUrl, name) {
                                                Swal.fire({
                                                    title: "Are you sure?",
                                                    text: `You won't be able to revert this! This will delete ${name}.`,
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Yes, delete it!"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        var form = document.createElement('form');
                                                        form.method = 'POST';
                                                        form.action = deleteUrl;

                                                        var csrfToken = document.createElement('input');
                                                        csrfToken.type = 'hidden';
                                                        csrfToken.name = '_token';
                                                        csrfToken.value = '{{ csrf_token() }}';
                                                        form.appendChild(csrfToken);

                                                        var methodField = document.createElement('input');
                                                        methodField.type = 'hidden';
                                                        methodField.name = '_method';
                                                        methodField.value = 'DELETE';
                                                        form.appendChild(methodField);

                                                        document.body.appendChild(form);
                                                        form.submit();
                                                    }
                                                });
                                            }
                                        </script>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create & Edit User -->
    @include('admin.user.create-modal')
    @include('admin.user.edit-modal')
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
