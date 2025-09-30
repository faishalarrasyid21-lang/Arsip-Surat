# Arsip Surat - Document Archive System

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Project

Arsip Surat is a web-based document archive management system built with Laravel. This application allows users to efficiently manage and organize various types of documents with comprehensive categorization and file upload capabilities.

### Key Features

✅ **Document Management** - Complete CRUD operations for letters and documents  
✅ **Multi-Format File Upload** - Support for PDF, DOC, DOCX, JPG, PNG, RAW, TXT, XLS, XLSX, PPT, PPTX, ZIP, RAR, and more  
✅ **Dynamic Categories** - Database-driven category management system  
✅ **File Type Detection** - Automatic file type recognition with visual icons  
✅ **Responsive UI** - Bootstrap-based clean and modern interface  
✅ **Developer Profile** - Enhanced about page with complete developer information  

### Supported File Formats

- **Documents**: PDF, DOC, DOCX, TXT, RTF
- **Images**: JPG, JPEG, PNG, BMP, GIF, TIFF, WebP, RAW
- **Spreadsheets**: XLS, XLSX, CSV
- **Presentations**: PPT, PPTX
- **Archives**: ZIP, RAR
- **Maximum file size**: 10MB

### Technical Stack

- **Framework**: Laravel 12.31.1
- **PHP Version**: 8.3.11
- **Database**: MySQL
- **Frontend**: Bootstrap 5, FontAwesome Icons
- **File Management**: Custom FileHelper class for type detection

## Installation

1. Clone the repository:
```bash
git clone https://github.com/faishalarrasyid21-lang/Arsip-Surat.git
cd Arsip-Surat
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database:
```bash
php artisan migrate
php artisan db:seed
```

5. Create storage link:
```bash
php artisan storage:link
```

6. Start the development server:
```bash
php artisan serve
```

## Database Structure

- **surats** - Main documents table with file information
- **kategoris** - Categories for document classification
- **users** - User authentication system

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
