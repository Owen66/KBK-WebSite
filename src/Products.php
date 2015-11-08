<?php

namespace kbk;


class Products
{
    private $db;

    function __construct(){
        $this->db = new Database();
    }

    function getCategories() {
        $sql = "SELECT * FROM category;";
        $categories = $this->db->query($sql);
        return $categories;
    }

    function getItems($catId) {
        $sql = "SELECT * FROM item WHERE category_id = " . $catId . ";";
        $items = $this->db->query($sql);
        return $items;
    }

    function getItem($itemId) {
        $sql = "SELECT * FROM item WHERE id = " . $itemId . ";";
        $result = $this->db->query($sql);
        $item = array();
        $item['name'] = $result[0]['name'];
        $item['photo'] = $result[0]['photo'];
        return $item;
    }
}