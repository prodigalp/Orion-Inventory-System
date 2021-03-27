<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {

?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Record</title>
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="./icon/bsd.png" type="image/png">
        <script src="./javascript/impress.js"></script>
        <script src="./javascript/jquery.min.js"></script>
        <style>
            select:invalid {
                color: gray;
            }

            option {
                color: white;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <h2>Add New Record</h2>
            <form method="POST" action="addrecord_verify.php" enctype="multipart/form-data">
                <div class="formData">
                    <select name="select1" id="select1" required>
                        <option value="" disabled selected hidden>Department</option>
                        <!--- First Level Selection -------->
                        <option value="aba">Assembly</option>
                        <option value="wet">Wetfinish</option>
                        <option value="dry">Drycharge</option>
                        <option value="mcb">MCB</option>
                        <option value="pla">Plastics</option>
                        <option value="acd">Acid Plant</option>
                        <option value="plt">Plates</option>
                    </select>
                </div>
                <div class="formData">
                    <select name="select2" id="select2" required>
                        <option value="" disabled selected hidden>Section / Area</option>

                        <!--- Assembly Area 2nd Level -------->
                        <option data-value="aba" value="l1">Line 1</option>
                        <option data-value="aba" value="l2">Line 2</option>
                        <option data-value="aba" value="l3">Line 3</option>
                        <option data-value="aba" value="l4">Line 4</option>
                        <option data-value="aba" value="l5">Line 5</option>
                        <option data-value="aba" value="l6">Line 6</option>
                        <option data-value="aba" value="l7">Line 7</option>
                        <option data-value="aba" value="l8">Line 8</option>
                        <option data-value="aba" value="l9">Line 9</option>
                        <option data-value="aba" value="l10">Line 10</option>
                        <option data-value="aba" value="l11">Line 11</option>
                        <option data-value="aba" value="l12">Line 12</option>
                        <option data-value="aba" value="l13">Line 13</option>

                        <!--- Wetfinish Area 2nd Level -------->
                        <option data-value="wet" value="l1w">Line 1</option>
                        <option data-value="wet" value="l2w">Line 2</option>
                        <option data-value="wet" value="l3w">Line 3</option>
                        <option data-value="wet" value="l4w">Line 4</option>
                        <option data-value="wet" value="l5w">Line 5</option>
                        <option data-value="wet" value="l6w">Line 6</option>

                        <!--- DryCharge Area 2nd Level -------->
                        <option data-value="dry" value="l1d">Line 14</option>
                        <option data-value="dry" value="l2d">Line 15</option>
                        <option data-value="dry" value="l3d">Line 16</option>
                        <option data-value="dry" value="l4d">Line 17</option>
                        <option data-value="dry" value="l5d">Line 18</option>
                        <option data-value="dry" value="l6d">Line 19</option>

                        <!--- MCB Area 2nd Level -------->
                        <option data-value="mcb" value="l1m">Line 1</option>
                        <option data-value="mcb" value="l2m">Line 2</option>
                        <option data-value="mcb" value="l3m">Line 3</option>

                        <!--- Plastics Area 2nd Level -------->
                        <option data-value="pla" value="pl0">Bay-0</option>
                        <option data-value="pla" value="pl1">Bay-1</option>
                        <option data-value="pla" value="pl2">Bay-2</option>
                        <option data-value="pla" value="pl3">Bay-3</option>
                        <option data-value="pla" value="plg">Grinding</option>
                        <option data-value="pla" value="plb">Blending</option>
                        <option data-value="pla" value="pls">Sealing</option>
                        <option data-value="pla" value="pld">Die-Test</option>
                        <option data-value="pla" value="plp">Punching</option>

                        <!--- Acid Plant 2nd Level -------->
                        <option data-value="acd" value="acd1">Acid A</option>
                        <option data-value="acd" value="acd2">Acid B</option>
                        <option data-value="acd" value="acd3">Acid C</option>

                        <!--- Plates  2nd Level -------->
                        <option data-value="plt" value="plt1">Line 1</option>
                        <option data-value="plt" value="plt2">Line 2</option>
                        <option data-value="plt" value="plt3">Line 3</option>
                        <option data-value="plt" value="plt4">Line 4</option>
                        <option data-value="plt" value="plt5">Line 5</option>
                        <option data-value="plt" value="plt6">Line 6</option>
                        <option data-value="plt" value="plt7">Line 7</option>
                        <option data-value="plt" value="plt8">Line 8</option>
                        <option data-value="plt" value="plt9">Line 9</option>
                        <option data-value="plt" value="plt10">Line 10</option>
                    </select>
                </div>
                <div class="formData">
                    <select name="select3" id="select3" required>
                        <option value="" disabled selected hidden>Machine</option>

                        <!--- Line 1 Assembly 3rd Level -------->
                        <option data-value="l1">Enveloping</option>
                        <option data-value="l1">COS</option>
                        <option data-value="l1">ICWeld</option>
                        <option data-value="l1">Lid Sealing</option>
                        <option data-value="l1">Leak Testing</option>
                        <option data-value="l1">Post Building</option>
                        <option data-value="l1">Coding</option>
                        <option data-value="l1">Packing</option>
                        <!--- Line 2 Assembly 3rd Level -------->
                        <option data-value="l2">Enveloping</option>
                        <option data-value="l2">COS</option>
                        <option data-value="l2">ICWeld</option>
                        <option data-value="l2">Lid Sealing</option>
                        <option data-value="l2">Leak Testing</option>
                        <option data-value="l2">Post Building</option>
                        <option data-value="l2">Coding</option>
                        <option data-value="l2">Packing</option>
                        <!--- Line 3 Assembly 3rd Level -------->
                        <option data-value="l3">Enveloping</option>
                        <option data-value="l3">COS</option>
                        <option data-value="l3">ICWeld</option>
                        <option data-value="l3">Lid Sealing</option>
                        <option data-value="l3">Leak Testing</option>
                        <option data-value="l3">Post Building</option>
                        <option data-value="l3">Coding</option>
                        <option data-value="l3">Packing</option>
                        <!--- Line 4 Assembly 3rd Level -------->
                        <option data-value="l4">Enveloping</option>
                        <option data-value="l4">COS</option>
                        <option data-value="l4">ICWeld</option>
                        <option data-value="l4">Lid Sealing</option>
                        <option data-value="l4">Leak Testing</option>
                        <option data-value="l4">Post Building</option>
                        <option data-value="l4">Coding</option>
                        <option data-value="l4">Packing</option>
                        <!--- Line 5 Assembly 3rd Level -------->
                        <option data-value="l5">Enveloping</option>
                        <option data-value="l5">COS</option>
                        <option data-value="l5">ICWeld</option>
                        <option data-value="l5">Lid Sealing</option>
                        <option data-value="l5">Leak Testing</option>
                        <option data-value="l5">Post Building</option>
                        <option data-value="l5">Coding</option>
                        <option data-value="l5">Packing</option>
                        <!--- Line 6 Assembly 3rd Level -------->
                        <option data-value="l6">Enveloping</option>
                        <option data-value="l6">COS</option>
                        <option data-value="l6">ICWeld</option>
                        <option data-value="l6">Lid Sealing</option>
                        <option data-value="l6">Leak Testing</option>
                        <option data-value="l6">Post Building</option>
                        <option data-value="l6">Coding</option>
                        <option data-value="l6">Packing</option>
                        <!--- Line 7 Assembly 3rd Level -------->
                        <option data-value="l7">Enveloping</option>
                        <option data-value="l7">COS</option>
                        <option data-value="l7">ICWeld</option>
                        <option data-value="l7">Lid Sealing</option>
                        <option data-value="l7">Leak Testing</option>
                        <option data-value="l7">Post Building</option>
                        <option data-value="l7">Coding</option>
                        <option data-value="l7">Packing</option>
                        <!--- Line 8 Assembly 3rd Level -------->
                        <option data-value="l8">Enveloping</option>
                        <option data-value="l8">COS</option>
                        <option data-value="l8">ICWeld</option>
                        <option data-value="l8">Lid Sealing</option>
                        <option data-value="l8">Leak Testing</option>
                        <option data-value="l8">Post Building</option>
                        <option data-value="l8">Coding</option>
                        <option data-value="l8">Packing</option>
                        <!--- Line 9 Assembly 3rd Level -------->
                        <option data-value="l9">Enveloping</option>
                        <option data-value="l9">COS</option>
                        <option data-value="l9">ICWeld</option>
                        <option data-value="l9">Lid Sealing</option>
                        <option data-value="l9">Leak Testing</option>
                        <option data-value="l9">Post Building</option>
                        <option data-value="l9">Coding</option>
                        <option data-value="l9">Packing</option>
                        <!--- Line 10 Assembly 3rd Level -------->
                        <option data-value="l10">Enveloping</option>
                        <option data-value="l10">COS</option>
                        <option data-value="l10">ICWeld</option>
                        <option data-value="l10">Lid Sealing</option>
                        <option data-value="l10">Leak Testing</option>
                        <option data-value="l10">Post Building</option>
                        <option data-value="l10">Coding</option>
                        <option data-value="l10">Packing</option>
                        <!--- Line 11 Assembly 3rd Level -------->
                        <option data-value="l11">Enveloping</option>
                        <option data-value="l11">COS</option>
                        <option data-value="l11">ICWeld</option>
                        <option data-value="l11">Lid Sealing</option>
                        <option data-value="l11">Leak Testing</option>
                        <option data-value="l11">Post Building</option>
                        <option data-value="l11">Coding</option>
                        <option data-value="l11">Packing</option>
                        <!--- Line 12 Assembly 3rd Level -------->
                        <option data-value="l12">Enveloping</option>
                        <option data-value="l12">COS</option>
                        <option data-value="l12">ICWeld</option>
                        <option data-value="l12">Lid Sealing</option>
                        <option data-value="l12">Leak Testing</option>
                        <option data-value="l12">Post Building</option>
                        <option data-value="l12">Coding</option>
                        <option data-value="l12">Packing</option>
                        <!--- Line 13 Assembly 3rd Level -------->
                        <option data-value="l13">Enveloping</option>
                        <option data-value="l13">COS</option>
                        <option data-value="l13">ICWeld</option>
                        <option data-value="l13">Lid Sealing</option>
                        <option data-value="l13">Leak Testing</option>
                        <option data-value="l13">Post Building</option>
                        <option data-value="l13">Coding</option>
                        <option data-value="l13">Packing</option>

                        <!--- Line 1 Wetfin 3rd Level -------->
                        <option data-value="l1w">Acid Testing</option>
                        <option data-value="l1w">QC Area</option>
                        <option data-value="l1w">Acid Filling</option>
                        <option data-value="l1w">Acid Mist Cap</option>
                        <option data-value="l1w">Series Connection</option>
                        <option data-value="l1w">Charging</option>
                        <option data-value="l1w">Harvesting</option>
                        <option data-value="l1w">Battery Acid Dumping</option>
                        <option data-value="l1w">Final Acid Filling</option>
                        <option data-value="l1w">Auto Vacuum</option>
                        <option data-value="l1w">Acid Level Checking</option>
                        <option data-value="l1w">Podvent Sealing</option>
                        <option data-value="l1w">Leak Testing</option>
                        <option data-value="l1w">Battery washing</option>
                        <option data-value="l1w">Post Brushing</option>
                        <option data-value="l1w">Production Line Testing</option>
                        <option data-value="l1w">Stickers Accesories</option>
                        <option data-value="l1w">End line Palletizing</option>
                        <option data-value="l1w">Palletized Batteries</option>
                        <option data-value="l1w">Pallet Wrapping</option>
                        <option data-value="l1w">Pallet Strapping</option>
                        <option data-value="l1w">Transfer Pack battery</option>
                        <!--- Line 2 Wetfin 3rd Level -------->
                        <option data-value="l2w">Acid Testing</option>
                        <option data-value="l2w">QC Area</option>
                        <option data-value="l2w">Acid Filling</option>
                        <option data-value="l2w">Acid Mist Cap</option>
                        <option data-value="l2w">Series Connection</option>
                        <option data-value="l2w">Charging</option>
                        <option data-value="l2w">Harvesting</option>
                        <option data-value="l2w">Battery Acid Dumping</option>
                        <option data-value="l2w">Final Acid Filling</option>
                        <option data-value="l2w">Auto Vacuum</option>
                        <option data-value="l2w">Acid Level Checking</option>
                        <option data-value="l2w">Podvent Sealing</option>
                        <option data-value="l2w">Leak Testing</option>
                        <option data-value="l2w">Battery washing</option>
                        <option data-value="l2w">Post Brushing</option>
                        <option data-value="l2w">Production Line Testing</option>
                        <option data-value="l2w">Stickers Accesories</option>
                        <option data-value="l2w">End line Palletizing</option>
                        <option data-value="l2w">Palletized Batteries</option>
                        <option data-value="l2w">Pallet Wrapping</option>
                        <option data-value="l2w">Pallet Strapping</option>
                        <option data-value="l2w">Transfer Pack battery</option>
                        <!--- Line 3 Wetfin 3rd Level -------->
                        <option data-value="l3w">Acid Testing</option>
                        <option data-value="l3w">QC Area</option>
                        <option data-value="l3w">Acid Filling</option>
                        <option data-value="l3w">Acid Mist Cap</option>
                        <option data-value="l3w">Series Connection</option>
                        <option data-value="l3w">Charging</option>
                        <option data-value="l3w">Harvesting</option>
                        <option data-value="l3w">Battery Acid Dumping</option>
                        <option data-value="l3w">Final Acid Filling</option>
                        <option data-value="l3w">Auto Vacuum</option>
                        <option data-value="l3w">Acid Level Checking</option>
                        <option data-value="l3w">Podvent Sealing</option>
                        <option data-value="l3w">Leak Testing</option>
                        <option data-value="l3w">Battery washing</option>
                        <option data-value="l3w">Post Brushing</option>
                        <option data-value="l3w">Production Line Testing</option>
                        <option data-value="l3w">Stickers Accesories</option>
                        <option data-value="l3w">End line Palletizing</option>
                        <option data-value="l3w">Palletized Batteries</option>
                        <option data-value="l3w">Pallet Wrapping</option>
                        <option data-value="l3w">Pallet Strapping</option>
                        <option data-value="l3w">Transfer Pack battery</option>
                        <!--- Line 4 Wetfin 3rd Level -------->
                        <option data-value="l4w">Acid Testing</option>
                        <option data-value="l4w">QC Area</option>
                        <option data-value="l4w">Acid Filling</option>
                        <option data-value="l4w">Acid Mist Cap</option>
                        <option data-value="l4w">Series Connection</option>
                        <option data-value="l4w">Charging</option>
                        <option data-value="l4w">Harvesting</option>
                        <option data-value="l4w">Battery Acid Dumping</option>
                        <option data-value="l4w">Final Acid Filling</option>
                        <option data-value="l4w">Auto Vacuum</option>
                        <option data-value="l4w">Acid Level Checking</option>
                        <option data-value="l4w">Podvent Sealing</option>
                        <option data-value="l4w">Leak Testing</option>
                        <option data-value="l4w">Battery washing</option>
                        <option data-value="l4w">Post Brushing</option>
                        <option data-value="l4w">Production Line Testing</option>
                        <option data-value="l4w">Stickers Accesories</option>
                        <option data-value="l4w">End line Palletizing</option>
                        <option data-value="l4w">Palletized Batteries</option>
                        <option data-value="l4w">Pallet Wrapping</option>
                        <option data-value="l4w">Pallet Strapping</option>
                        <option data-value="l4w">Transfer Pack battery</option>
                        <!--- Line 5 Wetfin 3rd Level -------->
                        <option data-value="l5w">Acid Testing</option>
                        <option data-value="l5w">QC Area</option>
                        <option data-value="l5w">Acid Filling</option>
                        <option data-value="l5w">Acid Mist Cap</option>
                        <option data-value="l5w">Series Connection</option>
                        <option data-value="l5w">Charging</option>
                        <option data-value="l5w">Harvesting</option>
                        <option data-value="l5w">Battery Acid Dumping</option>
                        <option data-value="l5w">Final Acid Filling</option>
                        <option data-value="l5w">Auto Vacuum</option>
                        <option data-value="l5w">Acid Level Checking</option>
                        <option data-value="l5w">Podvent Sealing</option>
                        <option data-value="l5w">Leak Testing</option>
                        <option data-value="l5w">Battery washing</option>
                        <option data-value="l5w">Post Brushing</option>
                        <option data-value="l5w">Production Line Testing</option>
                        <option data-value="l5w">Stickers Accesories</option>
                        <option data-value="l5w">End line Palletizing</option>
                        <option data-value="l5w">Palletized Batteries</option>
                        <option data-value="l5w">Pallet Wrapping</option>
                        <option data-value="l5w">Pallet Strapping</option>
                        <option data-value="l5w">Transfer Pack battery</option>
                        <!--- Line 6 Wetfin 3rd Level -------->
                        <option data-value="l6w">Acid Testing</option>
                        <option data-value="l6w">QC Area</option>
                        <option data-value="l6w">Acid Filling</option>
                        <option data-value="l6w">Acid Mist Cap</option>
                        <option data-value="l6w">Series Connection</option>
                        <option data-value="l6w">Charging</option>
                        <option data-value="l6w">Harvesting</option>
                        <option data-value="l6w">Battery Acid Dumping</option>
                        <option data-value="l6w">Final Acid Filling</option>
                        <option data-value="l6w">Auto Vacuum</option>
                        <option data-value="l6w">Acid Level Checking</option>
                        <option data-value="l6w">Podvent Sealing</option>
                        <option data-value="l6w">Leak Testing</option>
                        <option data-value="l6w">Battery washing</option>
                        <option data-value="l6w">Post Brushing</option>
                        <option data-value="l6w">Production Line Testing</option>
                        <option data-value="l6w">Stickers Accesories</option>
                        <option data-value="l6w">End line Palletizing</option>
                        <option data-value="l6w">Palletized Batteries</option>
                        <option data-value="l6w">Pallet Wrapping</option>
                        <option data-value="l6w">Pallet Strapping</option>
                        <option data-value="l6w">Transfer Pack battery</option>

                        <!--- Line 14 DryCharge 3rd Level -------->
                        <option data-value="l1d">Grid Casting</option>
                        <option data-value="l1d">CB</option>
                        <option data-value="l1d">Oven</option>
                        <option data-value="l1d">Oxide</option>
                        <option data-value="l1d">Pasting</option>
                        <option data-value="l1d">Formation</option>
                        <option data-value="l1d">Chillers</option>
                        <option data-value="l1d">Cooling Towers</option>

                        <!--- Line 15 DryCharge 3rd Level -------->
                        <option data-value="l2d">Grid Casting</option>
                        <option data-value="l2d">CB</option>
                        <option data-value="l2d">Oven</option>
                        <option data-value="l2d">Oxide</option>
                        <option data-value="l2d">Pasting</option>
                        <option data-value="l2d">Formation</option>
                        <option data-value="l2d">Chillers</option>
                        <option data-value="l2d">Cooling Towers</option>

                        <!--- Line 16 DryCharge 3rd Level -------->
                        <option data-value="l3d">Grid Casting</option>
                        <option data-value="l3d">CB</option>
                        <option data-value="l3d">Oven</option>
                        <option data-value="l3d">Oxide</option>
                        <option data-value="l3d">Pasting</option>
                        <option data-value="l3d">Formation</option>
                        <option data-value="l3d">Chillers</option>
                        <option data-value="l3d">Cooling Towers</option>


                        <!--- Line 17 DryCharge 3rd Level -------->
                        <option data-value="l4d">Grid Casting</option>
                        <option data-value="l4d">CB</option>
                        <option data-value="l4d">Oven</option>
                        <option data-value="l4d">Oxide</option>
                        <option data-value="l4d">Pasting</option>
                        <option data-value="l4d">Formation</option>
                        <option data-value="l4d">Chillers</option>
                        <option data-value="l4d">Cooling Towers</option>

                        <!--- Line 18 DryCharge 3rd Level -------->
                        <option data-value="l5d">Grid Casting</option>
                        <option data-value="l5d">CB</option>
                        <option data-value="l5d">Oven</option>
                        <option data-value="l5d">Oxide</option>
                        <option data-value="l5d">Pasting</option>
                        <option data-value="l5d">Formation</option>
                        <option data-value="l5d">Chillers</option>
                        <option data-value="l5d">Cooling Towers</option>

                        <!--- Line 19 DryCharge 3rd Level -------->
                        <option data-value="l6d">Grid Casting</option>
                        <option data-value="l6d">CB</option>
                        <option data-value="l6d">Oven</option>
                        <option data-value="l6d">Oxide</option>
                        <option data-value="l6d">Pasting</option>
                        <option data-value="l6d">Formation</option>
                        <option data-value="l6d">Chillers</option>
                        <option data-value="l6d">Cooling Towers</option>


                        <!--- Line 1 MCB 3rd Level -------->
                        <option data-value="l1m">MCB1</option>
                        <option data-value="l1m">MCB2</option>
                        <option data-value="l1m">MCB3</option>
                        <option data-value="l1m">MCB4</option>
                        <option data-value="l1m">MCB5</option>
                        <option data-value="l1m">MCB Mechanical</option>

                        <!--- Line 2 MCB 3rd Level -------->
                        <option data-value="l2m">MCB1</option>
                        <option data-value="l2m">MCB2</option>
                        <option data-value="l2m">MCB3</option>
                        <option data-value="l2m">MCB4</option>
                        <option data-value="l2m">MCB5</option>
                        <option data-value="l2m">MCB Mechanical</option>

                        <!--- Line 3 MCB 3rd Level -------->
                        <option data-value="l3m">MCB1</option>
                        <option data-value="l3m">MCB2</option>
                        <option data-value="l3m">MCB3</option>
                        <option data-value="l3m">MCB4</option>
                        <option data-value="l3m">MCB5</option>
                        <option data-value="l3m">MCB Mechanical</option>

                        <!--- Plastics Bay-0 3rd Level -------->
                        <option data-value="pl0">IMC01</option>
                        <option data-value="pl0">IMC02</option>
                        <option data-value="pl0">IMC03</option>
                        <option data-value="pl0">IMC04</option>
                        <option data-value="pl0">IMC05</option>
                        <option data-value="pl0">IMC06</option>
                        <option data-value="pl0">IMC07</option>
                        <option data-value="pl0">IMC08</option>
                        <option data-value="pl0">IMC09</option>
                        <option data-value="pl0">IMC10</option>
                        <option data-value="pl0">IMC11</option>
                        <option data-value="pl0">IMC12</option>

                        <!--- Plastics Bay-1 3rd Level -------->
                        <option data-value="pl1">IMC13</option>
                        <option data-value="pl1">IMC14</option>
                        <option data-value="pl1">IMC15</option>
                        <option data-value="pl1">IMC16</option>
                        <option data-value="pl1">IMC17</option>
                        <option data-value="pl1">IMC18</option>
                        <option data-value="pl1">IMC19</option>
                        <option data-value="pl1">IMC20</option>
                        <option data-value="pl1">IMC21</option>
                        <option data-value="pl1">IMC22</option>

                        <!--- Plastics Bay-2 3rd Level -------->
                        <option data-value="pl2">IMC23</option>
                        <option data-value="pl2">IMC24</option>
                        <option data-value="pl2">IMC25</option>
                        <option data-value="pl2">IMC26</option>
                        <option data-value="pl2">IMC27</option>
                        <option data-value="pl2">IMC28</option>
                        <option data-value="pl2">IMC29</option>

                        <!--- Plastics Bay-3 3rd Level -------->
                        <option data-value="pl3">IMC01</option>
                        <option data-value="pl3">IMC02</option>
                        <option data-value="pl3">IMC04</option>
                        <option data-value="pl3">IMC08</option>
                        <option data-value="pl3">IMC10</option>
                        <option data-value="pl3">IMC11</option>
                        <option data-value="pl3">IMC12</option>
                        <option data-value="pl3">IMC14</option>
                        <option data-value="pl3">IMC15</option>
                        <option data-value="pl3">IMC16</option>
                        <option data-value="pl3">IMC17</option>
                        <option data-value="pl3">IMC18</option>
                        <option data-value="pl3">IMC19</option>
                        <option data-value="pl3">IMD01</option>
                        <option data-value="pl3">IMD02</option>
                        <option data-value="pl3">IMD03</option>

                        <!--- Plastics Grinding 3rd Level -------->
                        <option data-value="plg">Rapid 1</option>
                        <option data-value="plg">Rapid 2</option>

                        <!--- Plastics Blending 3rd Level -------->
                        <option data-value="plb">Blending 01</option>
                        <option data-value="plb">Blending 02</option>
                        <option data-value="plb">Blending 03</option>
                        <option data-value="plb">Blending 04</option>
                        <option data-value="plb">Manual</option>

                        <!--- Plastics Sealing 3rd Level -------->
                        <option data-value="pls">SM01</option>
                        <option data-value="pls">SM02</option>
                        <option data-value="pls">SM03</option>
                        <option data-value="pls">SM04</option>
                        <option data-value="pls">SM05</option>
                        <option data-value="pls">SM06</option>
                        <option data-value="pls">SM07</option>
                        <option data-value="pls">SM08</option>
                        <option data-value="pls">SM09</option>
                        <option data-value="pls">SM10</option>
                        <option data-value="pls">SM11</option>
                        <option data-value="pls">SM12</option>
                        <option data-value="pls">SM13</option>
                        <option data-value="pls">SM14</option>
                        <option data-value="pls">SM15</option>
                        <option data-value="pls">TM01</option>
                        <option data-value="pls">TM02</option>
                        <option data-value="pls">TM03</option>
                        <option data-value="pls">TM04</option>
                        <option data-value="pls">TM05</option>
                        <option data-value="pls">TM06</option>
                        <option data-value="pls">TM07</option>
                        <option data-value="pls">TM08</option>
                        <option data-value="pls">TM09</option>
                        <option data-value="pls">TM10</option>
                        <option data-value="pls">TM11</option>
                        <option data-value="pls">TM12</option>
                        <option data-value="pls">TM13</option>
                        <option data-value="pls">TM14</option>
                        <option data-value="pls">TM15</option>

                        <!--- Plastics Die-Test 3rd Level -------->
                        <option data-value="pld">Die Test 1</option>
                        <option data-value="pld">Die Test 2</option>
                        <option data-value="pld">Die Test 3</option>

                        <!--- Plastics Punching 3rd Level -------->
                        <option data-value="plp">APO1</option>
                        <option data-value="plp">APO2</option>
                        <option data-value="plp">APO3</option>
                        <option data-value="plp">APO4</option>
                        <option data-value="plp">APO5</option>
                        <option data-value="plp">Manual 1</option>
                        <option data-value="plp">Manual 2</option>

                        <!--- Acid A 3rd Level -------->
                        <option data-value="acd1">Machine 1</option>
                        <option data-value="acd1">Machine 2</option>
                        <option data-value="acd1">Machine 3</option>
                        <option data-value="acd1">Machine 4</option>
                        <option data-value="acd1">Acid Mechanical</option>

                        <!--- Acid B 3rd Level -------->
                        <option data-value="acd2">Machine 1</option>
                        <option data-value="acd2">Machine 2</option>
                        <option data-value="acd2">Machine 3</option>
                        <option data-value="acd2">Machine 4</option>
                        <option data-value="acd2">Acid Mechanical</option>

                        <!--- Acid C 3rd Level -------->
                        <option data-value="acd3">Machine 1</option>
                        <option data-value="acd3">Machine 2</option>
                        <option data-value="acd3">Machine 3</option>
                        <option data-value="acd3">Machine 4</option>
                        <option data-value="acd3">Acid Mechanical</option>

                        <!--- Plates Line 1 3rd Level -------->
                        <option data-value="plt1">Strip Casting</option>
                        <option data-value="plt1">Curing Booth</option>
                        <option data-value="plt1">Pasting</option>
                        <option data-value="plt1">Flash Drier</option>
                        <option data-value="plt1">Oxide</option>

                        <!--- Plates Line 2 3rd Level -------->
                        <option data-value="plt2">Strip Casting</option>
                        <option data-value="plt2">Curing Booth</option>
                        <option data-value="plt2">Pasting</option>
                        <option data-value="plt2">Flash Drier</option>
                        <option data-value="plt2">Oxide</option>

                        <!--- Plates Line 3 3rd Level -------->
                        <option data-value="plt3">Strip Casting</option>
                        <option data-value="plt3">Curing Booth</option>
                        <option data-value="plt3">Pasting</option>
                        <option data-value="plt3">Flash Drier</option>
                        <option data-value="plt3">Oxide</option>

                        <!--- Plates Line 4 3rd Level -------->
                        <option data-value="plt4">Strip Casting</option>
                        <option data-value="plt4">Curing Booth</option>
                        <option data-value="plt4">Pasting</option>
                        <option data-value="plt4">Flash Drier</option>
                        <option data-value="plt4">Oxide</option>

                        <!--- Plates Line 5 3rd Level -------->
                        <option data-value="plt5">Strip Casting</option>
                        <option data-value="plt5">Curing Booth</option>
                        <option data-value="plt5">Pasting</option>
                        <option data-value="plt5">Flash Drier</option>
                        <option data-value="plt5">Oxide</option>

                        <!--- Plates Line 6 3rd Level -------->
                        <option data-value="plt6">Strip Casting</option>
                        <option data-value="plt6">Curing Booth</option>
                        <option data-value="plt6">Pasting</option>
                        <option data-value="plt6">Flash Drier</option>
                        <option data-value="plt6">Oxide</option>

                        <!--- Plates Line 7 3rd Level -------->
                        <option data-value="plt7">Strip Casting</option>
                        <option data-value="plt7">Curing Booth</option>
                        <option data-value="plt7">Pasting</option>
                        <option data-value="plt7">Flash Drier</option>
                        <option data-value="plt7">Oxide</option>

                        <!--- Plates Line 8 3rd Level -------->
                        <option data-value="plt8">Strip Casting</option>
                        <option data-value="plt8">Curing Booth</option>
                        <option data-value="plt8">Pasting</option>
                        <option data-value="plt8">Flash Drier</option>
                        <option data-value="plt8">Oxide</option>

                        <!--- Plates Line 9 3rd Level -------->
                        <option data-value="plt9">Strip Casting</option>
                        <option data-value="plt9">Curing Booth</option>
                        <option data-value="plt9">Pasting</option>
                        <option data-value="plt9">Flash Drier</option>
                        <option data-value="plt9">Oxide</option>

                        <!--- Plates Line 10 3rd Level -------->
                        <option data-value="plt10">Strip Casting</option>
                        <option data-value="plt10">Curing Booth</option>
                        <option data-value="plt10">Pasting</option>
                        <option data-value="plt10">Flash Drier</option>
                        <option data-value="plt10">Oxide</option>
                    </select>
                </div>
                <div class="formData">
                    <input type="text" name="txtMno" id="txtMno" placeholder="Machine SAP number" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtSup" id="txtSup" placeholder="Area In-Charge Name" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtSno" id="txtSno" placeholder="Employee # of Area In-Charge" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtTek" id="txtTek" Placeholder="Technician Name" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtTno" id="txtTno" placeholder="Employee # of Technician" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtEqp" id="txtEqp" placeholder="Machine part / Equipment: eg. Bearing, Nuts, Bolts" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtTsk" id="txtTsk" placeholder="Task to accomplish: eg. Lubrication" autocomplete="off" required>
                </div>
                <div class="formData">
                    <select name="select4" id="select4" required>
                        <option value="" disabled selected hidden>Frequency</option>
                        <option value="7">Weekly</option>
                        <option value="30">Monthly</option>
                        <option value="365">Yearly</option>
                        <option value="182">Every 6 Months</option>
                        <option value="91">Every 3 Months</option>
                        <option value="7">Every Monday</option>
                        <option value="7">Every Tuesday</option>
                        <option value="7">Every Wednesday</option>
                        <option value="7">Every Thursday</option>
                        <option value="7">Every Friday</option>
                        <option value="7">Every Saturday</option>
                        <option value="7">Every Sunday</option>
                    </select>
                </div>
                <!-- <div class="formData"> -->
                <!-- <select name="select5" id="selet5" required> -->
                <!-- <option value="" disabled selected hidden>Remarks</option> -->
                <!-- <option value="completed">Completed</option> -->
                <!-- <option value="pending">Pending</option> -->
                <!-- <option value="posted">Posted</option> -->
                <!-- </select> -->
                <!-- </div> -->

                <div class="btnPart">
                    <a href="settings.php">
                        <button type="button" name="btnBck" class="btns">Back</button>
                    </a>
                    <button type="submit" name="btnSubmit" class="btns">Submit</button>
                </div>
                <?php include('footer.php'); ?>
            </form>
            <script>
                $("#select1").change(function() {
                    if ($(this).data('options') == undefined) {
                        $(this).data('options', $('#select2 option').clone());
                    }
                    var id = $(this).val();
                    var options = $(this).data('options').filter('[data-value=' + id + ']');
                    $('#select2').html(options).show();
                });


                $("#select2").change(function() {
                    if ($(this).data('options') == undefined) {
                        $(this).data('options', $('#select3 option').clone());
                    }
                    var id = $(this).val();
                    var options = $(this).data('options').filter('[data-value=' + id + ']');
                    $('#select3').html(options).show();
                });
            </script>
        </div>

    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>