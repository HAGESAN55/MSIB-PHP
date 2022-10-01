<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas 4 - PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <style>
    .sm {
      padding-top: 50px;
      padding-bottom: 50px;
    }
  </style>
</head>
<body>
  <div class="sm container-sm">
    <?php 
      class Pegawai {
        protected $nip;
        public $name;
        public $position;
        public $religion;
        public $status;
        static $no = 0;

        public function __construct($nip, $nas, $pos, $rel, $status) {
          $this->nip=$nip;
          $this->name=$nas;
          $this->position=$pos;
          $this->religion=$rel;
          $this->status=$status;
          self::$no++;

        }

        public function loadUser() {
          switch ($this->position){
            case 'manager' : $gajiPokok = 15000000; break;
            case 'asmen' : $gajiPokok = 10000000; break;
            case 'kabag' : $gajiPokok = 7000000; break;
            case 'staff' : $gajiPokok = 4000000; break;
          }
          $tunkel = 0;
          $zakatProfesi = 0;
          if($this->status == "belumMenikah") {
            if($this->religion == "Islam") {
                $tunj = 0.2 * $gajiPokok;
                $gajiKotor = ($gajiPokok + $tunj);
                if ($gajiKotor >= 6000000) $zakatProfesi = 0.025 * $gajiKotor;
                $thp = ($gajiKotor - $zakatProfesi);
            }
            else {
                $tunj = 0.2 * $gajiPokok;
                $gajiKotor = ($gajiPokok + $tunj);
                $thp = $gajiKotor;
            }
            $this->status = 'Not Married';
            $anak = 0;
          }
          else {
              if($this->religion == "Islam") {
                  $tunj = 0.20 * $gajiPokok;
                  // Proses Penghitungan Tunjangan Keluarga
                  $tunkel = 0.1 * $gajiPokok;
                  
                  $gajiKotor = $gajiPokok + $tunj + $tunkel;
                  // Proses Perhitungan Zakat Profesi
                  if ($gajiKotor >= 6000000) $zakatProfesi = 0.025 * $gajiKotor;
                  $thp = $gajiKotor - $zakatProfesi;
    
              }
              else {
                  $tunj = 0.20 * $gajiPokok;
                  
                  // Proses Penghitungan Tunjangan Keluarga
                  $tunkel = 0.1 * $gajiPokok;
                  
                  
                  $gajiKotor = $gajiPokok + $tunj + $tunkel;
                  $thp = $gajiKotor;
              }
              $this->status = "Married";
          };
          echo '<hr/>';
          echo '<b><u>Bank Indonesia</u></b>';
          echo '<br/> NIP: '.$this->nip;
          echo '<br/> Nama: '.$this->name;
          echo '<br/> Jabatan: '.$this->position;
          echo '<br/> Agama: '.$this->religion;
          echo '<br/> Status: '.$this->status;
          echo '<br/> Gaji Pokok: Rp.'.$gajiPokok;
          echo '<br/> Tunjangan: Rp.'.$tunj;
          echo '<br/> Tunjangan Keluarga: Rp.'.$tunkel;
          echo '<br/> Zakat: Rp.'.$zakatProfesi;
          echo '<br/> Gaji Bersih: Rp.'.$thp;
        }
      }

      $p1 = new Pegawai('001', 'Nabil', 'manager', 'Islam', 'belumMenikah');
      $p2 = new Pegawai('002', 'Juanda', 'asmen', 'Islam', 'Menikah');
      $p3 = new Pegawai('003', 'Mahkota', 'kabag', 'Islam', 'belumMenikah');
      $p4 = new Pegawai('004', 'Maharani', 'staff', 'Islam', 'Menikah');
      $p5 = new Pegawai('005', 'Megakembang', 'staff', 'Islam', 'belumMenikah');

      $Users = [$p1, $p2, $p3, $p4, $p5];
      echo '<h3 align="right"> Bank Indonesia </h3>';
      foreach($Users as $user) {
        $user->loadUser();
      }
      echo '<br/><hr/>Jumlah Nasabah: '.Pegawai::$no.' Orang.'
    ?>
  </div>
</body>
</html>