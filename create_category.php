<?php
// create_product.php
require_once "bootstrap.php";

$newCategoryName = $argv[1];

$product = new Category();
$category->setName($newCategoryName);

$entityManager->persist($category);
$entityManager->flush();

echo "Created Category with ID " . $category->getId() . "\n";