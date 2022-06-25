@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Phim</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('movie.create') }}">Thêm Phim</a>
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablephim" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Quản lý</th>
                                <th scope="col">#</th>
                                <th scope="col">Tên phim</th>
                                <th scope="col">Tags</th>
                                {{-- <th scope="col">Trailers</th> --}}
                                <th scope="col">Thuộc thể loại phim</th>
                                <th scope="col">Seasons</th>
                                <th scope="col">Thời lượng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Phim hot</th>
                                <th scope="col">Phụ đề</th>
                                <th scope="col">Định dạng</th>
                                <th scope="col">Số tập</th>
                                <!-- <th scope="col">Mô tả</th> -->
                                <th scope="col">Đường dẫn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Quốc gia</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Ngày cập nhật</th>
                                <th scope="col">Năm</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $cate)
                                <tr>
                                    <td width="1px">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy', $cate->id], 'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")']) !!}
                                        {{-- {!! Form::button('Xóa', ['class' => 'ui-button ui-widget ui-corner-all', 'type' => 'submit']) !!} --}}
                                        <button style="margin-left:3.5px " type="submit" name=""
                                            class="ui-button ui-widget ui-corner-all">
                                            <span class="ui-icon ui-icon-trash"></span>
                                        </button>
                                        {!! Form::close() !!}

                                        <button style="margin-left:2.5px;margin-top:2px; "
                                            class="ui-button ui-widget ui-corner-all">

                                            <a href="{{ route('movie.edit', $cate->id) }}"
                                                class="ui-icon ui-icon-gear">Sửa</a>
                                        </button>
                                    </td>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $cate->title }}</td>
                                    <td>{{ $cate->tags }}</td>
                                    {{-- <td>{{ $cate->trailer }}</td> --}}
                                    <td>
                                        @if ($cate->thuocphim == 'phimle')
                                            Phim lẻ
                                        @else
                                            Phim bộ
                                        @endif
                                    </td>
                                    <td>{!! Form::selectRange('season', 0, 20, isset($cate) ? $cate->season : '', ['class' => 'select-season', 'id' => $cate->id]) !!} </td>
                                    <td>{{ $cate->thoiluong }}</td>
                                    <td><img width="50px" src="{{ asset('uploads/movie/' . $cate->image) }}"></td>
                                    <td>
                                        @if ($cate->phim_hot == 0)
                                            Không
                                        @else
                                            Có
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cate->phude == 0)
                                            Phụ đề
                                        @else
                                            Thuyết minh
                                        @endif
                                    </td>

                                    <td>
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
                                    </td>
                                    <td>
                                        {{ $cate->sotap }}
                                    </td>
                                    <!-- <td>{{ $cate->description }}</td> -->
                                    <td>{{ $cate->slug }}</td>
                                    <td>
                                        @if ($cate->status)
                                            Hiển thị
                                        @else
                                            Không hiển thị
                                        @endif
                                    </td>

                                    <td>{{ $cate->category->title }}</td>

                                    <td>
                                        @foreach ($cate->movie_genre as $gen)
                                            <span class="badge badge-dark"> {{ $gen->title }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $cate->country->title }}</td>
                                    <td>{{ $cate->ngaytao }}</td>
                                    <td>{{ $cate->ngaycapnhat }}
                                    <td>{!! Form::selectYear('year', 2000, 2022, isset($cate) ? $cate->year : '', ['class' => 'select-year', 'id' => $cate->id]) !!} </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
