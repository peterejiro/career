
<header class="style1 stick">
   <!-- <div class="topbar">
        <div class="container">
            <div class="topbar-inner theme-bg">
                <ul class="top-info pull-left">
                    <li><i class="fa fa-map-marker"></i> PO Box 16122 Collins Street West</li>
                </ul>
                <ul class="top-info pull-right">
                    <li><i class="fa fa-phone"></i> +(1200)-0989-568-331</li>
                    <li><i class="fa fa-clock-o"></i> Mon - Sat: 8:00 am to 7:00 pm</li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="menu-box">
        <div class="container">
            <div class="menu-box-inner">
                <div class="logo"><a href="index" title="Logo" itemprop="url"><img src="assets/images/logo1.png" alt="logo1.png" itemprop="image"></a></div>
                <nav>
                    <div>
                        <ul>
                            <?php

                            if (isset($_SESSION['username'])){

                            ?>
                            <li><a href="index" title="" itemprop="url">Home</a> </li>
                            <li><a href="career" title="" itemprop="url">Careers</a> </li>
                                <li><a href="assessment" title="" itemprop="url">Career Assessment </a> </li>
                            <li><a href="logout" title="" itemprop="url">log Out </a> </li>


                            <?php } else{ ?>

                                <li><a href="index" title="" itemprop="url">Home</a> </li>
                                <li><a href="career" title="" itemprop="url">Careers</a> </li>
                                <li><a href="assessment" title="" itemprop="url">Career Assessment </a> </li>


                            <?php } ?>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div><!-- Menu Box -->
</header>
<!--<div class="hdr-srch-bx">
    <span class="srch-cls-btn"><i class="fa fa-close"></i></span>
    <form>
        <input type="text" placeholder="Search your keywords...">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div> -->
<div class="rspn-hdr">
    <div class="rspn-mdbr">
        <ul class="rspn-scil">
            <li><a href="#" title="" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" title="" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" title="" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" title="" itemprop="url" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
        <form class="rspn-srch">
            <input type="text" placeholder="Enter Your Keyword" />
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="lg-mn">
        <div class="logo"><a href="index.html" title="Logo" itemprop="url"><img src="assets/images/logo1.png" alt="logo1.png" itemprop="image"></a></div>
        <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
    </div>
    <div class="rsnp-mnu">
        <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
        <ul>
            <li><a href="index" title="" itemprop="url">Home</a> </li>
            <li><a href="career" title="" itemprop="url">Careers</a>   </li>
            <li><a href="assessment" title="" itemprop="url">Career Assessment</a> </li>


        </ul>
    </div><!-- Responsive Menu -->
</div><!-- Responsive Header -->