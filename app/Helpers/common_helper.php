<?php
function get_ina_date($date)
{
    $month = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $splitDate = explode('-', $date);
    $splitTime = explode(' ', $splitDate[2]);
    return $splitTime[0] . ' ' . $month[(int)$splitDate[1]] . ' ' . $splitDate[0];
}
