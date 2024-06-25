<!DOCTYPE html>
<html>
<head>
    <title>Edit Kabupaten</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
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
        form {
            display: grid;
            gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Kabupaten</h1>
        <form action="{{ route('kabupaten.update', $kabupaten->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nama_kabupaten">Nama Kabupaten:</label>
            <input type="text" id="nama_kabupaten" name="nama_kabupaten" value="{{ $kabupaten->nama_kabupaten }}" required>
            <label for="provinsi_id">Provinsi:</label>
            <select id="provinsi_id" name="provinsi_id" required>
                @foreach ($provinsis as $provinsi)
                    <option value="{{ $provinsi->id }}" {{ $kabupaten->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                        {{ $provinsi->nama_provinsi }}
                    </option>
                @endforeach
            </select>
            <label for="jumlah_penduduk">Jumlah Penduduk:</label>
            <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" value="{{ $kabupaten->jumlah_penduduk }}" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
