<?php

ob_start();

session_start();

if(!isset($_SESSION['ALERT_ADMIN']))

header("location:index.php");



include("mysqli_dbconn.php");

error_reporting(5);

$sql_emp=mysqli_query($link,"SELECT * FROM `org_detail` ORDER BY `org_id`  DESC");

			

           			 $selectall_rs=mysqli_query($link,$sql_emp);

			 $i=0;



chdir('phpxls');

require_once 'Writer.php';

chdir('..');



$sheet1 =  array(

  array(		'org_id'       ,'contact_person_name',	'orginisation_name',	'org_mail'      		 ),  

  

);

while($emp_det=mysqli_fetch_array($sql_emp))

				{

				

				

				$fname=$selectall_row['firstName_txt']." ".$selectall_row['lastname_txt'];

				

				array_push($sheet1,array($emp_det['org_id'],

										$emp_det['contact_person_name'],

										 $emp_det['orginisation_name'],

										 $emp_det['org_mail']

										 

										 ) 

										 );

				}



$workbook = new Spreadsheet_Excel_Writer();



$format_und =& $workbook->addFormat();

$format_und->setBottom(2);//thick

$format_und->setBold();

$format_und->setColor('black');

$format_und->setFontFamily('Trebuchet MS');

$format_und->setSize(10);



$format_reg =& $workbook->addFormat();

$format_reg->setColor('black');

$format_reg->setFontFamily('Verdana');

$format_reg->setSize(10);



$arr = array(

      'Employee Details'=>$sheet1,

      //'Names'   =>$sheet2,

      );



foreach($arr as $wbname=>$rows)

{

    $rowcount = count($rows);

    $colcount = count($rows[0]);



    $worksheet =& $workbook->addWorksheet($wbname);



    $worksheet->setColumn(0,0, 6.14);//setColumn(startcol,endcol,float)

    $worksheet->setColumn(1,3,15.00);

    $worksheet->setColumn(4,4, 8.00);

    

    for( $j=0; $j<$rowcount; $j++ )

    {

        for($i=0; $i<$colcount;$i++)

        {

            $fmt  =& $format_reg;

            if ($j==0)

                $fmt =& $format_und;



            if (isset($rows[$j][$i]))

            {

                $data=$rows[$j][$i];

                $worksheet->write($j, $i, $data, $fmt);

            }

        }

    }

}



$workbook->send('Organiser_Detail.xls');

$workbook->close();



//-----------------------------------------------------------------------------

?>



