<?php
include '/home/ashishbh/public_html/auth.php';
checkLogin(); // Check if user is logged in

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Dropdown Button</title>
<style>
/* Base styles */
body {
    font-family: Arial, sans-serif;
}

/* Main dropdown styles */
.dropdown {
    position: relative;
    display: inline-block;
}

/* .dropbtn {
    background-color:black;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
} */

.dropdown-content {
    display: none;
    position: absolute;
    background-color: burlywood;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 10px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Nested dropdown styles */
.nested-dropdown {
    position: relative;
}

.nested-dropbtn {
   margin-top: 5px;
     background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 20px;
    border:black;
    cursor: pointer;
    width: 100%;
    text-align: left;
    border-radius: 12px;
} 

.nested-dropdown-content {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background-color: burlywood;
    min-width: 350px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.nested-dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.nested-dropdown-content a:hover {
    background-color: #f1f1f1;
}

/* Show dropdowns on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content .nested-dropdown:hover .nested-dropdown-content {
    display: block;
}

/* Additional style for click handling */
.dropdown-content .nested-dropdown .nested-dropbtn:focus + .nested-dropdown-content,
.dropdown-content .nested-dropdown .nested-dropdown-content:hover {
    display: block;
}

</style>
<script>
</script>
</head>
<body>
    <div class="dropdown">
        <button class="dropbtn btn  text-white">Courier Services</button>
        <div class="dropdown-content">
            <div class="nested-dropdown">
                <button class="nested-dropbtn btn btn-secondary">Domestic Courier</button>
                <div class="nested-dropdown-content">
                    <a class="btn btn-outline-light text-dark" href="listDomestic.php">List Domestic Shipments</a>
                    <a class="btn btn-outline-light text-dark" href="domestic.php">Create Domestic Shipments</a>
                </div>
            </div>
            <div class="nested-dropdown">
            <a href="https://apexfte.com/admin/shipment/list"><button class="nested-dropbtn btn btn-secondary">International Courier</button></a>
                <!-- <div class="nested-dropdown-content">
                    <a href="https://apexfte.com/admin/shipment/list">List Int. Shipments</a>
                </div> -->
            </div>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>

</html>
