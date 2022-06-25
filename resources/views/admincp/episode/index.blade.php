@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tập phim</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p> --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary"><a href="{{ route('episode.create') }}">Thêm Tập Phim</a>
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
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tập phim</th>
                                <th scope="col">Link phim</th>
                                <th scope="col">Trạng thái</th>

                            </tr>
                        </thead>
                        <tbody class="order_position">
                            @foreach ($list_episode as $key => $episode)
                                <tr>
                                    <td width="1px">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['episode.destroy', $episode->id], 'onsubmit' => 'return confirm("Bạn có chắc muốn xóa?")']) !!}
                                        {{-- {!! Form::button('Xóa', ['class' => 'ui-button ui-widget ui-corner-all', 'type' => 'submit']) !!} --}}
                                        <button style="margin-left:3.5px " type="submit" name=""
                                            class="ui-button ui-widget ui-corner-all">
                                            <span class="ui-icon ui-icon-trash"></span>
                                        </button>
                                        {!! Form::close() !!}

                                        <button style="margin-left:2.5px;margin-top:2px; "
                                            class="ui-button ui-widget ui-corner-all">

                                            <a href="{{ route('episode.edit', $episode->id) }}"
                                                class="ui-icon ui-icon-gear">Sửa</a>
                                        </button>
                                    </td>
                                    <th scope="row">{{ $key }}</th>
                                    <td>{{ $episode->movie->title }}</td>
                                    <td><img width="80px" src="{{ asset('uploads/movie/' . $episode->movie->image) }}">
                                    </td>
                                    <td>{{ $episode->episode }}</td>
                                    <td style="width:20%;">{!! $episode->linkphim !!}</td>
                                    <td>{{ $episode->movie->status }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
