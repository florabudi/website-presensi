@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Rekap Presensi Siswa') }}</h1>

    <style>
    .no-vertical-borders th, 
    .no-vertical-borders td {
        border-left: none;
        border-right: none;
    }
    .custom-border thead th {
        border-top: none !important; 
        border-bottom: 1px solid #ddd !important; 
    }
    .custom-border tbody tr:first-child td {
        border-top: 1px solid #ddd !important; 
    }
    .custom-border th, 
    .custom-border td {
        border-bottom: 1px solid #ddd;1
    }
    .custom-border thead th:first-child {
        border-top-left-radius: 10px; 
        border-left: 1px solid #ffffff !important;
    }
    .custom-border thead th:last-child {
        border-top-right-radius: 10px; 
        border-right: 1px solid #ffffff !important;
    }
    .custom-border thead th {
        background-color: #4cb9c7 !important; 
        color: white !important; 
        border-top: none !important; 
    }
    .custom-border tbody td {
        border-bottom: 1px solid #ddd;
    }

    /* Set the table to be wider */
    .custom-border {
        width: 100%; /* Make the table take up the full width of the container */
        table-layout: fixed; /* Make the table layout fixed for even column width */
    }

    /* Set specific columns to be wider */
    .custom-border th, .custom-border td {
        padding: 20px; /* Add padding for more spacious cells */
        white-space: nowrap; /* Prevent text from wrapping */
    }

    /* Make sure table is not centered */
    .container {
        max-width: 100%; /* Allow the container to take full width */
        padding-left: 0;  /* Remove left padding if necessary */
        padding-right: 0; /* Remove right padding if necessary */
    }

    /* Search box style */
    .search-box {
        display: flex; /* Use flexbox for layout */
        justify-content: flex-end; /* Align to the right */
        margin-bottom: 20px; /* Add space below the search box */
    }

    .search-box input {
        width: 300px; /* Set a fixed width for the input */
    }
    </style>

    <div class="container mt-5">
        <h1 class="mb-4">Daftar Kehadiran</h1>
        <table class="table no-vertical-borders custom-border" id="attendanceTable">
            <thead class="thead-dark">
                <tr>
                    {{-- <th style="background-color: #50be87; color: white;">No.</th>  --}}
                    {{-- <th style="background-color: #94c6fc; color: white;">Nama</th> 
                    <th style="background-color: #94c6fc; color: white;">Kelas</th>
                    <th style="background-color: #94c6fc; color: white;">Jurusan</th>  --}}
                    <th style="background-color: #94c6fc; color: white;">Tanggal</th> 
                    <th style="background-color: #94c6fc; color: white;">Keterangan</th> 
                    <th style="background-color: #94c6fc; color: white;">Waktu Datang</th> 
                    <th style="background-color: #94c6fc; color: white;">Waktu Pulang</th>  
                    <th>
                        {{-- <a href="#" class="btn btn-sm btn-info">
                            <i class="Aksi"></i> Aksi
                        </a> --}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kehadiran as $data)
                <tr class="table-bordered">
                    {{-- <td>{{ $data['no.'] }}</td> --}}
                    {{-- <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['kelas'] }}</td>
                    <td>{{ $data['jurusan'] }}</td> --}}
                    <td>{{ $data['tanggal'] }}</td>
                    <td>{{ $data['keterangan'] }}</td>
                    <td>{{ $data['waktu_datang'] }}</td>
                    <td>{{ $data['waktu_pulang'] }}</td>
                    {{-- <td>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('attendanceTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) { // Start from 1 to skip the header
                const td = tr[i].getElementsByTagName('td');
                let rowVisible = false;

                for (let j = 0; j < td.length; j++) {
                    const cell = td[j];
                    if (cell) {
                        const txtValue = cell.textContent || cell.innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            rowVisible = true; // Found a match
                            break; // No need to check other cells
                        }
                    }
                }

                tr[i].style.display = rowVisible ? '' : 'none'; // Show or hide the row
            }
        }
    </script>

@endsection
