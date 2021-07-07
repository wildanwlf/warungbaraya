<?php
include "_head.php";
echo "<title>Login Atau Daftar Pelanggan </title>";
include "_heads.php";
include "_menu.php";
include "database.php";
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Login | Daftar</h3>
                    <ul>
                        <li><a href=".">home</a></li>
                        <li>Login atau Daftar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    <form method="POST">
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" placeholder="Masukan Email anda">
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="pass" placeholder="Masukan Password">
                        </p>
                        <div class="login_submit">
                            <button type="submit" name="login">login</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];

                        $ambil = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE email='$email' AND pass='$pass'");
                        //cek ketersediaan akun
                        $akuncocok = $ambil->num_rows;
                        //jika ada
                        if ($akuncocok == 1) {
                            //anda berhasil login
                            $akun = $ambil->fetch_assoc();
                            $_SESSION['pelanggan'] = $akun;
                            echo "<script>alert('Login Suksess !');</script>";
                            echo "<script>location='index.php';</script>";
                        }
                        //gagal login
                        echo "<script>alert('login gagal, periksa akun anda !');</script>";
                        echo "<script>location='log-reg.php';</script>";
                    }
                    ?>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Pendaftaran</h2>
                    <form method="POST">
                        <p>
                            <label>Nama Lengkap <span>*</span></label>
                            <input type="text" name="nama_pelanggan" placeholder="Masukan nama lengkap*" required>
                        </p>
                        <p>
                            <label>Jenis Kelamin <span>*</span></label>
                            <select name="jk" class="form-control form-control-sm">
                                <option selected disabled>-Pilih Jenis Kelamin-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </p>
                        <p>
                            <label>Alamat</label>
                            <textarea placeholder="Masukan alamat lengkap *" name="alamat" class="form-control form-control-sm" required></textarea>
                        </p>
                        <p>
                            <label>No Hp <span>*</span></label>
                            <input type="number" name="no_hp" placeholder="Masukan nomor hp" required>
                        </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="email" name="email" placeholder="Masukan Email" required>
                        </p>
                        <p>
                            <label>Password <span>*</span></label>
                            <input type="password" name="pass" placeholder="Masukan Password" required>
                        </p>
                        <div class="login_submit">
                            <button type="submit" name="daftar">Register</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['daftar'])) {
                        $email     = $_POST['email'];
                        $pass     = $_POST['pass'];
                        $nama_pelanggan     = $_POST['nama_pelanggan'];
                        $jk     = $_POST['jk'];
                        $alamat     = $_POST['alamat'];
                        $no_hp = $_POST['no_hp'];

                        $sql = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE email ='$email'");
                        $cek = $sql->num_rows;

                        if ($cek) {
                            echo "<script>alert('Pendaftaran gagal ! Email Sudah terdaftar Didatabase !');</script>";
                        } else {
                            $koneksi->query("INSERT INTO tbl_pelanggan (email, pass, nama_pelanggan, jk, alamat, no_hp)
                            VALUES ('$email','$pass','$nama_pelanggan','$jk','$alamat','$no_hp')");
                            echo "<script>alert('Pendaftaran Berhasil ! Silahkan Login.');</script>";
                            echo "<script>location='log-reg.php';</script>";
                        }
                    }

                    ?>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->

<?php
include "_foot.php";
?>