<!DOCTYPE html>
<html>
<head>
    <title>Laporan Jumlah Penduduk per Provinsi</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
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
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background-color: #4a90e2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #357ab7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Jumlah Penduduk per Provinsi</h1>
        <table>
            <tr>
                <th>Nama Provinsi</th>
                <th>Jumlah Penduduk</th>
            </tr>
            @foreach ($provinsis as $provinsi)
                <tr>
                    <td>{{ $provinsi->nama_provinsi }}</td>
                    <td>{{ $provinsi->kabupaten->sum('jumlah_penduduk') }}</td>
                </tr>
            @endforeach
        </table>
        <button onclick="window.print()">Print</button>
    </div>
</body>
</html>
