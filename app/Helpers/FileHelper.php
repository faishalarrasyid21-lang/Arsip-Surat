<?php

namespace App\Helpers;

class FileHelper
{
    /**
     * Get file icon based on file extension
     *
     * @param string $filename
     * @return string
     */
    public static function getIcon($filename)
    {
        if (empty($filename)) {
            return 'fas fa-file text-muted';
        }
        
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        $icons = [
            // Documents
            'pdf' => 'fas fa-file-pdf text-danger',
            'doc' => 'fas fa-file-word text-primary',
            'docx' => 'fas fa-file-word text-primary',
            'txt' => 'fas fa-file-alt text-secondary',
            
            // Spreadsheets
            'xls' => 'fas fa-file-excel text-success',
            'xlsx' => 'fas fa-file-excel text-success',
            
            // Presentations
            'ppt' => 'fas fa-file-powerpoint text-warning',
            'pptx' => 'fas fa-file-powerpoint text-warning',
            
            // Images
            'jpg' => 'fas fa-file-image text-info',
            'jpeg' => 'fas fa-file-image text-info',
            'png' => 'fas fa-file-image text-info',
            'gif' => 'fas fa-file-image text-info',
            'bmp' => 'fas fa-file-image text-info',
            'tiff' => 'fas fa-file-image text-info',
            'webp' => 'fas fa-file-image text-info',
            'raw' => 'fas fa-file-image text-info',
            
            // Archives
            'zip' => 'fas fa-file-archive text-dark',
            'rar' => 'fas fa-file-archive text-dark',
        ];
        
        return $icons[$extension] ?? 'fas fa-file text-muted';
    }

    /**
     * Get human readable file type
     *
     * @param string $filename
     * @return string
     */
    public static function getType($filename)
    {
        if (empty($filename)) {
            return 'Unknown File';
        }
        
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        $types = [
            'pdf' => 'PDF Document',
            'doc' => 'Word Document',
            'docx' => 'Word Document',
            'txt' => 'Text File',
            'xls' => 'Excel Spreadsheet',
            'xlsx' => 'Excel Spreadsheet',
            'ppt' => 'PowerPoint Presentation',
            'pptx' => 'PowerPoint Presentation',
            'jpg' => 'JPEG Image',
            'jpeg' => 'JPEG Image',
            'png' => 'PNG Image',
            'gif' => 'GIF Image',
            'bmp' => 'BMP Image',
            'tiff' => 'TIFF Image',
            'webp' => 'WebP Image',
            'raw' => 'RAW Image',
            'zip' => 'ZIP Archive',
            'rar' => 'RAR Archive',
        ];
        
        return $types[$extension] ?? 'Unknown File';
    }
}