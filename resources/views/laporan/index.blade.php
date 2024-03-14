@include('layout.header')
@include('layout.navbar-top')
@include('layout.navbar-side')
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Laporan</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Laporan</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title"> Laporan Laba Kotor </span></h5>
                        </div>
                        <div class="d-flex gap-3 justify-content-center mb-4">
                            <a class="btn btn-success pull-right pl-4" href="{{route('laporan.kotor')}}">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title"> Laporan Laba Bersih </span></h5>
                        </div>
                        <div class="d-flex gap-3 justify-content-center mb-4">
                            <a class="btn btn-success pull-right pl-4" href="{{route('laporan.bersih')}}">Download</a>
                        </div>
                    </div>
                </div>
                <!-- End Sales Card -->
            </div>
        </div><!-- End Left side columns -->
    </section>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
    <script>
    function delete_user(id) {
        var result = confirm("Anda Yakin menghapus produk ini ?");
        var url = '{{ route("produk.hapus", ":id") }}';
        url = url.replace(':id', id);
        if (result==true) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'JSON',
                data:{
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    alert("Data Berhasil Di Hapus");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        }
    }
    </script>
</main><!-- End #main -->
@include('layout.footer')