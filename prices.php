<?php

$xml = simplexml_load_file('books.xml');
$sum = 0;
$media = 0;
$book = $xml->book;
$booksName = [];
$booksPrice = [];

for($i=0; $i<count($book); $i++){
    $prices = $xml->book[$i]->price;
    $sum += $prices;
    $media = $sum / count($book);
}

for($i=0; $i<count($book); $i++){
    $prices = $xml->book[$i]->price;
    if($prices > $media){
        $booksName[$i] = $xml->book[$i]->title;
        $booksPrice[$i] = $xml->book[$i]->price;
    }
}

echo "\nO preço da soma de todos os livros é: U$". number_format($sum, 2 , ".");

echo "\nA média do preço dos livros é: U$". number_format($media, 2, ".");

echo "\n\nOs livros que tem o valor maior que a média de todos os valores juntos são: \n";

foreach (array_combine($booksName, $booksPrice) as $name => $price) {
    echo "- $name - $price\n\n";
}



