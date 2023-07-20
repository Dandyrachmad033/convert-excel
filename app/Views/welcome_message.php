<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        .setara {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        
        
    }

</style>

</head>
<body>
    <center>
        <form action="Upload" method="post" enctype="multipart/form-data">
            <input type="file" name="excelFile" accept=".xlsx, .xls">
            <input type="submit" value="Upload">
        </form>
        <br>
        <br>
        <div class="setara">

            <form action="Delete" method="post" enctype="multipart/form-data">
                <input type="submit" value="Delete">
            </form>
            <form action="Export" method="post" enctype="multipart/form-data">
                <input type="submit" value="Download siarvi">
            </form>

        </div>
        
        <table border= "2">
            <tr>
                <th>No</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Nama ibu</th>
                <th>Alamat(KTP)</th>
                <th>Alamat Domisili</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
            </tr>

            <?php foreach ($records as $record): ?>
        <tr>
            <td><?php echo $record['id']; ?></td>
            <td><?php echo $record['tanggal_pemeriksaan']; ?></td>
            <td><?php echo $record['nama']; ?></td>
            <td><?php echo $record['NIK']; ?></td>
            <td><?php echo $record['nama_ibu_kandung']; ?></td>
            <td><?php echo $record['alamat']; ?></td>
            <td><?php echo $record['alamat_domisili']; ?></td>
            <td><?php echo $record['tanggal_lahir']; ?></td>
            <td><?php echo $record['jenis_kelamin']; ?></td>
        </tr>
            <?php endforeach; ?>
        </table>

    </center>




</table>
</body>
</html>