<?php

use app\services\FileManager;
use app\services\FileManagerInterface;

$container = Yii::$container;

$container->set(FileManagerInterface::class, FileManager::class);