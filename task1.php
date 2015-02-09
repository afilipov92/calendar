<link href="style.css" rel="stylesheet" type="text/css">
<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');
if(isset($_GET['year']))
{
	if($_GET['year'] > 0)
	{
       $year = $_GET['year'];
	}
	else
	{
		echo "<b>Год не может быть отрицательным!</b>";
		exit();
	}
}
else
{
	$year = date('Y');
}
if(isset($_GET['month']))
{
	if($_GET['month'] <= 12 && $_GET['month'] >= 1)
	{
       $month = $_GET['month'];
	}
	else
	{
		echo "<b>Месяц задан не верно!</b>";
		exit();
	}
}
else
{
	$month = date('m');
}

function get_calendar($year, $month)
{
	   $date = mktime(0, 0, 0, $month, 1, $year);
       if($month <= 12 && $month >= 1)
	   {
         $previous_month = $month - 1;
	     $next_month = $month + 1;
		 $previous_year = $year;
		 $next_year = $year;
       }
	   if($next_month > 12)
	   {
		   $next_year = $year + 1;
		   $next_month = 1;
	   }
	   if($previous_month < 1)
	   {
		   $previous_year = $year - 1;
		   $previous_month = 12; 
	   }
	   $next_year1= $year + 1;
	   $previous_year1 = $year - 1;
   $html = "<h1><a href = task1.php?year=$previous_year&month=$previous_month>< </a>".date("F", $date)."<a href = task1.php?year=$next_year&month=$next_month> ></a> <a href = task1.php?year=$previous_year1&month=$month>< </a>".date("Y", $date)."<a href = task1.php?year=$next_year1&month=$month> ></a></h1>";	
   $html .= "<table width='50%' border='1' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td class = 'name'>Sunday</td>
    <td class = 'name'>Monday</td>
    <td class = 'name'>Tuesday</td>
    <td class = 'name'>Wednesday</td>
    <td class = 'name'>Thursday</td>
    <td class = 'name'>Friday</td>
    <td class = 'name'>Saturday</td>
  </tr>";
  $day = 1;
  for($i = 1; $i <= 6; $i++)
  {
	  $html.="<tr>";
	  for($j = 1; $j <= 7; $j++)
	  {
		  if($i == 1 && $j < date("N", $date) || $day > date("t", $date))
		  {
			  $html .= "<td></td>";
		  }
		  else
		  {
			  $html .="<td>$day</td>";
			  $day++;
		  }
	  }
	  $html.="</tr>";
  }
   $html.="</table>";
   return $html;
}


echo get_calendar($year, $month);

