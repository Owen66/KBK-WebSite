<?php

require_once "bootstrap.php";

$itemRepository = $entityManager->getRepository('Item');
$items = $itemRepository->findAll();

foreach ($items as $item) {
    echo sprintf("-%s\n", $item->getCategory()->getName());
}