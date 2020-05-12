@extends('layouts.master')
@section('title', 'Gallery')
@section('content')
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">

                @if (session('msg'))
                    <p class="alert alert-info">{{session('msg')}}</p>
                @endif

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Daftar Gambar </h4>
                            <a href="/gallery/create" class="btn btn-info btn-sm float-right ml-2"><i class="menu-icon fa fa-plus"></i></a>
                            <a href="/gallery/restore" class="btn btn-primary btn-sm float-right"><i class="fa fa-refresh"></i></a>

                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Nama Barang</th>
                                            <th>Image</th>
                                            <th>Defautl</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $angkaAwal = 1
                                        @endphp
                                        @foreach ($galleries as $gallery)
                                            <tr>
                                                <td class="serial">{{$angkaAwal}}</td>
                                                <td>{{$gallery->product->name}}</td>
                                                <td>
                                                    <img src="{{url($gallery->image)}}" alt="Error" width="900">
                                                </td>
                                                <td>{{$gallery->default == 1 ? 'default' : 'no default'}}</td>
                                                <td>
                                                    <form action="/gallery/{{$gallery->id}}" method="POST" class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" onclick="return confirm('Hapus Gambar ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @php
                                            $angkaAwal++
                                        @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-stats -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.orders -->
        <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>

@endsection
