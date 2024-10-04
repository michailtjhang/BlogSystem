<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">Search!</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div>
                @foreach ($categories as $item)
                    <span><a href="{{ route('category', $item->slug) }}"
                            class="badge bg-primary text-white unstyled-link">{{ $item->name }} ({{ $item->articles_count }})</a></span>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Side widget-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
            use, and feature the Bootstrap 5 card component!</div>
    </div>

    <!-- Popular Articles-->
    <div class="card mb-4 shadow-sm">
        <div class="card-header">Popular Articles</div>
        <div class="card-body">
            @foreach ($popular_articles as $item)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('p', $item->slug) }} class="p-2"><img class="img-fluid"
                                    src="{{ asset('storage/article/' . $item->img) }}" alt="{{ $item->title }}" /></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="card-title">
                                    <p><a href="{{ route('p', $item->slug) }}"
                                            class="unstyled-link">{{ $item->title }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
