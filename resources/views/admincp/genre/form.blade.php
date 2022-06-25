@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Thể loại</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('country.index') }}">Hiển thị danh sách
                        thể loại</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (\Session::has('Thông báo sửa'))
                        <script>
                            alert('Cập nhật thể loại thành công');
                            window.location = '/category';
                        </script>
                    @elseif (\Session::has('Thông báo thêm'))
                        <script>
                            alert('Thêm quốc gia thành công');
                            window.location = '/category';
                        </script>
                    @endif
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($genre))
                            {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên thể loại', []) !!}
                            {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'convert_slug','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả thể loại', []) !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => '...', 'id' => 'description','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($genre) ? $genre->status : '', ['class' => 'form-control']) !!}
                        </div>
                        @if (!isset($genre))
                            {!! Form::submit('Thêm Thể Loại', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Thể Loại', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                        @endif
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
