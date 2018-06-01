<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .bottom{
            height: 100px;
        }
        .item-title{
            font-size: 13px;
            margin: 0;
            margin-top: 0;
            margin-left: 10px;
            padding-top: 10px;
            color: maroon;
        }
        .tb{
            font-weight: 500;
            font-size: 11px;
        }
        .dec{
            font-weight: 500;
            font-size: 11px;
        }
        td a{
            display: inline-block;
            height: 100%;
            width: 100%;
            cursor: pointer;
        }
        .modal {
            text-align: center;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-fixed-top"  style="border-radius:0; background-color: #2874F0" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header ">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="nav navbar-brand" style="font-family:'Colonna MT'; font-size: 2.2em">mahilaBazar</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <div class="col-sm-3 col-md-3">
            <form class="navbar-form" role="search">
                <div class="form-group">
                    <div class="input-group input-append search" >
                        <input type="text" class="form-control input-lg" placeholder="Search here for products " style="border-radius: 0">
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-search"></span></span>
                    </div>
                </div>
            </form>
        </div>
        <ul class="nav navbar-nav " style="font-size: 12px; font-weight: 500">
            <li style='padding: 0em'><a href='about.php' >About us</a></li>
            <li style="padding: 0em"><a href="#myModal1" data-toggle="modal">Sign Up</a></li>
            <li style="padding: 0em">
                <?php if(!(isset($_SESSION['uid']))){
                    echo "
           <a href='#myModal' data-toggle='modal'>Login</a>
           ";
                }else{
                    echo
                    "<a>$_SESSION[u_name]</a>  ";
                    echo"  <li style='padding: 0em'><a href='logout.php' >Logout</a></li>";
                }
                ?>

            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li style="padding-top: 10%">
                <div class="col-sm-3 col-md3">
                    <button class="btn"  <?php if(!isset($_SESSION['uid'])){?> onclick="my()" <?php }else {?> onclick="window.location='cart.php'"<?php }?> style="background-color: #2469D9;border-radius: 0 ;width: 100px; color: white">
                        <div class="glyphicon glyphicon-shopping-cart">
                        </div> CART <span style="font-weight: 500; font-size: 15px; font-family: 'Verdana'"><?php
                        if(!(isset($_SESSION['uid']))){
                            echo "0";
                        }else {
                            $cart_sql = "select count(*) AS 'total' from cart WHERE cart_ref='$_SESSION[cart_ref]';";
                            $cart_run = mysqli_query($conn, $cart_sql);
                            $count = mysqli_fetch_assoc($cart_run);
                            if (!(isset($_SESSION['uid']))) {
                                echo "0";
                            } else {
                                echo $count['total'];

                            }
                        }?></button>
                </div>
                </li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div class="container">
    <div class="row">

        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Ira-Soleil-Women-Black-&amp,&item_id=20'><center><img  src='images/jacket7.jpg' class='img-responsive'></center></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Ira-Soleil-Women-Black-&amp,&item_id=20' style='text-decoration: none' > Ira Soleil Women Black &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>604</span>&nbsp&nbsp&#8377<del>755</del>&nbsp<span style='color: red'>(20% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Ira-Soleil-Women-Black-&amp,&item_id=20' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(20 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Black-Sheer-Longline-Ethnic,&item_id=17'><img  src='images/jacket5.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Black-Sheer-Longline-Ethnic,&item_id=17' style='text-decoration: none' > Black Sheer Longline Ethnic</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>765</span>&nbsp&nbsp&#8377<del>1699</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Black-Sheer-Longline-Ethnic,&item_id=17' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(17 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Libas-Women-Navy,&item_id=2'><img  src='images/kurta1.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Libas-Women-Navy,&item_id=2' style='text-decoration: none' > Libas Women Navy</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>450</span>&nbsp&nbsp&#8377<del>999</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Libas-Women-Navy,&item_id=2' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(2 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=AKS-Women-Black-Printed,&item_id=8'><img  src='images/kurta6.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=AKS-Women-Black-Printed,&item_id=8' style='text-decoration: none' > AKS Women Black Printed</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>765</span>&nbsp&nbsp&#8377<del>1699</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=AKS-Women-Black-Printed,&item_id=8' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(8 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Nayo-Women-Yellow-Printed,&item_id=10'><img  src='images/kurta8.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Nayo-Women-Yellow-Printed,&item_id=10' style='text-decoration: none' > Nayo Women Yellow Printed</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>540</span>&nbsp&nbsp&#8377<del>1199</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Nayo-Women-Yellow-Printed,&item_id=10' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(10 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Jashn-Women-Green-&amp,&item_id=9'><img  src='images/kurta7.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Jashn-Women-Green-&amp,&item_id=9' style='text-decoration: none' > Jashn Women Green &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>500</span>&nbsp&nbsp&#8377<del>999</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Jashn-Women-Green-&amp,&item_id=9' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(9 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=W-Off-White-Sheer-Longline,&item_id=13'><img  src='images/jacket10.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=W-Off-White-Sheer-Longline,&item_id=13' style='text-decoration: none' > W Off-White Sheer Longline</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>900</span>&nbsp&nbsp&#8377<del>1999</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=W-Off-White-Sheer-Longline,&item_id=13' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(13 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Ira-Soleil-Black-&amp,&item_id=12'><img  src='images/jacket1.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Ira-Soleil-Black-&amp,&item_id=12' style='text-decoration: none' > Ira Soleil Black &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>536</span>&nbsp&nbsp&#8377<del>765</del>&nbsp<span style='color: red'>(30% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Ira-Soleil-Black-&amp,&item_id=12' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(12 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Ira-Soleil-Navy-Chiffon,&item_id=16'><img  src='images/jacket4.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Ira-Soleil-Navy-Chiffon,&item_id=16' style='text-decoration: none' > Ira Soleil Navy Chiffon</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>956</span>&nbsp&nbsp&#8377<del>1195</del>&nbsp<span style='color: red'>(20% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Ira-Soleil-Navy-Chiffon,&item_id=16' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(16 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Global-Desi-Off-White,&item_id=18'><img  src='images/jacket8.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Global-Desi-Off-White,&item_id=18' style='text-decoration: none' > Global Desi Off-White</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>1500</span>&nbsp&nbsp&#8377<del>2999</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Global-Desi-Off-White,&item_id=18' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(18 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=AKS-Women-Blue-&amp,&item_id=4'><img  src='images/kurta2.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=AKS-Women-Blue-&amp,&item_id=4' style='text-decoration: none' > AKS Women Blue &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>720</span>&nbsp&nbsp&#8377<del>1599</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=AKS-Women-Blue-&amp,&item_id=4' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(4 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Global-Desi,&item_id=14'><img  src='images/jacket3.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Global-Desi,&item_id=14' style='text-decoration: none' > Global Desi</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>1600</span>&nbsp&nbsp&#8377<del>3999</del>&nbsp<span style='color: red'>(60% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Global-Desi,&item_id=14' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(14 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Biba-Women-Grey-Melange-&amp,&item_id=19'><img  src='images/jacket6.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Biba-Women-Grey-Melange-&amp,&item_id=19' style='text-decoration: none' > Biba Women Grey Melange &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>1500</span>&nbsp&nbsp&#8377<del>2999</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Biba-Women-Grey-Melange-&amp,&item_id=19' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(19 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Nayo-Women-Black,&item_id=5'><img  src='images/kurta3.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Nayo-Women-Black,&item_id=5' style='text-decoration: none' > Nayo Women Black</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>675</span>&nbsp&nbsp&#8377<del>1499</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Nayo-Women-Black,&item_id=5' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(5 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Anouk-Women-Black-&amp,&item_id=11'><img  src='images/kurta9.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Anouk-Women-Black-&amp,&item_id=11' style='text-decoration: none' > Anouk Women Black &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>500</span>&nbsp&nbsp&#8377<del>999</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Anouk-Women-Black-&amp,&item_id=11' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(11 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Vaamsi-Women-Beige-&amp,&item_id=3'><img  src='images/kurta.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Vaamsi-Women-Beige-&amp,&item_id=3' style='text-decoration: none' > Vaamsi Women Beige &amp</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>360</span>&nbsp&nbsp&#8377<del>900</del>&nbsp<span style='color: red'>(60% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Vaamsi-Women-Beige-&amp,&item_id=3' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(3 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=-Women-Sea-Green-Printed,&item_id=6'><img  src='images/kurta4.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=-Women-Sea-Green-Printed,&item_id=6' style='text-decoration: none' >  Women Sea Green Printed</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>1329</span>&nbsp&nbsp&#8377<del>1899</del>&nbsp<span style='color: red'>(30% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=-Women-Sea-Green-Printed,&item_id=6' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(6 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=White-Colourblock-Sleeveless,&item_id=21'><img  src='images/jacket9.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=White-Colourblock-Sleeveless,&item_id=21' style='text-decoration: none' > White Colourblock Sleeveless</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>950</span>&nbsp&nbsp&#8377<del>1899</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=White-Colourblock-Sleeveless,&item_id=21' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(21 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=BIBA-OUTLET-Purple-Ethnic,&item_id=15'><img  src='images/jacket2.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=BIBA-OUTLET-Purple-Ethnic,&item_id=15' style='text-decoration: none' > BIBA OUTLET Purple Ethnic</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>650</span>&nbsp&nbsp&#8377<del>1299</del>&nbsp<span style='color: red'>(50% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=BIBA-OUTLET-Purple-Ethnic,&item_id=15' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(15 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='col-md-12 single-item' style='padding: 0'>
                <div class='top'><a href='products.php?&item_title=Libas-Mustard-Yellow,&item_id=7'><img  src='images/kurta5.jpg' class='img-responsive'></a></div>
                <div class='bottom'>
                    <h3 class='item-title text-center'><a href='products.php?&item_title=Libas-Mustard-Yellow,&item_id=7' style='text-decoration: none' > Libas Mustard Yellow</a></h3>
                    <p class='text-center tb' style='padding-top: 4%'>&#8377<span>495</span>&nbsp&nbsp&#8377<del>1099</del>&nbsp<span style='color: red'>(55% OFF)</span></p>
                    <table class='table' style='border-top: 1px dotted #d4d5d9;'>
                        <tbody class='dec'>
                        <tr>
                            <td class='text-center'><a href='products.php?&item_title=Libas-Mustard-Yellow,&item_id=7' style='color: #526cd0; text-decoration: none;'>BUY</a></td>
                            <td class='text-center'>
                                <a href='javscript:'  onclick="cart_ajax(7 )"                       style="color: #526cd0;  text-decoration: none;">ADD TO CART</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     </div>
</div>

</body>
</html>
