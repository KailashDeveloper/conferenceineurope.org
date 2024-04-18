<header>
    <div class="topheader">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo"> <a href="./"><img src="images/new1.png" alt="Conference in Europe Logo" class="img-responsive"/></a>
                    </div>
                </div>
    <div class="col-md-10">
    
    <div class="col-md-8">
    	<div class="social-mng">
            <a href="https://www.facebook.com/Conferencesineurope" target="_blank"><i style="color:#3b5998; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-facebook"></i></a>
            <a href="https://twitter.com/conf_in_europe" target="_blank"><i style="color:#00acee; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-twitter"></i></a>
            <a href="https://in.pinterest.com/conference_in_europe" target="_blank"><i style="color:#E60023; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-pinterest"></i></a>
            <a href="https://www.linkedin.com/in/conferenceineurope" target="_blank"><i style="color:#0e76a8; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/conf_in_europe" target="_blank"><i style="color:#ac46bd; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCXa8gfYEtNrOXv7I1ZLZJ4Q" target="_blank"><i style="color:#FF0000; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-youtube"></i></a>
            <a href="https://conference-in-europe.business.site" target="_blank"><i style="color:#db4a39; font-size:20px; padding-left:10px; cursor:pointer;" class=" fa fa-google-plus"></i></a>
            
        </div>
    </div>
<div class="col-md-2">
<div class="sign-list">
<ul>
<?php
if(isset($_SESSION['LOGIN_USER'] ))
{
?>
<li><a href="organizer.php"> <i class=" fa fa-sign-in"></i>Organizer Panel</a></li>
<li><a href="logout.php"> <i class=" fa fa-sign-in"></i>Logout</a></li>
<?php           
}
else 
{
?>
<li> <a href="login.php"><i class=" fa fa-sign-in"></i> Login</a></li>
<li> <a href="add_event.php"> <i class=" fa fa-sign-in"></i> Register</a></li>
<?php
}
?>
</ul>
</div>
</div>
    
    <div class="col-md-2">
<div class="evnt_promtBttn">
<ul>
<li class="blink-soft"> <a href="add_event.php"> promote your event</a></li>
</ul>
</div>
</div>
		<div class="col-md-12">
        <div class="droopmenu-navbar">
            <div class="droopmenu-inner">
                <div class="droopmenu-header">                   
                    <a href="#" class="droopmenu-toggle"></a>                
                </div>
    <div class="droopmenu-nav">
        <ul class="droopmenu">
            <li><a href="./" class="current">Home</a></li>
            <li><a href="about.php">About Us</a></li>
<!--
            <li><a href="#">Find Conferences</a>
            	<ul>
                	<li>Conferences by Countries</li>
                    <li>Conferences by Cities</li>
                </ul>
            </li>
-->
            <li><a href="register.php">Top Organiser</a></li>
            <li><a href="https://blog.conferenceineurope.org/">Blog</a></li>
            <li><a href="add_event.php">Add Events</a></li>
            <li><a href="contact.php">Contact Us</a></li> 
                                            
                                            
			<?php
            if(isset($_SESSION['LOGIN_USER'] ))
            {
				?>
            <li class='d-hidden'><a href='organizer.php'>Organizer Panel</a></li>
            <li class="d-hidden"><a href="logout.php">Logout</a></li>
            <?php           
            }
            else 
			{
            ?>
            
             <li class="d-hidden"><a href="register.php">Register</a></li>
             <li class="d-hidden"><a href="login.php">Login </a></li>
<?php
}
?>
</ul>
</div>         
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>