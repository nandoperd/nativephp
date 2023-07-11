<?php
    // koneksi database
    $conn = mysqli_connect('localhost', 'root', '', 'native');

    // fungsi query
    function query($query)
    {
        global $conn;

        // menyatukan fungsi koneksi dan query menjadi reult
        $result = mysqli_query($conn, $query);

        // membuat wadah row kosong
        $rows = [];

        // membuat looping fetch untuk mendapatkan data rows
        while ($row = mysqli_fetch_assoc($result)) {
            $rows [] = $row;   
        }
        return $rows;
    }