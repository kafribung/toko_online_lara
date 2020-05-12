@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-info">Selmat datang {{$user->name}}</h1>

                        <div class="mt-3">
                            <h3>Ini adalah dashboard cms toko online Kafri Bung (Bung Fashion)</h3>
                            <h3>Tetap semangat dan jangan lupa berdoa</h3>
                            <p class="text-danger">Karyamu sejarahmu</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">Rp. <span class="count">{{$laba}}</span></div>
                                    <div class="stat-heading">Penghasilan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$tot_penjualan}}</span></div>
                                    <div class="stat-heading">Penjualan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Widgets -->
        <!--  /Traffic -->
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Pembelian Terbaru </h4>
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
                <!-- /.col-lg-8 -->

                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <div class="chart-container ov-h">
                                        <div id="flotPie1" class="float-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>

    </div>
    <!-- .animated -->
</div>
<!-- /.content -->

@push('after-script')
<script>
    jQuery(document).ready(function($) {
        "use strict";

        // Pie chart flotPie1
        var piedata = [{
            label: "Pending",
            data: {{$chart['PENDING']}},
            color: '#5c6bc0'
        }, {
            label: "Gagal",
            data: {{$chart['GAGAL']}},
            color: '#ef5350'
        }, {
            label: "Sukses",
            data: {{$chart['SUKSES']}},
            color: '#66bb6a'
        }];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        // Pie chart flotPie1  End
    });
</script>
@endpush

@endsection
