<?php
require "../../function.php";
$keyword = $_GET["keyword"];
// $query = "SELECT * FROM produk WHERE nama LIKE '%$keyword%'";
// $produk = query($query);
$jumlahdataperhalaman = 8;
$jumlahdata = count(query("SELECT * FROM produk WHERE nama LIKE '%$keyword%' order by nama asc"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;
$produk = query("SELECT * FROM produk WHERE nama LIKE '%$keyword%' limit $awaldata, $jumlahdataperhalaman");
?>

<?php if ($jumlahdata >= 1) : ?>
    <div class="row">
        <?php foreach ($produk as $data) : ?>
            <div class="col-lg-3 col-md-6 col-6">
                <a href="detail-produk.php?id=<?= $data['id'] ?>" style="text-decoration: none;">
                    <div class="custom-card shadow bg-body ">
                        <img src="assets/<?= $data['gambar'] ?>" alt=" " class="d-block m-auto" />
                        <h5><?= $data['nama'] ?></h5>
                        <h6>Rp <?= number_format($data['harga']) ?></h6>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
<?php else : ?>
    <div class="row text-center justify-content-center align-items-center" style="height: 36vh;">
        <h1>tidak ada data</h1>
    </div>
<?php endif ?>
<?php if ($_GET['keyword'] == '') : ?>
    <ul class="pagination mt-3">
        <li class="page-item <?= ($halamanaktif > 1) ? "" : "disabled" ?>">
            <a class="page-link" href="produk.php?halaman=<?= $halamanaktif - 1 ?>" aria-label="Previous" aria-disabled="true">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
            <?php if ($i == $halamanaktif) : ?>
                <li class="page-item active" aria-current="page"><a class="page-link " href="produk.php?halaman=<?= $i ?>"><?= $i ?></a></li>
            <?php else : ?>
                <li class="page-item"><a class="page-link" href="produk.php?halaman=<?= $i ?>"><?= $i ?></a></li>
            <?php endif ?>
        <?php endfor ?>
        <li class="page-item <?= ($halamanaktif <= 1) ? "" : "disabled" ?>">
            <a class="page-link" href="produk.php?halaman=<?= $jumlahhalaman + 1 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
<?php endif ?>