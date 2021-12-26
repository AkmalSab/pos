<html>

<head>
    <title>
        POS
    </title>
    <?php
    require_once('auth.php');
    ?>
    <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <!--sa poip up-->
    <script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/application.js" type="text/javascript" charset="utf-8"></script>
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            })
        })
    </script>
</head>
<?php
function createRandomPassword()
{
    $chars = "003232303232023232023456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;
    }
    return $pass;
}
$finalcode = 'RS-' . createRandomPassword();
?>



<script language="javascript" type="text/javascript">
    /* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
    <!-- Begin
    var timerID = null;
    var timerRunning = false;

    function stopclock() {
        if (timerRunning)
            clearTimeout(timerID);
        timerRunning = false;
    }

    function showtime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds()
        var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
        if (timeValue == "0") timeValue = 12;
        timeValue += ((minutes < 10) ? ":0" : ":") + minutes
        timeValue += ((seconds < 10) ? ":0" : ":") + seconds
        timeValue += (hours >= 12) ? " P.M." : " A.M."
        document.clock.face.value = timeValue;
        timerID = setTimeout("showtime()", 1000);
        timerRunning = true;
    }

    function startclock() {
        stopclock();
        showtime();
    }
    window.onload = startclock;
    // End -->
</SCRIPT>

<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
                        <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a> </li>
                        <li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a> </li>
                        <li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a> </li>
                        <li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a> </li>
                        <li class="active"><a href="breakeven.php"><i class="icon-money icon-2x"></i> Break Even Point</a> </li>
                        <li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a> </li>

                        <br><br><br><br><br><br>
                        <li>
                            <div class="hero-unit-clock">

                                <form name="clock">
                                    <font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/span-->
            <div class="span10">
                <div class="contentheader">
                    <i class="icon-group"></i> Break Even Point
                </div>
                <ul class="breadcrumb">
                    <li><a href="index.php">Dashboard</a></li> /
                    <li class="active">Break Even Point</li>
                </ul>

                <hr>

                <div id="ac">
                    <span>Selling Price : </span><input type="text" style="width:265px; height:30px;" id="Selling_Price" required /><br>
                    <span>Variable Cost : </span><input type="text" style="width:265px; height:30px;" id="Variable_Cost" /><br>
                    <div style="float:left; margin-right:10px;">
                        <button id="contribution" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Calculate Contribution Margin</button>
                    </div>
                    <br><br><br>
                    <span>Fixed Cost : </span><input type="text" style="width:265px; height:30px;" id="Fixed_Cost" /><br>
                    <span>Contribution Margin : </span><input type="text" style="width:265px; height:30px;" disabled id="Contribution_Margin" /><br>
                    <span>BEP : </span><input type="text" style="width:265px; height:30px;" disabled id="bep_value" /><br>
                    <div style="float:left; margin-right:10px;">
                        <button id="bep" class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Calculate BEP(unit)</button>
                    </div>
                    <div style="float:left; margin-right:10px;">
                        <button id="reset" type="reset" class="btn btn-warning btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Reset</button>
                    </div>

                </div>





                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(function() {


            // contribution calculation
            $("#contribution").click(function() {
                var ContributionMargin = $("#Selling_Price").val() - $("#Variable_Cost").val();
                alert(ContributionMargin);
                $("#Contribution_Margin").val(ContributionMargin);
            });

            // bep calculation
            $("#bep").click(function() {
                var BEP = $("#Fixed_Cost").val() / $("#Contribution_Margin").val();
                alert(BEP);
                $("#bep_value").val(BEP);
            });

            // clear input
            $("#reset").click(function() {
                $("#Selling_Price").val('');
                $("#Variable_Cost").val('');
                $("#Fixed_Cost").val('');
                $("#Contribution_Margin").val('');
                $("#bep_value").val('');

            });

        });
    </script>
</body>
<?php include('footer.php'); ?>

</html>