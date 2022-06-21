<?php

//Zadanie z imionami

// Otwieranie pliku
$file = fopen("php_internship_data.csv", "r");

$nameArray;
$num = 0;

// Odczytywanie danych z pliku linia po lini
while (($data = fgetcsv($file)) !== false) {
    // Zapisywanie danych tylko z pierwszej kolumny (Imiona)
    $nameArray[$num] = $data[0];
    $num++;
}

// Liczenie i sortowanie najczęściej występujących imion
$count = array_count_values($nameArray);
arsort($count);
$keys = array_keys($count);

//Wyświetlanie 10 najpopularniejszych imion oraz zmiana wielkości liter
echo "Zadanie z imionami\n";
for ($i = 0; $i < 10; $i++) {
    echo $i + 1 . ". " . ucfirst(strtolower($keys[$i])) . " : " . $count[$keys[$i]] . "\n";
}

// Zamknięcie pliku
fclose($file);

// Zadanie z datami

// Otwieranie pliku
$file = fopen("php_internship_data.csv", "r");

$dateArray;
$num = 0;

// Odczytywanie danych z pliku linia po lini
while (($data = fgetcsv($file)) !== false) {
    // Zapisywanie danych tylko z drugiej kolumny (Daty), jeżeli data jest po 01.01.2000
    if ($data[1] > "2000-01-01") {
        $dateArray[$num] = $data[1];
        $num++;
    }
}

// Liczenie i sortowanie najczęściej występujących dat
$count = array_count_values($dateArray);
arsort($count);
$keys = array_keys($count);

//Wyświetlanie 10 najpopularniejszych dat urodzenia po 01.01.2000 oraz zmiana formatowania daty
echo "\nZadanie z datami\n";
for ($i = 0; $i < 10; $i++) {
    echo $i + 1 . ". " . date("d.m.Y", strtotime($keys[$i])) . " : " . $count[$keys[$i]] . "\n";
}
// Zamknięcie pliku
fclose($file);