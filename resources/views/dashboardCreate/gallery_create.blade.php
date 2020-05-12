@extends('layouts.master')
@section('title', 'Create | Gallery')
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
                        <div class="card-header">
                            <strong class="card-title">Tambah Gambar</strong>
                        </div>
                        <div class="card-body">
                            <form action="/gallery" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product_id" class="control-label mb-1">Nama Barang</label>

                                    <select id="product_id" name="product_id" class="form-control @error('product_id') is-invalid @enderror" autofocus>
                                        @foreach ($products as $product)
                                            <option {{old('product_id')? 'selected' : ''}} value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('product_id')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">gambar</label>
                                    <input id="image" name="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}">

                                    @error('image')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="default" class="control-label">default</label>
                                    <br>

                                    <label for="radio1" class="mb-1" >
                                        <input id="radio1" name="default" type="radio"  class=" @error('default') is-invalid @enderror" value="1"> ya
                                    </label>
                                    &nbsp;
                                    <label for="radio2">
                                        <input id="radio2" name="default" type="radio"  class="@error('default') is-invalid @enderror" value="2"> tidak
                                    </label>

                                    @error('default')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info float-right">Tambah Gambar</button>
                                </div>

                            </form>
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
