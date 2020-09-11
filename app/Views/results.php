<?= $this->extend('default_template')  // CARREGA O TEMPLATE?>
<?= $this->section('content') // ESCPECIFICA EM QUAL SECTION COLOCA O ABAIXO ?>


<?php

$tableResults = new \CodeIgniter\View\Table();

unset($fieldNames[11]);
unset($fieldNames[10]);

$tableResults->setHeading($fieldNames);

$template = [
        'table_open' => '	<table id="simple-table" class="table  table-bordered table-hover">'
];
$tableResults->setTemplate($template);


// var_dump($fieldNames); //DEBUG

echo $tableResults->generate($results);


?>


<?= $this->endSection() // ENCERRA A SECTION?>
