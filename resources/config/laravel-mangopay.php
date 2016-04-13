<?php

return [

    /**
     * The following configurations options are required.
     * You can set them all in your application's `.env`
     * file to keep the values from prying eyes.
     */

    'ClientId' => env('MANGOPAY_CLIENT_ID'),

    'ClientPassword' => env('MANGOPAY_CLIENT_PASSWORD'),

    'BaseUrl' => env('MANGOPAY_BASE_URL', 'https://api.mangopay.com'),

    /**
     * The remaining configuration options are not required,
     * but if you want to change them, then this is the
     * place for you to do that!
     *
     * These properties are set directly on MangoPay\MangoPayApi()->Config
     */

    /**
     * Temporary folder location.  This package uses a sensible default.
     */
    // 'TemporaryFolder' => sys_get_temp_dir(),

    /**
     * The cURL response timeout in seconds
     */
    // 'CurlResponseTimeout' => 30,

    /**
     * The cURL connection timeout in seconds
     */
    // 'CurlConnectionTimeout' => 80,

    /**
     * Absolute path to file holding one or more certificates to
     * verify the peer with (if empty, there won't be any
     * verification of the peer's certificate)
     */
    // 'CertificatesFilePath' => '',

];
