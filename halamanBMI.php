<?php
class bmiPasien {
    public $nama,
           $berat,
           $tinggi,
           $umur,
           $jenisKelamin;
          
    public function hasilBMI() {
      return "<b>Nama : $this->nama<br><br>
              Berat Badan : $this->berat <br><br>                  
              Tinggi Badan : $this->tinggi <br><br>
              Umur : $this->umur <br><br>
              Jenis Kelamin : $this->jenisKelamin</b>"; 
    }
    public function statusBMI() {

    }
  }
  if (isset($_GET["name"])) {
    $bmi = new bmiPasien;
    $bmi->nama = $_GET["name"];
    $bmi->berat = $_GET["weight"];
    $bmi->tinggi = $_GET["height"];
    $bmi->umur = $_GET["age"];
    $bmi->jenisKelamin = $_GET["gender"];
    echo $bmi->hasilBMI();
  }
  $pasien1 = ['nama'=>'Ruslianto Pradana', 'kelamin'=>'Perempuan', 'umur'=>20, 'berat'=>40.5, 'tinggi'=>140];
  $pasien2 = ['nama'=>'Ratih Wulandari', 'kelamin'=>'Perempuan', 'umur'=>22, 'berat'=>45, 'tinggi'=>165];
  $pasien3 = ['nama'=>'Joni Gege', 'kelamin'=>'Laki-laki', 'umur'=>17, 'berat'=>80.5, 'tinggi'=>190];
  $pasien4 = ['nama'=> $bmi->nama, 'kelamin'=> $bmi->jenisKelamin, 'umur'=>$bmi->umur, 'berat'=>$bmi->berat, 'tinggi'=>$bmi->tinggi];

  $ar_pasien = [$pasien1, $pasien2, $pasien3, $pasien4];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>OUTPUT</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5" style="color:#0F52BA;">Data BMI Pasien</h2>
        <table class="table table-hover table-striped" >
            <thead>
                <tr style="color:#0F52BA;">
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Tinggi</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Hasil</th>
                </tr>
            </thead>
            <tbody style="color:#0F52BA;">
                <?php 
                    $nomor = 1;
                    foreach($ar_pasien as $pasien) {
                        echo '<tr><td>'.$nomor.'</td>';
                        echo '<td>'.$pasien['nama'].'</td>';
                        echo '<td>'.$pasien['kelamin'].'</td>';
                        echo '<td>'.$pasien['umur'].'</td>';
                        echo '<td>'.$pasien['berat'].'</td>';
                        echo '<td>'.$pasien['tinggi'].'</td>';
                        $BMI = $pasien["berat"] / (($pasien["tinggi"]/100)**2);
                        echo '<td>'.number_format($BMI,1).'</td>';
                        if ($BMI < 18.5) {
                            echo "<td>Kekurangan Berat Badan</td>";
                        }
                        else if ($BMI >= 18.5 && $BMI <= 24.9) {
                            echo "<td>Normal (ideal)</td>";
                        }
                        else if ($BMI >= 25.0 && $BMI <= 29.9) {
                            echo "<td>Kelebihan Berat Badan</td>";
                        }
                        else {
                            echo "<td>Kegemukan (Obesitas)</td>";
                        }
                        echo '</tr>';
                        $nomor++;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>