<?php

require_once 'koneksi.php';

    // fungsi tambah
    function tambah($data)
    {
        global $conn;

        $nama = htmlspecialchars($data['nama']);
        $club = htmlspecialchars($data['club']);
        $posisi = htmlspecialchars($data['posisi']);
        $ovr = htmlspecialchars($data['ovr']);
        $foto = upload();

        if (!$foto) {
            return false; // false : hentikan program
        }

        $query = "INSERT INTO bola VALUES ('', '$nama', '$club', '$posisi', '$ovr', '$foto')";
        mysqli_query($conn, $query);

        // mengembalikkan data-data yang dikirim
        return mysqli_affected_rows($conn);
    }

    // fungsi upload
    function upload()
    {
        // membuat variabel untuk menjadi aturan foto
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name']; // ambil data sebagai tempat penyimpanan foto sementara

        // cek foto yang diupload (error 4 artinya berarti foto tidak diupload)
        if ($error === 4) {
            echo "
            <script>alert('Pilih foto terlebih dahulu!');</script>
            ";
            return false;
        }

        // membuat rule foto yang boleh diupload
        $fotoValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto)); // merubah namanya menjadi .jpg (contoh)

        // cek ekstensi file menggunakan in_array
        if (!in_array($ekstensiFoto, $fotoValid)) {
            echo "
            <script>alert('Foto yang anda upload tidak sesuai!');</script>
            ";
            return false;
        }

        // cek ukuran file (dalam byte)
        if ($ukuranFile > 1000000) {
            echo "
            <script>alert('Ukuran foto terlalu besar!');</script>
            ";
            return false;
        }

        // upload foto
        $namaFileBaru = uniqid(); // membuat nama uniq
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiFoto;
        move_uploaded_file($tmpName, 'public/img/' . $namaFileBaru); // memasukkan foto ke dalam folder

        return $namaFileBaru;
    }

    // fungsi hapus
    function hapus($id)
    {
        global $conn;

        // ambil data foto berdasarkan id
        $result = mysqli_query($conn, "SELECT foto FROM bola WHERE id=$id");
        $row = mysqli_fetch_assoc($result);
        $foto = $row['foto'];

        // hapus data dari database
        mysqli_query($conn, "DELETE from bola WHERE id=$id");

        // Menghapus foto dari folder
        $file_path = 'public/img/' . $foto;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        return mysqli_affected_rows($conn);
    }

    // fungsi edit
    function ubah($data)
    {
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $club = htmlspecialchars($data["club"]);
        $posisi = htmlspecialchars($data["posisi"]);
        $ovr = htmlspecialchars($data["ovr"]);
        $fotoLama = htmlspecialchars($data["fotoLama"]);

        // cek apakah edit dengan mengupload foto baru
        if ($_FILES['foto']['error'] === 4) {
            $foto =  $fotoLama;
        } else {
            // hapus foto lama
            if (!empty($fotoLama)) {
                hapusFotoLama($fotoLama);
            }
            $foto = upload();
        }

        $query = "UPDATE bola SET 
                nama = '$nama',
                club = '$club',
                posisi = '$posisi',
                club = '$club',
                ovr = '$ovr',
                foto = '$foto'
                WHERE id = $id
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // fungsi hapus foto lama
    function hapusFotoLama($foto)
    {
        $path = "public/img/" . $foto;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    // fungsi cari/filter data
    function cari($keyword)
    {
        $query = "SELECT * FROM bola WHERE
                    nama LIKE '%$keyword%' OR
                    club LIKE '%$keyword%' OR
                    posisi LIKE '%$keyword%' OR
                    ovr LIKE '%$keyword%'
                ";

        return query($query);
    }

    // fungsi registrasi
    function registrasi($data)
    {
        global $conn;

        $username = strtolower(stripslashes($data["username"])); // membersihkan inputan dari karakter lain

        // menghindari sql injection dengan escape
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
        // cek apakah form sudah terisi
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"])) {
                echo "<script>alert('Lengkapi data terlebih dahulu!')</script>";
                return false;
            }
        }

        // cek username tersedia?
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

        if (mysqli_fetch_assoc($result)) {
            echo "
            <script>alert('username sudah terdaftar! gunakan nama yang lain!')</script>
            ";
            return false;
        }

        // cek password 1 dan password 2
        if ($password != $password2) {
            echo "
            <script>alert('password tidak sesuai!')</script>
            ";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // insert data ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
       
    }