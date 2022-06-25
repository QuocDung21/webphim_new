@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trang Quản Lý</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    welcome
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
            <a href="{{ route('movie.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-video fa-sm text-white-50"></i> Thêm phim</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a href="{{ route('category.index') }}">Tổng Số Danh mục :
                                        {{ $Count_category }}</a>
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    Hiển thị : {{ $Count_category_ht }} <br>
                                    Không Hiển thị : {{ $Count_category_kht }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-ul fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="{{ route('genre.index') }}"> Tổng Số Thể loại : {{ $Count_genre }}</a>
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    Hiển thị : {{ $Count_genre_ht }} <br>
                                    Không Hiển thị : {{ $Count_genre_kht }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bars fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <a href="{{ route('country.index') }}">Tổng Số Quốc Gia : {{ $Count_country }}</a>
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    Hiển thị : {{ $Count_country_ht }} <br>
                                    Không Hiển thị : {{ $Count_country_kht }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-globe-africa fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <a href="{{ route('movie.index') }}">Tổng Số Phim : {{ $Count_movies }}</a>
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    Hiển thị : {{ $Count_movies_ht }} <br>
                                    Không Hiển thị : {{ $Count_movies_kht }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-video fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content movie --}}
            @foreach ($list as $key => $cate)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div @if ($cate->status == 0) style="background-color: rgb(220,220,220)" @endif
                        class=" shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <a href="{{ route('movie.edit', $cate->id) }}"> {{ $cate->title }} -
                                            <span class="status">
                                                @if ($cate->resolution == 0)
                                                    HD
                                                @elseif($cate->resolution == 1)
                                                    SD
                                                @elseif($cate->resolution == 2)
                                                    HD_Cam
                                                @elseif($cate->resolution == 3)
                                                    FullHD
                                                @else
                                                    Trailer
                                                @endif
                                            </span>
                                        </a>
                                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                            @if ($cate->phude == 0)
                                                Phụ đề
                                                @if ($cate->season != 0)
                                                    - Season {{ $cate->season }}
                                                @endif
                                            @else
                                                Thuyết minh
                                                @if ($cate->season != 0)
                                                    - Season {{ $cate->season }}
                                                @endif
                                            @endif
                                        </span>
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        @if ($cate->thuocphim == 'phimbo')
                                            Phim bộ
                                            :
                                            @if ($cate->sotap > 0)
                                                {{ $cate->sotap }} Tập
                                            @else
                                                Đang cập Nhật
                                            @endif
                                        @elseif ($cate->thuocphim == 'phimle')
                                            Phim lẻ
                                        @endif
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        {{ $cate->genre->title }}
                                    </div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        {{ $cate->country->title }}
                                    </div>


                                    <hr>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")']) !!}
                                        {!! Form::submit('Xóa', ['class' => 'btn-circle btn-lgg']) !!}
                                        {!! Form::close() !!} --}}
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")']) !!}
                                        <button style="color:rgb(5, 1, 1);" type="submit" href="#" onclick="" class="btn-circle btn-lgg">Xóa</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <img style="border-radius: 5px" width="60px" height="100px"
                                        src="{{ asset('uploads/movie/' . $cate->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- End content movie --}}
        </div>



    </div>
@endsection
