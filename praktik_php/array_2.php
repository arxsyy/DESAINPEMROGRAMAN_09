<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 50%;
            border: 1px solid #ddd;
            margin: 20px 0;
        }
        th, td {
            text-align: left;
            padding: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];
    ?>

    <h2>Data Dosen</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= $Dosen['nama']; ?></td>
        </tr>
        <tr>
            <th>Domisili</th>
            <td><?= $Dosen['domisili']; ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= $Dosen['jenis_kelamin']; ?></td>
        </tr>
    </table>
</body>
</html>