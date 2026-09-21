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

  <section id="about" class="py-5 container ">
    <div class="align-items-center row ">
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
            <h2 class="text-center">
              Kalkulator Angsuran
            </h2>
            <form action="" method="post">
              <div>
                <label for="harga">
                  Harga Mobil
                </label>
                <input id="harga" class="form-control" name="harga" type="number">

              </div>

              <div>
                <label for="dpp">
                  DP
                </label>
                <select name="dpp" id="dpp">
                  <option value="10">10%</option>
                  <option value="20">20%</option>
                  <option value="30">30%</option>
                  <option value="40">40%</option>
                  <option value="50">50%</option>
                  <option value="60">60%</option>
                </select>
              </div>

              <div class="mb-5">
                <label>Tenor</label>
                <div class="d-flex gap-2">
                  <div>
                    <input type="radio" name="tenor" id="1"
                      value="1" required>
                    <label for="1">1 Tahun</label>
                  </div>
                    <input type="radio" name="tenor" id="2"
                      value="2" >
                    <label for="2">2 Tahun</label>

                    <input type="radio" name="tenor" id="3"
                      value="3" >
                    <label for="3">3 Tahun</label>
                    <input type="radio" name="tenor" id="4"
                      value="4" >
                    <label for="4">
                      4 Tahum
                    </label>
                    <input type="radio" name="tenor" id="5"
                      value="5">
                    <label for="5">
                      5 Tahun
                    </label>
                </div>
              </div>
              <button class="btn btn-dark" type="submit" >
                Hitung Angsuran
              </button>
            </form>
          </div>
        </div>


        <?php
            $bunga = 20 / 100;
            $harga = $_POST["harga"];
            $dp = $_POST["dpp"] / 100;
            $tenor = $_POST["tenor"];
            $nominalDP = $harga * $dp;
            $angsuran = (($harga + ($harga * 20 / 100)) - $dp) / ($tenor * 12);
        ?>

          <div>
            <div>
              <h3 class="mb-5">
                Hasil Perhitungan
              </h3>
              <p>
                Harga Mobil:
                <?= $harga ?>
              </p>
              <p>
                DP: <?= $nominalDP ?>
              </p>
              <p>
                Bunga: 20%
              </p>
              <p>
                Tenor:
                <?= $tenor ?> Tahun
              </p>
              <p>
                Jumlah Angsuran:<br>
                <span>
                  <?= $angsuran ?> / bulan
                </span>
              </p>
            </div>
          </div>
      </div>
    </div>
  </section>

  <footer id="contact" class="bg-black text-white text-center">
    ©A1A Car Installment 2026
    <br>
    <span class="text-secondary">✆+123-456-7890</span>
  </footer>

</body>
</html>