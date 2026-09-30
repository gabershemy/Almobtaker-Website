<?php

namespace App\Services;

use App\Core\Security;
use App\Repositories\MessageRepository;

/**
 * Class ContactService
 * Handles customer inquiries, validation, bot protection & rate limiting
 */
class ContactService
{
    private MessageRepository $messageRepo;

    public function __construct(?MessageRepository $messageRepo = null)
    {
        $this->messageRepo = $messageRepo ?? new MessageRepository();
    }

    /**
     * Process contact form submission
     *
     * @param array $postData
     * @return array ['success' => bool, 'message' => string, 'code' => int]
     */
    public function handleSubmission(array $postData): array
    {
        // 1. Rate Limiting Check (Max 5 submissions per 5 minutes per session)
        if (!Security::checkRateLimit('contact_form', 5, 300)) {
            return [
                'success' => false,
                'message' => 'لقد قمت بإرسال عدة طلبات مؤخراً. يرجى الانتظار بضع دقائق قبل المحاولة مجدداً.',
                'code'    => 429
            ];
        }

        // 2. Honeypot Spam Bot Trap Check
        if (!empty($postData['website_hp']) || !empty($postData['company_trap'])) {
            // Silently return success to confuse spam bots without saving to DB
            return [
                'success' => true,
                'message' => 'تم استلام طلبك بنجاح! سيتواصل معك فريقنا في أقرب وقت.',
                'code'    => 200
            ];
        }

        // 3. Sanitize inputs
        $name        = Security::sanitizeString($postData['name'] ?? '');
        $phone       = Security::sanitizePhone($postData['phone'] ?? '');
        $email       = Security::sanitizeEmail($postData['email'] ?? '');
        $serviceType = Security::sanitizeString($postData['service_type'] ?? 'استفسار عام');
        $message     = Security::sanitizeString($postData['message'] ?? '');

        // 4. Validate mandatory fields
        if (empty($name) || mb_strlen($name) < 2) {
            return [
                'success' => false,
                'message' => 'يرجى إدخال الاسم بشكل صحيح (حرفين على الأقل).',
                'code'    => 400
            ];
        }

        if (empty($phone) || mb_strlen($phone) < 6) {
            return [
                'success' => false,
                'message' => 'يرجى إدخال رقم هاتف / واتساب صحيح.',
                'code'    => 400
            ];
        }

        // 5. Store inquiry in DB
        $saved = $this->messageRepo->create([
            'name'         => $name,
            'phone'        => $phone,
            'email'        => $email,
            'service_type' => $serviceType,
            'message'      => $message
        ]);

        if ($saved) {
            return [
                'success' => true,
                'message' => 'تم استلام طلبك بنجاح! سيتواصل معك فريقنا الهندسي في أقرب وقت.',
                'code'    => 200
            ];
        }

        return [
            'success' => false,
            'message' => 'تعذر حفظ الطلب حالياً، يرجى المحاولة مرة أخرى أو التواصل معنا عبر الواتساب مباشرة.',
            'code'    => 500
        ];
    }
}
