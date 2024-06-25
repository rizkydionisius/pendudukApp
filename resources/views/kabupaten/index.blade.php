<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kabupaten</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background-color: #4a90e2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }
        .button:hover {
            background-color: #357ab7;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }
        label {
            display: block;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .button-container {
            text-align: left;
            margin-bottom: 20px;
        }
        .print-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }
        .print-button:hover {
            background-color: #45a049;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Kabupaten</h1>
    <div class="button-container">
        <a href="{{ route('kabupaten.create') }}" class="button">Tambah Kabupaten</a>
        <a href="{{ url('/') }}" class="button" style="margin-left: 10px;">Kembali ke Home</a>
        <button class="print-button" onclick="window.print()">Print Tabel</button>
    </div>
    
    <form method="GET" action="{{ route('kabupaten.index') }}">
        <input type="text" name="search" placeholder="Cari Kabupaten" value="{{ request('search') }}">
        <br><br>
        @foreach ($provinsis as $provinsi)
            <label>
                <input type="checkbox" name="provinsi_ids[]" value="{{ $provinsi->id }}" 
                {{ in_array($provinsi->id, request('provinsi_ids', [])) ? 'checked' : '' }}>
                {{ $provinsi->nama_provinsi }}
            </label><br>
        @endforeach
        <button type="submit" class="button" style="margin-top: 10px;">Filter</button>
    </form>
    
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>Nama Kabupaten</th>
                <th>Provinsi</th>
                <th>Jumlah Penduduk</th>
                <th class="no-print">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kabupatens as $kabupaten)
                <tr>
                    <td>{{ $kabupaten->nama_kabupaten }}</td>
                    <td>{{ $kabupaten->provinsi->nama_provinsi }}</td>
                    <td>{{ $kabupaten->jumlah_penduduk }}</td>
                    <td class="no-print">
                        <a href="{{ route('kabupaten.edit', $kabupaten->id) }}" class="button" style="background-color: #ffb74d;">Edit</a>
                        <form action="{{ route('kabupaten.destroy', $kabupaten->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: #e57373;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
