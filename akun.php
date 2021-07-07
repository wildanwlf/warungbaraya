<?php
include "_head.php";
echo "<title>Detail Akun Saya </title>";
include "_heads.php";
include "_menu.php";

if (empty($_SESSION["pelanggan"]) or !isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login atau Daftar terlebih dahulu !');</script>";
    echo "<script>location='log-reg.php';</script>";
}

$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$queri = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pel = $queri->fetch_assoc();
?>
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link active">Detail Akun</a></li>
                            <li><a href="#orders" data-toggle="tab" class="nav-link">Orders History</a></li>
                            <li><a href="#address" data-toggle="tab" class="nav-link">Alamat Pengiriman</a></li>
                            <li><a href="logout.php" class="nav-link">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="akun.php">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_pelanggan" value="<?= $pel['nama_pelanggan'] ?>">
                                            <label>Jenis Kelamin</label>
                                            <input type="text" name="jk" value="<?= $pel['jk'] ?>">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?= $pel['email'] ?>">
                                            <label>Password</label>
                                            <input type="number" name="no_hp" value="<?= $pel['no_hp'] ?>">
                                            <br>
                                            <span class="custom_checkbox">
                                                <input type="checkbox" value="1" name="newsletter">
                                                <label>Sign up for our newsletter<br><em>For that purpose, please find our contact info in the legal notice.</em></label>
                                            </span>
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>Riwayat Pembelian</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $koneksi->query("SELECT * FROM tbl_transaksi WHERE id_pelanggan = '$id_pelanggan'");
                                        while ($pem = $sql->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <td><?= $pem['id_transaksi'] ?></td>
                                                <td><?= $pem['tgl_transaksi'] ?></td>
                                                <td>
                                                    <?php if ($pem['status'] == 'Selesai') { ?>
                                                        <span class="text-success"><?= $pem['status'] ?></span>
                                                    <?php } else { ?>
                                                        <span><?= $pem['status'] ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td>Rp. <?= number_format($pem['total_pembelian']) ?></td>
                                                <td><a href="detail_pembelian.php?transaksi=<?= $pem['id_transaksi'] ?>" class="view">Lihat</a></td>
                                            </tr>
                                        <?php endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <form method="post">
                                <h4 class="billing-address">Alamat Penagihan</h4>
                                <p>Alamat berikut akan digunakan di halaman checkout secara default.</p>
                                <p><strong><?= $pel['nama_pelanggan'] ?></strong></p>
                                <address>
                                    <textarea placeholder="Masukan alamat lengkap *" name="alamat" class="form-control" rows="6" required><?= $pel['alamat'] ?></textarea>
                                </address>
                                <p>Jawa Barat. Indonesia.</p>
                                <div class="save_button primary_btn default_button">
                                    <button name="simpan" type="submit">Simpan Perubahan</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['simpan'])) {
                                $alamat = $_POST['alamat'];
                                $koneksi->query("UPDATE tbl_pelanggan SET alamat='$alamat' WHERE id_pelanggan ='$id_pelanggan'");
                                echo "<script>alert('Alamat Pengiriman Berhasil Diubah !');</script>";
                                echo "<script>location='akun.php#address';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include "_foot.php";
?>