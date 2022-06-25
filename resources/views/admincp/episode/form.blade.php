@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tập phim</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('episode.index') }}">Hiển thị danh sách
                        tập phim</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (\Session::has('Thông báo sửa'))
                        <script>
                            alert('Cập nhật tập phim thành công');
                            window.location = '/category';
                        </script>
                    @elseif (\Session::has('Thông báo thêm'))
                        <script>
                            alert('Thêm tập phim thành công');
                            window.location = '/category';
                        </script>
                    @endif
                    @if (!isset($episode))
                        {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif

                    <div class="form-group">
                        {!! Form::label('Movie', 'Chọn phim', []) !!}
                        {!! Form::select('movie_id', ['0' => 'Chọn phim', 'Phim' => $list_movie], isset($episode) ? $episode->movie_id : '', ['class' => 'form-control select-movie']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'Link phim', []) !!}
                        {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => 'Nhập link phim', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()','required' ]) !!}
                    </div>
                    @if (isset($episode))
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class' => 'form-control', 'placeholder' => '...', 'readonly']) !!}

                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="show_movie">
                            </select>
                        </div>
                    @endif
                    <hr>
                    @if (!isset($movie))
                        {!! Form::submit('Thêm Tập Phim', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                    @else
                        {!! Form::submit('Cập Nhật Phim', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                    @endif
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
