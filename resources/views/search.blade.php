<!-- resources/views/hasil_pencarian.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Penduduk Pelatihan X</title>
</head>
<body>
    <h2>Hasil Pencarian Penduduk Pelatihan X</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Usia</th>
                <th>Pelatihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendudukPelatihanX as $penduduk)
                <tr>
                    <td>{{ $penduduk->nama }}</td>
                    <td>{{ $penduduk->usia }}</td>
                    <td>{{ $penduduk->pelatihan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total penduduk yang telah menyelesaikan pelatihan X: {{ $pendudukPelatihanX->count() }}</p>
</body>
</html>

