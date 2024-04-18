<?php if (isset($topic)) { ?>
   <!--<h2>Conferences in <?php echo $topic; ?> </h2>-->
   <h1>
      <?php if (isset($meta_title))
         echo $meta_title;
      else { ?>
         <?php echo $topic; ?> Conferences in Europe <?php echo date("Y"); ?>
      <?php } ?>
   </h1>
   <hr>
   <p>
      <?php if (isset($page_content)) echo $page_content;
      else { ?>
         Get conference alerts on upcoming conferences, meetings, seminars, workshops and other associated in the <strong><?php echo $topic; ?></strong> Conferences in Europe sector in <?php echo date("Y"); ?>. Conferenceineurope, trusted conference listing platform for academicians, industries & conference organizers, offers you complete details such as conference name, date, venue, organizer details, conference agenda & call to submit research papers at one place. You can further segregate all conferences and scientific events in <strong><?php echo $topic; ?></strong> by country, state, city, month & dates too. With more than 100,000 registered subscribers, Conferenceineurope is the ultimate platform for PHD students, research scholars, researchers, academic professionals and industry peers to find relevant conferences/events important to them. We are trusted by thousands of academicians, professionals, and event organizers as well to post, index & promote their conferences worldwide.
      <?php
      }
      ?>     
   </p>
   <hr />
   <h5 class="heading-space-5">Confernece Calendar :</h5>
   <ul class="col-md-12 county-month-confr">
      <?php
      for ($i = 0; $i < sizeof($m_array); $i++) {
      ?>
         <li class="country"> <a href="<?php echo $page_name; ?>?date=<?php echo $m_a[$i]; ?>"><?php echo $m_array[$i]; ?></a></li>
      <?php } ?>
      <li class="country"> <a href="<?php echo $page_name; ?>">All Events</a> </li>
   </ul>
   <br>
   <br>
   <br>
   <br>
   <hr />
   <h2 class="heading-space">List of Upcoming <?php echo $topic; ?> International Conference </h2>
   <hr />

<?php } ?>