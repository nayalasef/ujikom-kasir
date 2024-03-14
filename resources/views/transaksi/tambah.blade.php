@include('layout.header')
@include('layout.navbar-top')
@include('layout.navbar-side')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Order</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <h5 class="card-title">Form Order</h5>
    <div class="row">
      <form class="row g-3" action="{{ route('transaksi.store') }}" method="post">
      @csrf
        <div class="col-md-4">
          <div class="card">  
            <div class="card-body" >
            <h5 class="card-title">Data Pembeli</h5>
              <div class="col-12">
                <label for="nama" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{Session::get('nama')}}" disabled>
              </div>
              <div class="col-12">
                <label for="total_bayar" class="form-label">Total Bayar</label>
                <input type="number"  class="form-control" id="total_bayar" name="stok">
              </div>
              <div class="col-12">
                <label for="kembalian" class="form-label">Kembalian</label>
                <input type="number" class="form-control" id="kembalian" name="kembalian" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">  
            <div class="card-body row" >
              <h5 class="card-title">Data Baramg</h5>
              <div class="col-3">
                <label for="nama" class="form-label">Pilih Barang</label>
                <select class="form-select" id="produk" nama="produk" aria-label="Default select example">
                  <option selected>Pilih</option>
                  @foreach($barang as $produk)
                  <option value="{{$produk->id}}">{{$produk->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-3">
                <label for="nama" class="form-label">Harga Barang</label>
                <input type="text" class="form-control" id="harga" name="harga" disabled>
              </div>
              <div class="col-3">
                <label for="nama" class="form-label">Stok Barang</label>
                <input type="text" class="form-control" id="stok" name="stok" disabled>
              </div>
              <div class="col-3">
                <label for="jumlah_pembelian" class="form-label">Jumlah Pembelian</label>
                <input type="number" class="form-control" id="jumlah_pembelian" min=0 name="jumlah_pembelian">
              </div>
              <!-- <div class="text-center">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div> -->
              <div class="col-12">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" disabled>
                <input type="hidden" class="form-control" id="total_harga_hidden" name="total_harga_hidden">
                <input type="hidden" class="form-control" id="id_produk" name="id_produk">
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary">Order</button>
          <a class="btn btn-secondary" href="{{route('transaksi')}}">Kembali</a>
        </div>
      </form>
    </div>
  </section>
</main>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<script>
  $('#produk').change(function() {
      var id = $(this).val();
      var url = '{{ route("produk.show", ":id") }}';
      url = url.replace(':id', id);
      console.log(url)
      $.ajax({
          url: url,
          type: 'get',
          dataType: 'json',
          success: function(response) {
            console.log(response)
              if (response != null) {
                  $('#id_produk').val(response.id);                  
                  $('#harga').val(response.harga_jual);
                  $('#stok').val(response.stok);
                  $("#jumlah_pembelian")
                  .attr("max", response.stok)
              }
          }
      });
  });
  $('#jumlah_pembelian').change(function() {
      var total_pembelian = $(this).val();
      var harga = $("#harga").val();
      console.log(total_pembelian*harga)
      $('#total_harga').val(total_pembelian*harga);
      $('#total_harga_hidden').val(total_pembelian*harga);
      $('#kembalian').val(parseInt(-total_pembelian*harga));
  });
  $('#total_bayar').change(function() {
      var kembalian = $("#kembalian").val();
      var bayar = $("#total_bayar").val();
      $('#kembalian').val(parseInt(kembalian)+parseInt(bayar));
  });
</script>
@include('layout.footer')