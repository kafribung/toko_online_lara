<table class=" table-bordered w-100" >
    <tr>
        <th>Nama</th>
        <td>{{$transaction->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$transaction->email}}</td>
    </tr>
    <tr>
        <th>No_Hp</th>
        <td>{{$transaction->no_hp}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$transaction->address}}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{$transaction->total_transaction}}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{$transaction->status_transaction}}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table-hover w-100">
                <thead>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </thead>
                <tbody>
                    @foreach ($transaction->products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->type}}</td>
                            <td>{{$product->price}}</tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>

  </table>

  <div class="row mt-2 text-center">
    <div class="col">
        <a href="/transaction/{{$transaction->id}}/status?status=SUKSES" class="btn btn-success btn-sm"><i class="fa fa-check">Sukses</i></a>
    </div>

    <div class="col">
        <a href="/transaction/{{$transaction->id}}/status?status=GAGAL" class="btn btn-danger btn-sm"><i class="fa fa-times">Gagal</i></a>
    </div>

    <div class="col">
        <a href="/transaction/{{$transaction->id}}/status?status=PENDING" class="btn btn-info btn-sm"><i class="fa fa-spinner">Pending</i></a>
    </div>
  </div>
