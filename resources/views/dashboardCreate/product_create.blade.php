@extends('layouts.master')
@section('title', 'Create - Product')
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Barang</strong>
                        </div>
                        <div class="card-body">
                            <form action="/product" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">nama</label>
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" autofocus autocomplete="off" value="{{old('name')}}">

                                    @error('name')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type" class="control-label mb-1">tipe</label>
                                    <input id="type" name="type" type="text" class="form-control @error('type') is-invalid @enderror"  autocomplete="off" value="{{old('type')}}">

                                    @if ($errors->has('type'))
                                        <p class="alert alert-danger">{{$errors->first('type')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">harga</label>
                                    <input id="price" name="price" type="number" class="form-control @error('price') is-invalid @enderror"  autocomplete="off" value="{{old('price')}}">

                                    @if ($errors->has('price'))
                                        <p class="alert alert-danger">{{$errors->first('price')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="stock" class="control-label mb-1">jumlah</label>
                                    <input id="stock" name="stock" type="number" class="form-control @error('stock') is-invalid @enderror"  autocomplete="off" value="{{old('stock')}}">

                                    @if ($errors->has('stock'))
                                        <p class="alert alert-danger">{{$errors->first('stock')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">deskripsi</label>
                                    <textarea id="description" name="description" class="form-control ckeditor @error('description') is-invalid @enderror" >{{old('description')}}</textarea>

                                    @error('description')
                                        <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-info float-right">Tambah Barang</button>
                                </div>

                            </form>
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

@push('after-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
                .create( document.querySelector( '.ckeditor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
@endpush

@endsection
