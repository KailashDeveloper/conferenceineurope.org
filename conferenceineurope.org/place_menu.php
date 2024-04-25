 <?php if (isset($place)) {

  ?>

   <!--

<h2>Conferences in <?php echo $state = $place; ?>  </h2>

-->

   <h1><?php if (isset($meta_title) and $meta_title == 1) echo $meta_title;
        else { ?>
     <?php echo $place; ?>   
<?php echo $meta_title ?>
       Conferences in <?php echo $place; ?> <?php echo date("Y"); ?> <?php } ?> </h1>



   <hr>

   <?php if (isset($page_content) and $meta_title == 1) echo $page_content;
    else { ?>

     <p>
       Search and find all international conferences in <?php echo $place; ?> for latest discussion and networking with academic, professional and industry experts. conferenceineurope brings you complete details or current and upcoming conferences across academic fields of study. This site is leading with the best conference listing and promotion platform for scholars, students, academicians, professionals and experts. Here, you can find many verified international conferences in <?php echo $place; ?> on different subjects like Medical Conference, Engineering Conference, Mathematics Conference, Management Conference, Business Conference and Social Science Conference etc.
     </p>

     <p>
       As a researcher, you can explore many more knowledge and a global platform through international conference in <?php echo $place; ?> with participants and speak with experts. We are trusted by thousands of professionals, academicians and conference organizers to post, index and promote their conferences worldwide. So, to know more about all the upcoming international conferences in <?php echo $place; ?> <?php echo date("Y"); ?>, search and subscribe to conferenceineurope.
     </p>

     <br>

     <br>



   <?php

    }

    ?>













   <h5>Confernece Calendar :</h5>



   <ul class="col-md-12 county-month-confr">



     <?php



      $nes_con = trim(strtolower(sp_replace_hi($place)));



      for ($i = 0; $i < sizeof($m_array); $i++) {



      ?>



       <li class="country"><a href="<?php echo $page_name; ?>?date=<?php echo $m_a[$i]; ?>"><?php echo $m_array[$i]; ?></a></li>







     <?php } ?>







     <li class="country"><a href="<?php echo $page_name; ?>">All Events</a></li>





   </ul>



   <br>

   <br>

   <br>

   <br>





   <hr />

   <h2 class="heading-space">List of Upcoming Conferences in <?php echo $state = $place; ?> </h2>



 <?php } ?>