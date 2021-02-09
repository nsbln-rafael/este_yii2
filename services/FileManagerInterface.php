<?php

namespace app\services;

use app\models\Item;

interface FileManagerInterface
{
    /**
     * @param Item[] $items
     * @return string
     */
    public function getCSV(array $items);
}