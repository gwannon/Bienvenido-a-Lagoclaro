<?php

require __DIR__ . '/../vendor/autoload.php';

$tags = [
  'HTML' => '',
  'HASH' => date("YmdHis"),
  'TITLE' => "Grúas&Carretas: Guía interna de cobro de multas",
  'DESCRIPTION' => 'En esta guía interna encontrarás todo lo necesario para dirigir a tu mesa divertidas aventuras de Grúas&Carretas.',
  'VERSION' => "1.1",
  'AUTHOR' => "@Gwannon",
  'AUTHORURL' => "https://gwannon.itch.io/",
  'BGCOLOR1' => "#ff2a3b",
  'BGCOLOR2' => "#ad1b3b",
  'BGCOLOR3' => "#58041a",
  'BORDERCOLOR' => "#ff0000",
  'BG' => "#ffbcc1",
  'BGINSIDE' => "#ff8d95",
];

//Generamos el HTML
use FastVolt\Helper\Markdown;

$mkd = Markdown::new();
$mkd->setContent(file_get_contents(__DIR__ . "/../Reglas-de-pesca.md"));
$tags['HTML'] = $mkd->toHtml();
$html = file_get_contents(__DIR__ . "/template.html");
foreach ($tags as $tag => $value) {
  $html = str_replace("|".$tag."|", $value, $html); 
}

$html = str_replace("<p>\salto</p>", "</div><div>", $html);


file_put_contents(__DIR__ . "/../Reglas-de-pesca.html", $html);

echo "InfoKey: Subject\n";
echo "InfoValue: ".$tags['DESCRIPTION']." Versión ".$tags['VERSION']."\n\n";
echo "InfoKey: Author\n";
echo "InfoValue: ".$tags['AUTHOR']."\n\n";
