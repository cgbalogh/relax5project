<?php
$GLOBALS['TCA']['tx_relax5project_domain_model_productgroup']['columns']['products']['config'] = [
    'type' => 'select',
    'foreign_table' => 'tx_relax5project_domain_model_product',
    'foreign_table_where' => ' AND tx_relax5project_domain_model_product.hidden=0 ORDER BY category, name',
    'size' => 6,
    'minitems' => 0,
    'maxitems'      => 9999,
];

$GLOBALS['TCA']['tx_relax5project_domain_model_productgroup']['columns']['productoptions']['config'] = [
    'type' => 'select',
    'foreign_table' => 'tx_relax5project_domain_model_productoption',
    'foreign_table_where' => ' AND tx_relax5project_domain_model_productoption.hidden=0 ORDER BY name',
    'size' => 20,
    'multiple' => 1,
    'minitems' => 0,
    'maxitems'      => 9999,
];
