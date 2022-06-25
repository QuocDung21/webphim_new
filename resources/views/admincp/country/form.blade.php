@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Quốc gia</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('country.index') }}">Hiển thị danh sách
                        quốc gia</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (\Session::has('Thông báo sửa'))
                        <script>
                            alert('Cập nhật quốc gia thành công');
                            window.location = '/category';
                        </script>
                    @elseif (\Session::has('Thông báo thêm'))
                        <script>
                            alert('Thêm quốc gia thành công');
                            window.location = '/category';
                        </script>
                    @endif
                    @if (!isset($country))
                        {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('title', 'Tên quốc gia', []) !!}
                        {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Đường dẫn', []) !!}
                        {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control', 'placeholder' => '...', 'id' => 'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Mô tả quốc gia', []) !!}
                        {!! Form::textarea('description', isset($country) ? $country->description : '', ['style' => 'resize:none', 'class' => 'form-control', 'placeholder' => '...', 'id' => 'description','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Trạng thái', []) !!}
                        {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($country) ? $country->status : '', ['class' => 'form-control']) !!}
                    </div>
                    <hr>
                    @if (!isset($country))
                        {!! Form::submit('Thêm Quốc Gia', ['class' => 'ui-button ui-widget ui-corner-all']) !!}
                    @else
                        {!! Form::submit('Cập Nhật Quốc Gia', ['class' => 'ui-button ui-widget ui-corner-all', 'route' => 'category.index']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
