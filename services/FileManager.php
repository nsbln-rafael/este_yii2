<?php

namespace app\services;

use app\models\Item;

class FileManager implements FileManagerInterface
{
    /**
     * @param Item[] $items
     * @return string
     */
    public function getCSV(array $items)
    {
        $filename = time()  . ".csv";

        $fp = fopen('files/' . $filename, 'wb');
        foreach ($items as $item ) {
            $item->updateShowCount();

            $row = $item->id . ";" . "\"" .$item->name. "\"";
            fputcsv($fp, [$row]);
        }

        fclose($fp);

        return $filename;
    }
}