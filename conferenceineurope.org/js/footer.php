<?php
if (isset($link)) {
    mysqli_close($link);
    unset($link);
}
?>
<style>
    .footer .social-align {
        text-align: center;
    }

    .social-line {
        display: inline-flex;
    }

    li:before {
        content: none !important;
    }

    .footer .social-align h3:after {
        content: '';
        position: absolute;
        bottom: -10px;
        width: 80px;
        height: 1px;
        background: #f90;
        right: 531px;
    }
</style>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <img src="images/new1.png" alt="conference 2024" class="logo-bg">
                    <div class="footer-list social-align">
                        <h3> Social</h3>
                        <ul class="social_iconul social-line">
                            <li><a rel="noopener noreferrer" href="https://www.facebook.com/Conferencesineurope" target="_blank" aria-label="All Conference Alert Facebook Business Page"><i class="fa fa-facebook"></i></a></li>
                            <li><a rel="noopener noreferrer" href="https://twitter.com/conf_in_europe" target="_blank" aria-label="All Conference Alert Twitter Business Page"><i class="fa fa-twitter"></i></a></li>

                            <li><a rel="noopener noreferrer" href="https://in.pinterest.com/conference_in_europe" target="_blank" aria-label="All Conference Alert Twitter Business Page"><i class="fa fa-pinterest"></i></a></li>
                            <li><a rel="noopener noreferrer" href="https://www.linkedin.com/in/conferenceineurope" target="_blank" aria-label="All Conference Alert Linkedin Business Page"><i class="fa fa-linkedin"></i></a></li>

                            <li><a rel="noopener noreferrer" href="https://www.instagram.com/conf_in_europe" target="_blank" aria-label="All Conference Alert Linkedin Business Page"><i class="fa fa-instagram"></i></a></li>
                            <li><a rel="noopener noreferrer" href="https://www.youtube.com/channel/UCXa8gfYEtNrOXv7I1ZLZJ4Q" target="_blank" aria-label="All Conference Alert YouTube Page"><i class="fa fa-youtube"></i></a></li>

                            <li><a rel="nofollow noopener noreferrer" href="https://conference-in-europe.business.site" target="_blank" aria-label="Academic Conference Wikipedia Page"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 ">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:50px;">
                            <h3> Quick Links</h3>
                            <div class="footer-list">
                                <ul>
                                    <li><a href="index.php" class="current">Home</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="register.php">Register </a> </li>
                                    <li><a href="add_event.php">Add New Event </a> </li>
                                    <li><a href="https://blog.conferenceineurope.org/">Blog</a> </li>

                                    <li><a href="contact.php"> Contact Us</a></li>

                                </ul>
                            </div>
                        </div>
                        <!--<
                                <div class="col-md-7" style="padding-left:60px;">
                                    <h3> Recent Post</h3>
                                    
                                    div class="footer-list">
                                        <ul>
                                            <li>  <a href="#">Lorem ipsum dummy text</a></li>
                                            <li>  <a href="#">Lorem ipsum dummy text</a></li>
                                            <li>  <a href="#">Lorem ipsum dummy text</a></li>
                                        </ul>
                                    </div>
                                </div>
-->
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="f-contact">
                        <h3> About Conference in Europe </h3>
                        <p>Find all upcoming European International Conferences on Social Science and Economics, Innovation and Management, Engineering and Technology, Electrical and Electronics Engineering, Medical Science, Psychology, Language and Teaching, Natural Science and Environment, Law and Political Science, Chemical and Biochemical Engineering, Applied Physics and Mathematics, Advances in Business Management and Information Technology, Forestry Food and Sustainable Agriculture, Mechanical &amp; Production Engineering etc.</p>
                        <!--<a href="contact.php" class="f-contact-btm"> Contact Us</a>-->
                    </div>
                </div>
            </div>
            <!-- <div class="footer-list social-align">
                <h3> Social</h3>
                <ul class="social_iconul social-line">
                    <li><a rel="noopener noreferrer" href="https://www.facebook.com/Conferencesineurope" target="_blank" aria-label="All Conference Alert Facebook Business Page"><i class="fa fa-facebook"></i></a></li>
                    <li><a rel="noopener noreferrer" href="https://twitter.com/conf_in_europe" target="_blank" aria-label="All Conference Alert Twitter Business Page"><i class="fa fa-twitter"></i></a></li>

                    <li><a rel="noopener noreferrer" href="https://in.pinterest.com/conference_in_europe" target="_blank" aria-label="All Conference Alert Twitter Business Page"><i class="fa fa-pinterest"></i></a></li>
                    <li><a rel="noopener noreferrer" href="https://www.linkedin.com/in/conferenceineurope" target="_blank" aria-label="All Conference Alert Linkedin Business Page"><i class="fa fa-linkedin"></i></a></li>

                    <li><a rel="noopener noreferrer" href="https://www.instagram.com/conf_in_europe" target="_blank" aria-label="All Conference Alert Linkedin Business Page"><i class="fa fa-instagram"></i></a></li>
                    <li><a rel="noopener noreferrer" href="https://www.youtube.com/channel/UCXa8gfYEtNrOXv7I1ZLZJ4Q" target="_blank" aria-label="All Conference Alert YouTube Page"><i class="fa fa-youtube"></i></a></li>

                    <li><a rel="nofollow noopener noreferrer" href="https://conference-in-europe.business.site" target="_blank" aria-label="Academic Conference Wikipedia Page"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div> -->

        </div>
    </div>

    <div class="copy-txt text-center">
        <div class="container">
            <p>© 2024 Conference In Europe All Rights Reserved </p>
        </div>
    </div>
</footer>
<?php
include('footer_script.php');
?>