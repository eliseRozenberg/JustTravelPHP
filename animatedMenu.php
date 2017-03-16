<style class="cp-pen-styles">
    .menudiv{
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
        font-family: "Roboto" !important;
        font-size: 14px !important;
        -webkit-font-smoothing: antialiased !important;
        -moz-osx-font-smoothing: grayscale !important;
    }

    nav{
        position: absolute !important; 
        margin: 30px auto !important;
    }

    nav ul {
        background: #006666 !important;
        list-style: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    nav ul li {
        position: relative !important;
        display: inline-block !important;
        margin-right: -4px !important;
        text-align: center !important;
    }

    nav ul li:first-child a {
        background: #006666 !important;
        width: 49px !important;
        padding: 15px 0 !important;
    }

    nav ul li:last-child { margin: 0 !important; }

    nav ul li a {
        display: block !important;
        background: #006666 !important;
        padding: 15px 20px !important;
        color: #fff !important;
        font-size: 14px !important;
        text-decoration: none !important;
        transition: 0.2s linear !important;
    }

    nav ul li a:hover { background: #27ae60 !important; }

    nav ul li ul {
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        width: 240px !important;
        border-bottom: 4px solid #006666 !important;
    }

    nav ul li ul li {
        display: block !important;
        width: 100% !important;
        margin: 0 !important;
        text-align: left !important;
    }

    nav ul li ul li a {
        display: block !important;
        background: #2c3e50 !important;
        padding: 10px 15px !important;
    }

    nav ul li ul li a:first-child {
        background: #2c3e50 !important;
        width: auto !important;
        border-left: 4px solid transparent !important;
        padding: 10px 15px !important;
        font-size: 14px !important;
    }

    nav ul li ul li a:hover {
        background: #34495e !important;
        border-left: 4px solid #006666 !important;
    }
</style>
<div class="menudiv">
    <nav class='animated flipInX'>
        <ul>
            <li> <a href='index.php'>
                    <div class='fa fa-home'></div>
                </a> </li>
            <li class='sub-menu'> <a href='#'> Activities <i class='fa fa-angle-down'></i> </a>
                <ul>
                    <li> <a href='searchActivities.php'> View Activities </a> </li>
                    <li> <a href='addActivity.php'> Create Activity </a> </li>
                </ul>
            </li>
            <li class='sub-menu'> <a href='myActivities.php'> My Activities </a></li>
            <li class='sub-menu'> <a href='#'> More <i class='fa fa-angle-down'></i> </a>
                <ul>
                    <li> <a href='aboutUs.php'> About Us </a> </li>
                    <li> <a href='contactus.php'> Contact Us </a> </li>
                    <li> <a href='admin.php'> Admin </a> </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<script>
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("200");
        $(this).find("i.fa").toggleClass("fa-angle-up fa-angle-down");
    });
</script>

