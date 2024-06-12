<?php
    include 'koneksi.php';

    $query = "SELECT * FROM product;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Impor CSS -->
    <link rel="stylesheet" href="style/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>CRUD | INVENTARIS M-ONE</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD | PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login/login_form.php">Logout</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <!-- Navbar Tutup -->
    <!-- Judul -->
    <div class="container">
        <h1 class="mt-4 text-uppercase fw-bold">Data Inventaris</h1>
        <hr>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang telah disimpan di database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <div class="row">
            <div class="col-md">
                <a href="kelola.php" class="btn btn-primary"><i class="fas fa-plus"></i></i></i>&nbsp;Tambah Data</a>
            </div>
        </div>
        <!-- Table -->
        <div class="row my-5">
            <div class="table-responsive">
                <table id="data" class="table align-middle table-bordered table-hover" style="width: 100%;">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;"><center>No.</center></th>
                            <th>Product</th>
                            <th>Items</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($result = mysqli_fetch_assoc($sql)){
                        ?>
                        <tr>
                            <td><center>
                                <?php echo ++$no; ?>.
                            </center></td>
                            <td>
                                <?php echo $result['product_name']; ?>
                            </td>
                            <td>
                                <?php echo $result['items']; ?>
                            </td>
                            <td>
                                <?php echo $result['category']; ?>
                            </td>
                            <td>
                                <?php echo $result['price']; ?>
                            </td>
                            <td>
                                <img src="images/<?php echo $result['image']; ?>" style="width: 100px;">
                            </td>
                            <td>
                                <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Yakin gaaa???')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-uppercase fw-bold">About</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores iure, expedita vero provident corporis beatae? Laborum fugit dolorum cumque dicta sed. Aspernatur quibusdam rerum dolorem excepturi velit! Reprehenderit, optio expedita?</p>
            </div>
            <div class="col-md-6 text-center link">
                <h4 class="text-uppercase fw-bold">Links Account</h4>
                <a href="https://github.com/RoyanMutuharjo" target="_blank"><i class="bi bi-github fs-2"></i></a>
                <a href="https://www.instagram.com/royanbaekk/" target="_blank"><i class="bi bi-instagram fs-2"></i></a>
                <a href="https://www.linkedin.com/in/royan-pplg-3-mutuharjo-317886311/" target="_blank"><i class="bi bi-linkedin fs-2"></i></a>
                <a href="https://www.threads.net/@royanbaekk" target="_blank"><i class="bi bi-threads-fill fs-2"></i></a>
            </div>
        </div>
        <footer class="text-center" style="padding: 5px;">
            <p>Create by <u class="fw-bold">Royan Aji N.S</u></p>
        </footer>
    </div>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>