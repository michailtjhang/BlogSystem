@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('img/no_photo.svg') }}" alt="Profile" class="rounded-circle">
                            <h2 class="mt-3">
                                {{ Auth::user()->name }}
                            </h2>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->

                                    @if (Auth::user()->two_factor_enabled)
                                        <form action="{{ route('two-factor.disable') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Disable Two-Factor
                                                Authentication</button>
                                        </form>
                                    @else
                                        <form action="{{ route('two-factor.enable') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Enable Two-Factor
                                                Authentication</button>
                                        </form>
                                    @endif


                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>
                    <script>
                        // Fungsi untuk merotasi gambar
                        function rotateImage() {
                            var img = document.getElementById('image');

                            // Periksa orientasi gambar saat ini
                            var currentRotation = parseInt(img.getAttribute('data-rotation') || 0);

                            // Hanya terapkan rotasi jika gambar awalnya landscape
                            if (currentRotation % 180 === 0) {
                                // Setel rotasi ke 90 derajat setiap kali fungsi dipanggil
                                var newRotation = currentRotation + 90;

                                // Terapkan rotasi menggunakan CSS
                                img.style.transform = 'rotate(' + newRotation + 'deg)';

                                // Simpan rotasi saat ini ke atribut data
                                img.setAttribute('data-rotation', newRotation);
                            }
                        }

                        // Panggil fungsi rotateImage() misalnya saat tombol diklik
                        // var rotateButton = document.createElement('button');
                        window.onload = function() {
                            rotateImage();
                        }
                    </script>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
