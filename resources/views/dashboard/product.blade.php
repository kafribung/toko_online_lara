@extends('layouts.master')
@section('title', 'Product')
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
                            <h4 class="box-title text-center">Daftar Product </h4>
                            <a href="/product/create" class="btn btn-info btn-sm float-right ml-2"><i class="menu-icon fa fa-plus"></i></a>
                            <a href="/product/restore" class="btn btn-primary btn-sm float-right"><i class="fa fa-refresh"></i></a>

                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Nama</th>
                                            <th>Tipe</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $angkaAwal = 1
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="serial">{{$angkaAwal}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->type}}</td>
                                                <td>{!!$product->description!!}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->stock}}</td>
                                                <td>
                                                    <a href="/product/{{$product->id}}/image" class="btn btn-dark btn-sm"><i class="fa fa-photo"></i></a>

                                                    <a href="/product/{{$product->slug}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                                    <form action="/product/{{$product->id}}" method="POST" class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" onclick="return confirm('Hapus Barang ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
