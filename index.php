<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</head>
<?php 

    $no = 0;
    $grade = "";
    $avg = 0;
    $dValue = array();
    $sis = 0;
    // Array
    $m1 = ['nim' => '011022001', 'nama'=> 'Abizar Almun', 'nilai' => 90];
    $m2 = ['nim' => '011022002', 'nama'=> 'Abidun Maum', 'nilai' => 80];
    $m3 = ['nim' => '011022003', 'nama'=> 'Darman Samsudin', 'nilai' => 65];
    $m4 = ['nim' => '011022004', 'nama'=> 'Haikal Merry', 'nilai' => 75];
    $m5 = ['nim' => '011022005', 'nama'=> 'Bazaar Takwiya', 'nilai' => 40];
    $m6 = ['nim' => '011022006', 'nama'=> 'Takuma Serii', 'nilai' => 79];
    $m7 = ['nim' => '011022007', 'nama'=> 'Popo Buna', 'nilai' => 88];
    $m8 = ['nim' => '011022008', 'nama'=> 'Dery Rahman', 'nilai' => 56];
    $m9 = ['nim' => '011022009', 'nama'=> 'Casey Salom', 'nilai' => 80];
    $m10 = ['nim' => '0110220010', 'nama'=> 'Fiki Farhansyah', 'nilai' => 10];
    $m11 = ['nim' => '0110220011', 'nama'=> 'Ikhwan Innur', 'nilai' => 86];
    $m12 = ['nim' => '0110220012', 'nama'=> 'Sada Husein', 'nilai' => 98];
    $m13 = ['nim' => '0110220013', 'nama'=> 'Sarji Roku', 'nilai' => 55];
    $m14 = ['nim' => '0110220014', 'nama'=> 'Silver Rayleigh', 'nilai' => 87];
    $m15 = ['nim' => '0110220015', 'nama'=> 'Onna Oboro', 'nilai' => 45];

    // Array Assoiative
    $mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $m13, $m14, $m15];


?>
<body>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>GRADE</th>
                <th>PREDIKAT</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($mahasiswa as $sm){

                    // Proses Gradding
                    if($sm['nilai'] >= 85 && $sm['nilai'] <= 100) $grade="A"; 
                    else if($sm['nilai'] >= 75 && $sm['nilai'] < 85) $grade="B"; 
                    else if($sm['nilai'] >= 60 && $sm['nilai'] < 75) $grade="C"; 
                    else if($sm['nilai'] >= 30 && $sm['nilai'] < 60) $grade="D"; 
                    else if($sm['nilai'] >= 0 && $sm['nilai'] < 30) $grade="E";
                    else $grade = "";

                    // Proses Predikat
                    switch ($grade) {
                        case "A" : $predikat = "Memuaskan"; break;
                        case "B" : $predikat = "Bagus"; break;
                        case "C" : $predikat = "Cukup"; break;
                        case "D" : $predikat = "Kurang"; break;
                        case "E" : $predikat = "Buruk"; break;
                        default: $predikat = " ";
                    }
                    $no++;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $sm['nim'] ?></td>
                <td><?= $sm['nama'] ?></td>
                <td><?= $sm['nilai'] ?></td>
                <td><?= $keterangan = ($sm['nilai'] >= 60) ? "Lulus" : "Tidak Lulus";?> </td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php 
                array_push($dValue, $sm['nilai']);
                $sis += $sm['nilai'];

                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>Rata - Rata: <?= $avg=($sis/$no)?></td>
                <td>Nilai Tertinggi: <?= max($dValue)?></td>
                <td>Nilai Terendah: <?= min($dValue)?></td>
                <td>Jumlah Mahasiswa: <?= $no ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>