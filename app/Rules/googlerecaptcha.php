<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class googlerecaptcha implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (env('RECAPTCHA_ENABLE') == true) {
            return $this->verify($value);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return ':attribute.failed';
    }

    /**
     * Verify token.
     */
    private function verify(string $token = null): bool
    {
        $url = env('RECAPTCHA_URL', 'https://www.google.com/recaptcha/api/siteverify');

        $response = (new Client())->request('POST', $url, [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $token,
            ],
        ]);

        $code = $response->getStatusCode();
        $content = json_decode($response->getBody()->getContents());

        return $code == 200 && $content->success == true;
    }
}
