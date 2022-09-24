<?php
  $d = new DateTime();
  $day = $d->format('d');
  $month =  $d->format('M');
  
  if ($month === 'Jan') $month = 'Janeiro';
  else if ($month === 'Feb') $month = 'Fevereiro';
  else if ($month === 'Mar') $month = 'Março';
  else if ($month === 'Apr') $month = 'Abril';
  else if ($month === 'May') $month = 'Maio';
  else if ($month === 'Jun') $month = 'Junho';
  else if ($month === 'Jul') $month = 'Julho';
  else if ($month === 'Aug') $month = 'Agosto';
  else if ($month === 'Sep') $month = 'Setembro';
  else if ($month === 'Oct') $month = 'Outubro';
  else if ($month === 'Nov') $month = 'Novembro';
  else if ($month === 'Dec') $month = 'Dezembro';

  function time_elapsed_A ( $secs ) {
    $bit = array (
      'h' => $secs / 3600 % 24,
      'm' => $secs / 60 % 60
    );
    
    foreach ($bit as $k => $v)
      if ($v > 0) $ret[] = $v;
       
    return join( ':', $ret );
  }

  $nowtime = time();
  $oldtime = 1335939007;

  $new_time = time_elapsed_A( $nowtime-$oldtime );

  if ($new_time < '13:00') $new_time .= ' am';
  else if ($new_time >= '13:00') $new_time .= ' pm';

  // echo $new_time;
?>