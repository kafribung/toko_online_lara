@extends('layouts.master')
@section('title', 'Transaction')
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
                            <h4 class="box-title text-center">Daftar Transaksi</h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_HP</th>
                                            <th>Alamat</th>
                                            <th>Kode</th>
                                            <th>Status</th>
                                            <th>Cheking</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $angkaAwal = 1
                                        @endphp
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td class="serial">{{$angkaAwal}}</td>
                                                <td>{{$transaction->name}}</td>
                                                <td>{{$transaction->email}}</td>
                                                <td>{{$transaction->no_hp}}</td>
                                                <td>{{$transaction->address}}</td>
                                                <td>{{$transaction->code}}</td>
                                                <td>
                                                    <span  class="{{($transaction->status_transaction == 'SUKSES') ? 'btn-success' : (($transaction->status_transaction == 'PENDING') ? 'btn-warning' : 'btn-danger')}} btn  btn-sm">{{$transaction->status_transaction}}</span>
                                                </td>

                                                <td>
                                                    @if ($transaction->status_transaction == 'PENDING')
                                                        <a href="/transaction/{{$transaction->id}}/status?status=SUKSES" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                        <a href="/transaction/{{$transaction->id}}/status?status=GAGAL" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                                    @else
                                                        <a href="/transaction/{{$transaction->id}}/status?status=PENDING" class="btn btn-dark btn-sm"><i class="fa fa-times"></i></a>
                                                    @endif
                                                </td>

                                                <td>
                                                    
                                                    <a data-remote="/transaction/{{$transaction->id}}"   data-toggle="modal" data-target="#exampleModal" data-title="Detail Transaksi {{$transaction->code}}"  class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                    <a href="/transaction/{{$transaction->id}}/edit"  class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                                    <form action="/transaction/{{$transaction->id}}" method="POST" class="d-inline-flex">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" onclick="return confirm('Hapus Data ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@push('after-script')
    <script>
        jQuery(document).ready(function($) {
            $('#exampleModal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget);
                var modal  = $(this);

                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));

            });

        });
    </script>

@endpush


@endsection
