<?php
$p1 = new DemoProduct();

$p1->sku="SOFA-MILANO-DEMO";

$p1->name="Sofa Milano Demo";

$p1->category="Sofa";

$p1->base_price=4500000;

$p1->old_price=5200000;

$p1->colors=[
'Đen',
'Kem'
];

$p1->image_folder="sofa-milano";
$p1->tags=["Gỗ","Vải"];

return [
    $p1
];