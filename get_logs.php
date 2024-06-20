<?php
session_start();

function getLogs() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G09C");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);

    if ($data === false) {
        echo json_encode(["error" => curl_error($ch)]);
        curl_close($ch);
        return [];
    }

    curl_close($ch);

    $data_tab = str_split($data, 33);
    return array_slice($data_tab, -400); // Retrouver les 400 dernières valeurs
}

function decodeFrame($frame) {
    if (strlen($frame) !== 33) {
        return null;
    }

    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($frame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    return [
        'type' => $t,
        'object' => $o,
        'request' => $r,
        'sensor_type' => $c,
        'sensor_number' => $n,
        'value' => (int)$v,
        'frame_number' => $a,
        'checksum' => $x,
        'timestamp' => "$hour:$min:$sec" // Format d'affichage pour l'axe des abscisses
    ];
}

$data_tab = getLogs();
$decoded_frames = array_filter(array_map('decodeFrame', $data_tab));

header('Content-Type: application/json');
echo json_encode($decoded_frames);
?>
