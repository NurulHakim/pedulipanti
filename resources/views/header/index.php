<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <!-- css nya nanti dipindahin ya ke public/assets/css/style.css. sementara di file ini dulu biar mudah -->
    <style>
        body {
            font-size: 14px;
            font-family: 'Source Sans Pro', sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #ffff;
        }

        header {
            position: absolute;
            top : 50px;
            right : 40px;
            border-style: solid;
            border-width: 1px;
        }
        ul {
            list-style:none; /*menghilangkan dot list*/
        }
        a {
            text-decoration:none; /*menghilangkan garis bawah*/
            color: #000; /*memberi warna hitam*/
            font-weight:bold; /*menebalkan font menu*/
        }
        li {
            display:inline; /*membuat menu menjadi Horizontal*/
            background-color: #ff0000; /*ngasi warna merah di background menunya*/
            float:left; /*bikin nempel ke kiri biar ga ada spasi kosong*/
            padding:10px; /*ngasi jarak atas bawah kiri kanan di menu*/
            border-right:solid 1px #000; /*ngasi border kanan menu untuk pembatas*/
        }
        li:last-child {
            border-right:none; /*untuk ngilangin border kanan di list menu yg pallingn akhir*/
        }
        li:hover {
            background-color:#ccc; /*untuk ngasi effek ganti warna background pas mouse lewat*/
        }
        

       
    </style>

</head>
<body>

    <!-- header -->
        <header class="header">
            <div class="container">
                <ul class="navbar">
                    <li><a href="#caripanti">Cari Panti</a></li>
                    <li><a href="#tentangkami">Tentang Kami</a></li>
                    <li><a href="#login">Login</a></li>
                </ul>
            </div>

        
        </header> 
</body>
</html>