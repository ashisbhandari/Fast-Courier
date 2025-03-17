
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
    <title>Fast courier</title>
    <style>
        body {
            background-color: #e0f0f1; /* Updated background color */
            font-family: 'Josefin Sans', sans-serif;
        }
        .z1 {
            margin-left: 300px;
        }
        .z12{
            margin-left: 100px;
        }
        .z2 {
           margin-right:200px;
        }
        .z {
           margin-right:100px;
           margin-left: 100px;
        }
        #z3 {
            margin-left: 200px;
        }
        .tabbed-text {
            text-indent: 300px; /* Adjust the value as needed */
        }
        .tabbed-text1 {
            text-indent: 230px; /* Adjust the value as needed */
        }
        body {
            overflow-y: scroll; /* Add scrollbar on the right side */
            overflow-x: hidden; /* Hide scrollbar at the bottom */
        }
        .btn-submit-container {
            overflow: hidden; /* Remove scrollbar for button container */
        }
        .dest{
            margin-top: 0px;
        }
    </style>
    <script>
        function setDefaultDate() {
            var now = new Date();
            var year = now.getFullYear();
            var month = pad(now.getMonth() + 1); // Months are zero-based
            var day = pad(now.getDate());
            // Formatting the date to display as YYYY-MM-DD (compatible with HTML5 date input)
            var formattedDate = year + "-" + month + "-" + day;
            // Setting the value of the textbox to the current date
            document.getElementById('realDateTextBox').value = formattedDate;
        }

        // Function to pad single digit numbers with leading zero
        function pad(number) {
            return (number < 10 ? '0' : '') + number;
        }

        window.onload = function() {
            setDefaultDate();
        };
    </script>
</head>
<body>
    <?php include 'nav1.php' ?>
    <center>
        <form action="domesticinfo.php" method="post">
            <div class="col">
                <h4 class="text-center">Fast Courier and Cargo Services<br>Birtamode, Jhapa<br>023-534177, 9801376348</h4>
                <table cellspacing="20">
                    <div class="form-group">
                        <tr>
                            <?php
                                $conn= mysqli_connect("localhost", "ashishbh_fastcourier", "Ashish@1991", "ashishbh_fastbtm");

// Check connection
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}
                                $sql = "SELECT `CN No` FROM domesticinfo";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $CNno=$row['CN No'];
                                    }
                                }
                                $CN=$CNno+1;
                            ?>
                            <!--<td id="cnno " class="float-left">-->
                            <!--    <label class="z2" for="cn">CN NO:<p>Fast177 <span id="cn">00<?php echo $CN?></span></p></label>-->
                            <!--</td>-->
                            <!--<td>-->
                            <!--    <label style="color: red;" >Destination</label>-->
                            <!--        <select name="district" class="form-control dest" required>-->
                            <!--           <option value="">Select District</option>-->
                            <!--            <option value="acham">Acham</option>-->
                            <!--            <option value="arghakhanchi">Arghakhanchi</option>-->
                            <!--            <option value="baglung">Baglung</option>-->
                            <!--            <option value="bajhang">Bajhang</option>-->
                            <!--            <option value="bajura">Bajura</option>-->
                            <!--            <option value="baitadi">Baitadi</option>-->
                            <!--            <option value="banke">Banke</option>-->
                            <!--            <option value="bardiya">Bardiya</option>-->
                            <!--            <option value="bara">Bara</option>-->
                            <!--            <option value="Bhaktapur">Bhaktapur</option>-->
                            <!--            <option value="bhojpur">Bhojpur</option>-->
                            <!--            <option value="chitwan">Chitwan</option>-->
                            <!--            <option value="dadeldhura">Dadeldhura</option>-->
                            <!--            <option value="Dang">Dang</option>-->
                            <!--            <option value="dailekh">Dailekh</option>-->
                            <!--            <option value="darchula">Darchula</option>-->
                            <!--            <option value="dhading">Dhading</option>-->
                            <!--            <option value="dhankuta">Dhankuta</option>-->
                            <!--            <option value="dhanusha">Dhanusha</option>-->
                            <!--            <option value="dolakha">Dolakha</option>-->
                            <!--            <option value="dolpa">Dolpa</option>-->
                            <!--            <option value="doti">Doti</option>-->
                            <!--            <option value="eastern_rukum">Eastern Rukum</option>-->
                            <!--            <option value="gulmi">Gulmi</option>-->
                            <!--            <option value="gorkha">Gorkha</option>-->
                            <!--            <option value="humla">Humla</option>-->
                            <!--            <option value="ilam">Ilam</option>-->
                            <!--            <option value="jhapa">Jhapa</option>-->
                            <!--            <option value="jajarkot">Jajarkot</option>-->
                            <!--            <option value="jumla">Jumla</option>-->
                            <!--            <option value="Kathmandu">Kathmandu</option>-->
                            <!--            <option value="kanchanpur">Kanchanpur</option>-->
                            <!--            <option value="kailali">Kailali</option>-->
                            <!--            <option value="kalikot">Kalikot</option>-->
                            <!--            <option value="kapilvastu">Kapilvastu</option>-->
                            <!--            <option value="kaski">Kaski</option>-->
                            <!--            <option value="khotang">Khotang</option>-->
                            <!--            <option value="kavrepalanchok">Kavrepalanchok</option>-->
                            <!--            <option value="lalitpur">Lalitpur</option>-->
                            <!--            <option value="lamjung">Lamjung</option>-->
                            <!--            <option value="mahendranagar">Mahendranagar</option>-->
                            <!--            <option value="mahottari">Mahottari</option>-->
                            <!--            <option value="makwanpur">Makwanpur</option>-->
                            <!--            <option value="manang">Manang</option>-->
                            <!--            <option value="morang">Morang</option>-->
                            <!--            <option value="mugu">Mugu</option>-->
                            <!--            <option value="myagdi">Myagdi</option>-->
                            <!--            <option value="mustang">Mustang</option>-->
                            <!--            <option value="nawalpur">Nawalpur</option>-->
                            <!--            <option value="east-nawalparasi">East-Nawalparasi</option>-->
                            <!--            <option value="west-nawalparasi">West-Nawalparasi</option>-->
                            <!--            <option value="nuwakot">Nuwakot</option>-->
                            <!--            <option value="okhaldhunga">Okhaldhunga</option>-->
                            <!--            <option value="parbat">Parbat</option>-->
                            <!--            <option value="parsa">Parsa</option>-->
                            <!--            <option value="pachthar">Pachthar</option>-->
                            <!--            <option value="palpa">Palpa</option>-->
                            <!--            <option value="pyuthan">Pyuthan</option>-->
                            <!--            <option value="rajbiraj">Rajbiraj</option>-->
                            <!--            <option value="rautahat">Rautahat</option>-->
                            <!--            <option value="ramechap">Ramechap</option>-->
                            <!--            <option value="rasuwa">Rasuwa</option>-->
                            <!--            <option value="Rupandehi">Rupandehi</option>-->
                            <!--            <option value="Rolpa">Rolpa</option>-->
                            <!--            <option value="salyan">Salyan</option>-->
                            <!--            <option value="sankhuwasabha">Sankhuwasabha</option>-->
                            <!--            <option value="saptari">Saptari</option>-->
                            <!--            <option value="sarlahi">Sarlahi</option>-->
                            <!--            <option value="sindhuli">Sindhuli</option>-->
                            <!--            <option value="sindhupalchok">Sindhupalchok</option>-->
                            <!--            <option value="siraha">Siraha</option>-->
                            <!--            <option value="solukhumbu">Solukhumbu</option>-->
                            <!--            <option value="sunsari">Sunsari</option>-->
                            <!--            <option value="Surkhet">Surkhet</option>-->
                            <!--            <option value="Syangja">Syangja</option>-->
                            <!--            <option value="tanahun">Tanahun</option>-->
                            <!--            <option value="taplejung">Taplejung</option>-->
                            <!--            <option value="terhathum">Terhathum</option>-->
                            <!--            <option value="udayapur">Udayapur</option>-->
                            <!--            <option value="western_rukum">Western Rukum</option></select>-->
                                                                   
                                
                            <!--</td>-->
                            <!--<td>-->
                            <!--    <label style="color: red;" class="z12">Choose Packet Type:</label>-->
                            <!--    <select class="form-control z12" name="pactype" required>-->
                            <!--        <option value="">--None--</option>-->
                            <!--        <option value="Document">Document</option>-->
                            <!--        <option value="Parcel">Parcel</option>-->
                            <!--    </select>-->
                            <!--</td>-->
                            <!--<td>-->
                            <!--<label class="tabbed-text" >Booking Date:<br><input style="border:none" class="z1" type="text" name="date" id="realDateTextBox" readonly></label>-->
                            <!-- <td class="tabbed-text">Booking Date:<br><input class=" z1" type="text" name="date" id="realDateTextBox"></td> -->
                            <!--</td>-->
                            <div class="row">
                                <!-- CN NO -->
                                <div class="col-md-3 col-12">
                                    <label for="cn">CN NO:</label>
                                    <p>Fast177 <span id="cn">00<?php echo $CN?></span></p>
                                </div>
                        
                                <!-- Destination -->
                                <div class="col-md-3 col-12">
                                    <label style="color: red;" for="district" style="width: 180px;">Destination</label>
                                    <select name="district" class="form-control dest" style="width: 200px;" required>
                                        <option value="">Select District</option>
                                        <option value="acham">Acham</option>
                                        <option value="arghakhanchi">Arghakhanchi</option>
                                        <option value="baglung">Baglung</option>
                                        <option value="bajhang">Bajhang</option>
                                        <option value="bajura">Bajura</option>
                                        <option value="baitadi">Baitadi</option>
                                        <option value="banke">Banke</option>
                                        <option value="bardiya">Bardiya</option>
                                        <option value="bara">Bara</option>
                                        <option value="Bhaktapur">Bhaktapur</option>
                                        <option value="bhojpur">Bhojpur</option>
                                        <option value="chitwan">Chitwan</option>
                                        <option value="dadeldhura">Dadeldhura</option>
                                        <option value="Dang">Dang</option>
                                        <option value="dailekh">Dailekh</option>
                                        <option value="darchula">Darchula</option>
                                        <option value="dhading">Dhading</option>
                                        <option value="dhankuta">Dhankuta</option>
                                        <option value="dhanusha">Dhanusha</option>
                                        <option value="dolakha">Dolakha</option>
                                        <option value="dolpa">Dolpa</option>
                                        <option value="doti">Doti</option>
                                        <option value="eastern_rukum">Eastern Rukum</option>
                                        <option value="gulmi">Gulmi</option>
                                        <option value="gorkha">Gorkha</option>
                                        <option value="humla">Humla</option>
                                        <option value="ilam">Ilam</option>
                                        <option value="jhapa">Jhapa</option>
                                        <option value="jajarkot">Jajarkot</option>
                                        <option value="jumla">Jumla</option>
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="kanchanpur">Kanchanpur</option>
                                        <option value="kailali">Kailali</option>
                                        <option value="kalikot">Kalikot</option>
                                        <option value="kapilvastu">Kapilvastu</option>
                                        <option value="kaski">Kaski</option>
                                        <option value="khotang">Khotang</option>
                                        <option value="kavrepalanchok">Kavrepalanchok</option>
                                        <option value="lalitpur">Lalitpur</option>
                                        <option value="lamjung">Lamjung</option>
                                        <option value="mahendranagar">Mahendranagar</option>
                                        <option value="mahottari">Mahottari</option>
                                        <option value="makwanpur">Makwanpur</option>
                                        <option value="manang">Manang</option>
                                        <option value="morang">Morang</option>
                                        <option value="mugu">Mugu</option>
                                        <option value="myagdi">Myagdi</option>
                                        <option value="mustang">Mustang</option>
                                        <option value="nawalpur">Nawalpur</option>
                                        <option value="east-nawalparasi">East-Nawalparasi</option>
                                        <option value="west-nawalparasi">West-Nawalparasi</option>
                                        <option value="nuwakot">Nuwakot</option>
                                        <option value="okhaldhunga">Okhaldhunga</option>
                                        <option value="parbat">Parbat</option>
                                        <option value="parsa">Parsa</option>
                                        <option value="pachthar">Pachthar</option>
                                        <option value="palpa">Palpa</option>
                                        <option value="pyuthan">Pyuthan</option>
                                        <option value="rajbiraj">Rajbiraj</option>
                                        <option value="rautahat">Rautahat</option>
                                        <option value="ramechap">Ramechap</option>
                                        <option value="rasuwa">Rasuwa</option>
                                        <option value="Rupandehi">Rupandehi</option>
                                        <option value="Rolpa">Rolpa</option>
                                        <option value="salyan">Salyan</option>
                                        <option value="sankhuwasabha">Sankhuwasabha</option>
                                        <option value="saptari">Saptari</option>
                                        <option value="sarlahi">Sarlahi</option>
                                        <option value="sindhuli">Sindhuli</option>
                                        <option value="sindhupalchok">Sindhupalchok</option>
                                        <option value="siraha">Siraha</option>
                                        <option value="solukhumbu">Solukhumbu</option>
                                        <option value="sunsari">Sunsari</option>
                                        <option value="Surkhet">Surkhet</option>
                                        <option value="Syangja">Syangja</option>
                                        <option value="tanahun">Tanahun</option>
                                        <option value="taplejung">Taplejung</option>
                                        <option value="terhathum">Terhathum</option>
                                        <option value="udayapur">Udayapur</option>
                                        <option value="western_rukum">Western Rukum</option></select>
                                    </select>
                                </div>
                        
                                <!-- Packet Type -->
                                <div class="col-md-3 col-12">
                                    <label style="color: red; width: 220px;" >Choose Packet Type:</label>
                                    <select class="form-control " name="pactype" required style="width: 180px;">
                                        <option value="">--None--</option>
                                        <option value="Document">Document</option>
                                        <option value="Parcel">Parcel</option>
                                    </select>
                                </div>
                        
                                <!-- Booking Date -->
                                <div class="col-md-3 col-12">
                                    <label>Booking Date:</label>
                                    <input class="form-control " style="width: 180px;"  type="text" name="date" id="realDateTextBox" readonly>
                                </div>
                            </div>
                        </tr>
                    </div>
                </table>
                <hr>
                <br>
                <h3>Sender Details</h3>
                <div class="form-group">
                    <label style="color: red;">Name:</label>
                    <input type="text" class="form-control" placeholder="Sender name" name="Sname" value="Birtamod" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Phone number:</label>
                    <input type="tel" class="form-control" placeholder="Sender number" name="Snumber" pattern="[0-9]{10}" Value="9801376348"required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Address line 1:</label>
                    <input type="textarea" class="form-control" placeholder="Sender Address" name="Saddress" value="BTM" required>
                </div>
                <div class="form-group">
                    <label>Address line 2:</label>
                    <input type="textarea" class="form-control" placeholder="Sender Address" name="Saddress1">
                </div>
            </div>
            <hr>
            <div class="col">
                <h3>Receiver Details</h3>
                <table cellspacing="20">
                    <div class="form-group">
                        <tr>
                        </tr>
                    </div>
                </table>
                <div class="form-group">
                    <label style="color: red;">Name:</label>
                    <input type="text" class="form-control" placeholder="Receiver name" name="Rname" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Phone number:</label>
                    <input type="tel" class="form-control" placeholder="Receiver number" name="Rnumber" pattern="[0-9]{10}" required>
                </div>
                <div class="form-group">
                    <label style="color: red;">Address line 1:</label>
                    <input type="textarea" class="form-control" placeholder="Receiver Address" name="Raddress" required>
                </div>
                <div class="form-group">
                    <label>Address line 2:</label>
                    <input type="textarea" class="form-control" placeholder="Receiver Address" name="Raddress1">
                </div>
                 <div class="row">
                    
        <!-- Total Valuation -->
        <!--<div class="row align-items-center">-->
              <!-- Payment -->
                    <div class="col-md-2 col-12">
            <div class="form-group">
                <label style="color: red;" for="payments">Payment</label>
                <select name="payments" id="payments" class="form-control">
                    <option value="Cash" selected>Cash</option>
                    <option value="Credit">Credit</option>
                    <option value="COD">COD</option>
                </select>
            </div>
        </div>
        <!-- Total Valuation -->
        <div class="col-md-2 col-12">
            <div class="form-group">
                <label style="color: red;">Total Valuation (RS):</label>
                <input class="form-control" type="text" name="price" value="100">
            </div>
        </div>

      


        <!-- Weight -->
        <div class="col-md-2 col-12">
            <div class="form-group">
                <label>Weight (in KG*):</label>
                <input class="form-control" type="number" name="weight" value="0.5" required>
            </div>
        </div>

        <!-- Pieces -->
        <div class="col-md-2 col-12">
            <div class="form-group">
                <label>Pieces:</label>
                <input class="form-control" type="number" name="pieces" value="1" required>
            </div>
        </div>

        <!-- Booked By -->
        <div class="col-md-2 col-12">
            <div class="form-group">
                <label>Booked By:</label>
                <input class="form-control" type="text" name="Bookby" value="Sagar Dahal" >
            </div>
        </div>
    <!--</div>-->
    </div>
            </div>
            <center class="btn-submit-container">
                <button type="submit" class="btn btn-success btn-sm btn-block">Submit</button>
            </center>
        </form>
    </center>
    <br><br><br>
</body>
</html>
