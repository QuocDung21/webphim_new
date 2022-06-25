@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Danh mục</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('category.index') }}">Hiển thị danh mục</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (\Session::has('Thông báo sửa'))
                        <script>
                            alert('Cập nhật thành công');
                            window.location = '/category';
                        </script>
                    @elseif (\Session::has('Thông báo thêm'))
                        <script>
                            alert('Thêm thành công');
                            window.location = '/category';
                        </script>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($category))
                            {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tên danh mục', []) !!}
                            {!! Form::text('title', isset($category) ? $category->title : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Đường dẫn', []) !!}
                            {!! Form::text('slug', isset($category) ? $category->slug : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả danh mục', []) !!}
                            {!! Form::textarea('description', isset($category) ? $category->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => '...', 'id' => 'description','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($category) ? $category->status : '', ['class' => 'form-control']) !!}
                        </div>
                        <hr>
                        @if (!isset($category))
                            {!! Form::submit('Thêm Danh Mục', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                        @else
                            {!! Form::submit('Cập Nhật Danh Mục', ['class' => 'ui-button ui-widget ui-corner-all', 'route' => 'category.index']) !!}
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
