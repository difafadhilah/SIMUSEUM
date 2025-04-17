<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Akun</title>
    <style>
        @page {
            margin-top: 4cm;
            margin-left: 4cm;
            margin-bottom: 3cm;
            margin-right: 3cm;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .ttd-kepala-museum {
            text-align: right;
        }

        .ttd-kepala-museum p {
            margin-top: 50px;
            font-weight: bold;
        }

        /* .container {
            max-width: auto;
            margin: 4cm 4cm 3cm 3cm;
            Atur margin atas, kanan, bawah, kiri dalam urutan searah jarum jam
            padding: 20px;
        } */
    </style>
</head>

<body>
    <div class="container">
        {{-- <div class="kop-surat">
            <h3>Museum Kelahiran Bagindo Aziz Chan</h3>
            <p>Alang Laweh, Kec. Padang Sel., Kota Padang, Sumatera Barat 25133
        </div> --}}
        <h1>Informasi User</h1>
        <hr>
        <p><strong>Username:</strong> {{ $username }}</p>
        <p><strong>Password:</strong> 123456 </p>
        <div>
            <br>
            <p><b>Langkah-langkah login ke akun sekolah :</b></p>
            <p>1. Buka situ website localhost:8000</p>
            <p>2. Klik button Login yang ada pada situs website</p>
            <p>3. Masukkan <b>username</b> dan <b>password</b> yang telah diberikan</p>
            <p>4. Jikan akun berhasil login, tambahkan form feedback untuk kunjungan museum yang telah dilaksanakan</p>
        </div>
        {{-- <div class="ttd-kepala-museum">
            <p>Padang, {{ date('d F Y') }}</p>
            <p>(Nama Kepala Museum)</p>
        </div> --}}
    </div>
</body>

</html>
