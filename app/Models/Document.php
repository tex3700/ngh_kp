<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Document
{
    private static array $extMap = [
        'pdf'  => ['icon' => 'pdf',  'ext' => 'PDF'],
        'doc'  => ['icon' => 'doc',  'ext' => 'DOC'],
        'docx' => ['icon' => 'doc',  'ext' => 'DOCX'],
        'xls'  => ['icon' => 'xls',  'ext' => 'XLS'],
        'xlsx' => ['icon' => 'xls',  'ext' => 'XLSX'],
        'zip'  => ['icon' => 'zip',  'ext' => 'ZIP'],
        'rar'  => ['icon' => 'zip',  'ext' => 'RAR'],
        'jpg'  => ['icon' => 'jpg',  'ext' => 'JPG'],
    ];

    /**
     * Возвращает список документов для продукта по его slug.
     * Файлы хранятся в storage/app/public/{slug}/
     * Доступны через /storage/{slug}/ (после php artisan storage:link)
     */
    public static function forProduct(string $slug): array
    {
        $documents = [];
        $storagePath = storage_path("app/public/{$slug}");

        if (!is_dir($storagePath)) {
            return $documents;
        }

        $files = scandir($storagePath);

        foreach ($files as $filename) {
            if ($filename === '.' || $filename === '..') {
                continue;
            }

            $fullPath = $storagePath . DIRECTORY_SEPARATOR . $filename;

            if (!is_file($fullPath)) {
                continue;
            }

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!isset(self::$extMap[$ext])) {
                continue;
            }

            $title = pathinfo($filename, PATHINFO_FILENAME);
            $title = str_replace(['_', '-'], ' ', $title);

            $documents[] = [
                'title' => $title,
                'file'  => Storage::url("{$slug}/{$filename}"),
                'ext'   => self::$extMap[$ext]['ext'],
                'icon'  => self::$extMap[$ext]['icon'],
            ];
        }

        return $documents;
    }
}
