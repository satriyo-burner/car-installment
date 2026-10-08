<?php
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$pesan = "";
$hasil = null;

// get form values
$nama  = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$harga = trim($_POST["harga"] ?? "");
$dpp   = $_POST["dpp"] ?? "";
$tenor = $_POST["tenor"] ?? "";

if (isset($_POST["submit"])) {

    // checked in order, starting from nama
    if (empty($nama)) {
        $pesan = "Nama harus diisi";
    } elseif (empty($email)) {
        $pesan = "Email harus diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $pesan = "Format email tidak valid";
    } elseif (empty($harga) || !is_numeric($harga) || $harga <= 0) {
        $pesan = "Harga mobil harus diisi";
    } elseif (!in_array($dpp, ["10", "20", "30", "40", "50", "60"])) {
        $pesan = "DP harus dipilih";
    } elseif (!in_array($tenor, ["1", "2", "3", "4", "5"])) {
        $pesan = "Tenor harus dipilih";
    } else {
        // calculate
        $bunga     = 20 / 100;
        $nominalDP = $harga * ($dpp / 100);
        $bulan     = $tenor * 12;
        $angsuran  = (($harga + ($harga * $bunga)) - $nominalDP) / $bulan;

        $hasil = compact("nama", "email", "harga", "nominalDP", "bulan", "angsuran");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A1A Car Installment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 400px;
    }
    .about-img {
      height: 300px;
      width: 100%;
      object-fit: cover;
    }
    footer {
      margin-top: 5rem;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <header class="bg-dark">
    <nav class="navbar navbar-dark">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="car.svg" width="40" height="40" class="me-2" alt="Car logo">
          A1A Car Installment
        </a>
        <ul class="navbar-nav flex-row">
          <li class="nav-item">
            <a href="#home" class="nav-link px-3">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link px-3">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link px-3">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="car1.jpg" class="d-block w-100" alt="First car">
        </div>
        <div class="carousel-item">
          <img src="car2.jpg" class="d-block w-100" alt="Second car">
        </div>
        <div class="carousel-item">
          <img src="car3.jpeg" class="d-block w-100" alt="Third car">
        </div>
      </div>

      <button class="carousel-control-prev" type="button"
        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button"
        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <section id="about" class="py-5 container">
    <div class="align-items-center row">
      <div class="col-md-6">
        <h2>Tentang Perusahaan</h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, quidem incidunt placeat, sunt pariatur praesentium sed dolores corrupti quae animi deserunt delectus voluptatem repellendus qui deleniti. Sunt perferendis quaerat temporibus.
        </p>
      </div>
      <div class="col-md-6">
        <img src="car4.jpg" class="about-img" alt="Car">
      </div>
    </div>
  </section>

  <section id="contact" class="container">
    <div class="row justify-content-center">
      <div>
        <div class="card">
          <div class="p-4">
            <h2 class="text-center">Kalkulator Angsuran</h2>

            <form action="#contact" method="post">

              <?php if ($pesan): ?>
                <div class="alert alert-danger"><?= e($pesan) ?></div>
              <?php endif; ?>

              <div class="mb-3">
                <label for="nama">Nama</label>
                <input id="nama" class="form-control" name="nama" type="text"
                       value="<?= e($nama) ?>">
              </div>

              <div class="mb-3">
                <label for="email">Email</label>
                <input id="email" class="form-control" name="email" type="email"
                      value="<?= e($email) ?>">
              </div>

              <div class="mb-3">
                <label for="harga">Harga Mobil</label>
                <input id="harga" class="form-control" name="harga" type="number"
                       value="<?= e($harga) ?>">
              </div>

              <div class="mb-3">
                <label for="dpp">DP</label>
                <select name="dpp" id="dpp" class="form-select">
                  <?php foreach ([10, 20, 30, 40, 50, 60] as $p): ?>
                    <option value="<?= $p ?>" <?= $dpp == $p ? "selected" : "" ?>><?= $p ?>%</option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-4">
                <label class="d-block">Tenor</label>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tenor"
                           id="tenor<?= $i ?>" value="<?= $i ?>"
                           <?= $tenor == $i ? "checked" : "" ?>>
                    <label class="form-check-label" for="tenor<?= $i ?>"><?= $i ?> Tahun</label>
                  </div>
                <?php endfor; ?>
              </div>

              <button class="btn btn-dark" type="submit" name="submit">
                Hitung Angsuran
              </button>
            </form>
          </div>
        </div>

        <?php if ($hasil): ?>
          <div class="mt-4">
            <h3 class="mb-4">Hasil Perhitungan</h3>
            <p>Nama: <?= e($hasil["nama"]) ?></p>
            <p>Email: <?= e($hasil["email"]) ?></p>
            <p>Harga Mobil: Rp <?= number_format($hasil["harga"], 0, ",", ".") ?></p>
            <p>DP: Rp <?= number_format($hasil["nominalDP"], 0, ",", ".") ?></p>
            <p>Bunga: 20%</p>
            <p>Tenor: <?= $hasil["bulan"] ?> bulan</p>
            <p>Jumlah Angsuran:<br>
              <strong>Rp <?= number_format($hasil["angsuran"], 0, ",", ".") ?> / bulan</strong>
            </p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <footer id="footer" class="bg-black text-white text-center">
    ©A1A Car Installment 2026
    <br>
    <span class="text-secondary">✆+123-456-7890</span>
  </footer>

</body>
</html>