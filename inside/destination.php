<?php
include '/home/ashishbh/public_html/auth.php';
checkLogin(); // Check if user is logged in

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Document</title>
    <style>
        .dest{
            height: 50px;
            border-radius: 10px;
        }

        
    </style>

</head>
<body>
<select name="district" class="form-control dest" name="destination">
    <option value="">Select District</option>
    <option value="bhojpur">Bhojpur</option>
    <option value="dhankuta">Dhankuta</option>
    <option value="ilam">Ilam</option>
    <option value="jhapa">Jhapa</option>
    <option value="khotang">Khotang</option>
    <option value="morang">Morang</option>
    <option value="okhaldhunga">Okhaldhunga</option>
    <option value="pachthar">Pachthar</option>
    <option value="sankhuwasabha">Sankhuwasabha</option>
    <option value="solukhumbu">Solukhumbu</option>
    <option value="sunsari">Sunsari</option>
    <option value="taplejung">Taplejung</option>
    <option value="terhathum">Terhathum</option>
    <option value="udayapur">Udayapur</option>
    <option value="parsa">Parsa</option>
    <option value="bara">Bara</option>
    <option value="rautahat">Rautahat</option>
    <option value="sarlahi">Sarlahi</option>
    <option value="siraha">Siraha</option>
    <option value="dhanusha">Dhanusha</option>
    <option value="saptari">Saptari</option>
    <option value="mahottari">Mahottari</option>
    <option value="bhaktapur">Bhaktapur</option>
    <option value="chitwan">Chitwan</option>
    <option value="dhading">Dhading</option>
    <option value="dolakha">Dolakha</option>
    <option value="kathmandu">Kathmandu</option>
    <option value="kavrepalanchok">Kavrepalanchok</option>
    <option value="lalitpur">Lalitpur</option>
    <option value="makwanpur">Makwanpur</option>
    <option value="nuwakot">Nuwakot</option>
    <option value="ramechap">Ramechap</option>
    <option value="rasuwa">Rasuwa</option>
    <option value="sindhuli">Sindhuli</option>
    <option value="sindhupalchok">Sindhupalchok</option>
    <option value="baglung">Baglung</option>
    <option value="gorkha">Gorkha</option>
    <option value="kaski">Kaski</option>
    <option value="lamjung">Lamjung</option>
    <option value="manang">Manang</option>
    <option value="mustang">Mustang</option>
    <option value="myagdi">Myagdi</option>
    <option value="nawalpur">Nawalpur</option>
    <option value="parwat">Parwat</option>
    <option value="syangja">Syangja</option>
    <option value="tanahun">Tanahun</option>
    <option value="kapilvastu">Kapilvastu</option>
    <option value="parasi">Parasi</option>
    <option value="rupandehi">Rupandehi</option>
    <option value="arghakhanchi">Arghakhanchi</option>
    <option value="gulmi">Gulmi</option>
    <option value="palpa">Palpa</option>
    <option value="dang">Dang</option>
    <option value="pyuthan">Pyuthan</option>
    <option value="rolpa">Rolpa</option>
    <option value="eastern_rukum">Eastern Rukum</option>
    <option value="banke">Banke</option>
    <option value="bardiya">Bardiya</option>
    <option value="western_rukum">Western Rukum</option>
    <option value="salyan">Salyan</option>
    <option value="dolpa">Dolpa</option>
    <option value="humla">Humla</option>
    <option value="jumla">Jumla</option>
    <option value="kalikot">Kalikot</option>
    <option value="mugu">Mugu</option>
    <option value="surkhet">Surkhet</option>
    <option value="dailekh">Dailekh</option>
    <option value="jajarkot">Jajarkot</option>
    <option value="darchula">Darchula</option>
    <option value="bajhang">Bajhang</option>
    <option value="bajura">Bajura</option>
    <option value="baitadi">Baitadi</option>
    <option value="doti">Doti</option>
    <option value="acham">Acham</option>
    <option value="dadeldhura">Dadeldhura</option>
    <option value="kanchanpur">Kanchanpur</option>
    <option value="kailali">Kailali</option>
</select>
</body>
</html>