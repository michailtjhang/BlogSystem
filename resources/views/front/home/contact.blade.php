@extends('front.layouts.app')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <div class="text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126931.66734154637!2d106.75406270184445!3d-6.182306655835446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f436b8c94b07%3A0x6ea6d5398b7c82f6!2sJakarta%20Pusat%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1727966433253!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('M d, Y') }}</div>
                        <h2 class="card-title">About Blogs</h2>
                        <p class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas consequuntur quae culpa similique harum, praesentium doloremque quasi cum dolore neque. Aperiam quia facilis dolor odio rem voluptatem voluptas? Tempora, nemo!
                            </p>

                            <ul>
                                <li>Phone: (123) 456-7890</li>
                                <li>Email: 6vqIu@example.com</li>
                                <li><a href="https://www.youtube.com">Youtube</a></li>
                                <li><a href="https://www.instagram.com">Instagram</a></li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Side widgets-->
            @include('front.layouts.side-widget')

        </div>
    </div>
@endsection
