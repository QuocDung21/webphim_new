@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thể Loại</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('genre.create') }}">Thêm Thể Loại</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablephim" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Đường dẫn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $cate)
                                <tr>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->title }}</td>
                                    <td>{{ $cate->description }}</td>
                                    <td>{{ $cate->slug }}</td>
                                    <td>
                                        @if ($cate->status)
                                            Hiển thị
                                        @else
                                            Không hiển thị
                                        @endif
                                    </td>
                                    <td width="1px">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['genre.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")']) !!}
                                        {{-- {!! Form::button('Xóa', ['class' => 'ui-button ui-widget ui-corner-all', 'type' => 'submit']) !!} --}}
                                        <button style="margin-left:3.5px " type="submit" name=""
                                            class="ui-button ui-widget ui-corner-all">
                                            <span class="ui-icon ui-icon-trash"></span>
                                        </button>
                                        {!! Form::close() !!}

                                        <button style="margin-left:2.5px;margin-top:2px; "
                                            class="ui-button ui-widget ui-corner-all">

                                            <a href="{{ route('genre.edit', $cate->id) }}"
                                                class="ui-icon ui-icon-gear">Sửa</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
