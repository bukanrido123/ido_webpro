<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertarungan Petarung</title>
</head>
<body>
    <h2>Pilih Nomor Petarung untuk Diadu</h2>
    <form method="POST">
        <label for="petarung">Masukkan nomor petarung (1-5):</label>
        <input type="number" id="petarung" name="petarung" min="1" max="5" required>
        <input type="submit" value="Adukan">
        <form method="POST" action="proses_pertarungan.php">


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Daftar petarung dari kedua tim
        $timA = [
            "Andre" => 80, 
            "Berli" => 75, 
            "Charlie" => 67, 
            "Desmond" => 88, 
            "Erina" => 95
        ];
        
        $timB = [
            "Farah" => 75, 
            "Gerry" => 89, 
            "Hesti" => 76, 
            "Indra" => 61, 
            "Jordan" => 96
        ];

        // Mendapatkan nomor petarung yang dipilih pengguna
        $nomorPetarung = (int)$_POST['petarung'] - 1;

        // Mendapatkan nama-nama petarung dari kedua tim
        $namaTimA = array_keys($timA);
        $namaTimB = array_keys($timB);

        // Memastikan nomor petarung valid
        if ($nomorPetarung >= 0 && $nomorPetarung < 5) {
            $petarungA = $namaTimA[$nomorPetarung];
            $petarungB = $namaTimB[$nomorPetarung];
            $kekuatanA = $timA[$petarungA];
            $kekuatanB = $timB[$petarungB];

            // Menampilkan hasil pertarungan
            echo "<h3>Pertarungan antara $petarungA (Kekuatan: $kekuatanA) vs $petarungB (Kekuatan: $kekuatanB)</h3>";

            if ($kekuatanA > $kekuatanB) {
                $sisaKekuatan = $kekuatanA - $kekuatanB;
                echo "<p>Pemenang: $petarungA! Sisa kekuatan: $sisaKekuatan</p>";
            } elseif ($kekuatanA < $kekuatanB) {
                $sisaKekuatan = $kekuatanB - $kekuatanA;
                echo "<p>Pemenang: $petarungB! Sisa kekuatan: $sisaKekuatan</p>";
            } else {
                echo "<p>Hasilnya seri! Tidak ada pemenang.</p>";
            }
        } else {
            // Jika nomor petarung tidak valid
            echo "<p>Nomor petarung tidak valid. Silakan pilih antara 1 dan 5.</p>";
        }
    }
    ?>
</body>
</html>
