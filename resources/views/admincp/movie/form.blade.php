@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Phim</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('country.index') }}">Hiển thị danh sách
                        phim</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (\Session::has('Thông báo sửa'))
                        <script>
                            alert('Cập nhật phim thành công');
                            window.location = '/category';
                        </script>
                    @elseif (\Session::has('Thông báo thêm'))
                        <script>
                            alert('Thêm phim thành công');
                            window.location = '/category';
                        </script>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('title', 'Tên phim', []) !!}
                        {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()', 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title', 'Số tập phim', []) !!}
                        {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class' => 'form-control', 'placeholder' => 'Nhập số tập phim']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('thoiluong', 'Thời lượng phim', []) !!}
                        {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong : '', ['class' => 'form-control', 'placeholder' => 'Nhập thời lượng phim', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('trailer', 'Trailer', []) !!}
                        {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class' => 'form-control', 'placeholder' => 'Nhập trailer']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Tags phim', []) !!}
                        {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['class' => 'form-control', 'placeholder' => 'Nhập tags phim']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tên tiếng anh', 'Tên tiếng anh', []) !!}
                        {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class' => 'form-control', 'placeholder' => 'Nhập tên tiếng anh']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Đường dẫn', []) !!}
                        {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập đường dẫn', 'id' => 'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả phim', []) !!}
                        {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => 'Nhập mô tả', 'id' => 'description']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Trạng thái', []) !!}
                        {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status : '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('resolution', 'Định dạng', []) !!}
                        {!! Form::select('resolution', ['0' => 'HD', '1' => 'SD', '2' => 'HD_Cam', '3' => 'Cam', '4' => 'FullHD', '5' => 'Trailer'], isset($movie) ? $movie->resolution : '', ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('phude', 'Phụ đề', []) !!}
                        {!! Form::select('phude', ['0' => 'Phụ đề', '1' => 'Thuyết minh'], isset($movie) ? $movie->phude : '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Category', 'Danh mục', []) !!}
                        {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">

                        {!! Form::label('thuocphim', 'Thuộc thể loại phim', []) !!}
                        {!! Form::select('thuocphim', ['phimle' => 'Phim lẻ', 'phimbo' => 'Phim bộ'], isset($movie) ? $movie->thuocphim : '', ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('Country', 'Quốc gia', []) !!}
                        {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Genre', 'Thể loại : ', []) !!}
                        {{-- {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class' => 'form-control']) !!} --}}
                        @foreach ($list_genre as $key => $gen)
                            <br>
                            @if (isset($movie))
                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                            @else
                                {!! Form::checkbox('genre[]', $gen->id, '') !!}
                            @endif
                            {!! Form::label('genre', $gen->title) !!}
                        @endforeach
                    </div>
                    <div class="form-group">
                        {!! Form::label('Hot', 'Phim hot', []) !!}
                        {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($movie) ? $movie->phim_hot : '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Image', 'Hình ảnh', []) !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                        @if (isset($movie))
                            <img width="150" src="{{ asset('uploads/movie/' . $movie->image) }}">
                        @endif
                    </div>
                    <hr>
                    @if (!isset($movie))
                        {!! Form::submit('Thêm Phim', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                    @else
                        {!! Form::submit('Cập Nhật Phim', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                    @endif
                    <a href="{{ route('movie.index') }}" class="ui-button ui-widget ui-corner-all">Quay về</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
