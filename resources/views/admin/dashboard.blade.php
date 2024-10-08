@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_article }}</h3>
                        <p>Total Articles</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('article.index') }}" class="small-box-footer">View <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-6 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_category }}</h3>
                        <p>Total Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('category.index') }}" class="small-box-footer">View <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6 col-6">
                <h4>Latest Articles</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($last_article as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <a href="{{ route('article.show', $row->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-6 col-6">
                <h4>Popular Articles</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_article as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>
                                    <a href="{{ route('article.show', $row->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>
@endsection
