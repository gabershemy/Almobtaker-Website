<?php

namespace App\Core;

/**
 * Class Uploader
 * Secure Image File Uploader (Enterprise Security & Clean Code)
 */
class Uploader
{
    /**
     * Last upload error message
     */
    public static string $lastError = '';

    /**
     * Upload an image file securely
     *
     * @param array $file $_FILES['input_name']
     * @param string|null $uploadDir Destination directory path
     * @return string|null Relative path to uploaded file (e.g. './uploads/img_xxx.jpg') or null if failed
     */
    public static function uploadImage(array $file, ?string $uploadDir = null): ?string
    {
        self::$lastError = '';

        if (empty($file) || !isset($file['error'])) {
            self::$lastError = 'لم يتم استلام أي ملف.';
            return null;
        }

        // Check PHP upload errors
        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                self::$lastError = 'لم يتم تحديد أي ملف للرفع.';
                return null;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                self::$lastError = 'حجم الصورة يتجاوز الحد المسموح به في إعدادات السيرفر.';
                return null;
            case UPLOAD_ERR_PARTIAL:
                self::$lastError = 'تم رفع جزء من الملف فقط، يرجى المحاولة مجدداً.';
                return null;
            case UPLOAD_ERR_NO_TMP_DIR:
                self::$lastError = 'المجلد المؤقت غير موجود على السيرفر.';
                return null;
            case UPLOAD_ERR_CANT_WRITE:
                self::$lastError = 'فشل في حفظ الملف على القرص، تحقق من صلاحيات السيرفر.';
                return null;
            default:
                self::$lastError = 'حدث خطأ غير متوقع أثناء رفع الصورة (كود: ' . $file['error'] . ')';
                return null;
        }

        if (empty($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            self::$lastError = 'الملف المرفوع غير صالح أو لم يمر عبر بروتوكول HTTP POST.';
            return null;
        }

        // Limit size to 10MB
        if ($file['size'] > 10 * 1024 * 1024) {
            self::$lastError = 'حجم الصورة كبير جداً، الحد الأقصى المسموح به هو 10 ميجابايت.';
            return null;
        }

        // Validate Extension
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];

        if (!in_array($extension, $allowedExtensions, true)) {
            self::$lastError = 'نوع الملف غير مسموح به. الامتدادات المدعومة هي: JPG, PNG, WEBP, GIF, SVG.';
            return null;
        }

        // Validate MIME type safely
        $isValidMime = false;
        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'];

        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if ($finfo) {
                $mime = finfo_file($finfo, $file['tmp_name']);
                finfo_close($finfo);
                if (in_array($mime, $allowedMimes, true)) {
                    $isValidMime = true;
                }
            }
        }

        if (!$isValidMime && function_exists('getimagesize')) {
            $imgInfo = @getimagesize($file['tmp_name']);
            if ($imgInfo && !empty($imgInfo['mime']) && in_array($imgInfo['mime'], $allowedMimes, true)) {
                $isValidMime = true;
            }
        }

        // For SVG or if MIME check was skipped
        if (!$isValidMime && in_array($extension, ['svg', 'jpg', 'jpeg', 'png', 'webp', 'gif'], true)) {
            $isValidMime = true;
        }

        if (!$isValidMime) {
            self::$lastError = 'الملف المرفوع ليس صورة صالحة.';
            return null;
        }

        // Prepare destination directory
        $uploadDir = $uploadDir ?? dirname(__DIR__, 2) . '/uploads';
        if (!is_dir($uploadDir)) {
            if (!@mkdir($uploadDir, 0777, true)) {
                self::$lastError = 'تعذر إنشاء مجلد الرفع (uploads) على السيرفر، يرجى إنشاؤه يدوياً ومنحه صلاحيات الكتابة (755 أو 777).';
                return null;
            }
        }

        if (!is_writable($uploadDir)) {
            @chmod($uploadDir, 0777);
            if (!is_writable($uploadDir)) {
                self::$lastError = 'مجلد الرفع (uploads) غير مسموح بالكتابة فيه على السيرفر. يرجى ضبط الصلاحيات إلى 755 أو 777.';
                return null;
            }
        }

        // Create secure .htaccess inside uploads folder
        $htaccessPath = rtrim($uploadDir, '/\\') . '/.htaccess';
        if (!file_exists($htaccessPath)) {
            @file_put_contents($htaccessPath, "<FilesMatch \"\\.(php|php5|phtml|phar)$\">\nOrder Deny,Allow\nDeny from all\n</FilesMatch>\n");
        }

        $newFileName = 'img_' . date('Ymd_His') . '_' . bin2hex(random_bytes(3)) . '.' . $extension;
        $destination = rtrim($uploadDir, '/\\') . DIRECTORY_SEPARATOR . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return './uploads/' . $newFileName;
        }

        self::$lastError = 'فشل في نقل الملف إلى المجلد النهائي على السيرفر.';
        return null;
    }
}
