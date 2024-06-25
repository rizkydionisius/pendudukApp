<!DOCTYPE html>
<html>
<head>
    <title>Daftar Provinsi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
        }
        .button:hover {
            background-color: #357ab7;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #4a90e2;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }
        .edit-button {
            background-color: #5cb85c; /* Hijau */
        }
        .edit-button:hover {
            background-color: #4cae4c; /* Hijau tua saat hover */
        }
        .delete-button {
            background-color: #d9534f; /* Merah */
        }
        .delete-button:hover {
            background-color: #c9302c; /* Merah tua saat hover */
        }
        .view-report-button {
            background-color: #5cb85c; /* Hijau */
        }
        .view-report-button:hover {
            background-color: #4cae4c; /* Hijau tua saat hover */
        }
        .action-buttons a, .action-buttons button {
            padding: 6px 12px;
            font-size: 0.9rem;
            margin-right: 5px;
            text-decoration: none;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Provinsi</h1>
        <div style="margin-bottom: 20px;">
            <a href="{{ route('provinsi.create') }}" class="button">Tambah Provinsi</a>
            <a href="{{ url('/') }}" class="button">Kembali ke Home</a>
            <a href="{{ route('laporan.provinsi') }}" target="_blank" class="button view-report-button">Lihat Laporan</a>
        </div>
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif
        <table>
            <tr>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
            </tr>
            @foreach ($provinsis as $provinsi)
                <tr>
                    <td>{{ $provinsi->nama_provinsi }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('provinsi.edit', $provinsi->id) }}" class="edit-button">Edit</a>
                        <form action="{{ route('provinsi.destroy', $provinsi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
