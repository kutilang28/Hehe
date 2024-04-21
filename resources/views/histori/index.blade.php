@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                    <div class="card-tools">
                        <button onclick="printTable()" class="btn btn-primary">Print Table</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="monthFilterForm">
                        <div class="form-group">
                            <label for="monthFilter">Filter by Month:</label>
                            <select id="monthFilter" class="form-control">
                                <option value="">Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                                <!-- Add other months as needed -->
                            </select>
                        </div>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th style="width: 10px">id</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Foto Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item as $item)
                            <tr>
                                <td>{{$item -> id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->buku->judul}}</td>
                                <td>
                                    <img src="{{asset('img/'.$item->buku->foto)}}" width="100px">
                                </td>
                                <td>{{$item->tanggal_peminjaman}}</td>
                                <td>{{$item->tanggal_pengembalian}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>

@include('layouts.footer')

<script>
    function printTable() {
        const printWindow = window.open('', '', 'width=600,height=600');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('table, th, td { border: 1px solid black; border-collapse: collapse; }'); // Added CSS for table border
        printWindow.document.write('th, td { padding: 10px; }'); // Optional: Add padding to cells
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<table>');
        printWindow.document.write(document.querySelector(".table").outerHTML);
        printWindow.document.write('</table>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

    // Filter table rows based on selected month
    document.getElementById('monthFilter').addEventListener('change', function() {
        const selectedMonth = this.value;
        const rows = document.querySelectorAll('#data-table tbody tr');
        rows.forEach(row => {
            const tanggalPeminjaman = row.querySelector('td:nth-child(5)').textContent.trim(); // Assuming the tanggal_peminjaman is the fifth column
            const peminjamanMonth = tanggalPeminjaman.substring(5, 7); // Extract month from tanggal_peminjaman
            if (selectedMonth === '' || selectedMonth === peminjamanMonth) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
