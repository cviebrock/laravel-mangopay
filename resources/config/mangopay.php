<?php

/**
 * These configuration options are not required.
 *
 * The properties below are set directly on MangoPay\MangoPayApi()->Config
 * during instantiation of the MangopayAPI class, unless otherwise specified
 * in the docs below.
 *
 * @see \MangoPay\Libraries\Configuration
 */

return [

    /**
     * Absolute path to file holding one or more certificates to verify the peer with.
     * If empty - don't verifying the peer's certificate.
     */
    // 'CertificatesFilePath' => '',

    /**
     * [INTERNAL USAGE ONLY]
     * Switch debug mode: log all request and response data
     */
    // 'DebugMode' => false,

    /**
     * Set the logging class if DebugMode is enabled
     */
    // 'LogClass' => 'MangoPay\Libraries\Logs',

    /**
     * Set the cURL connection timeout limit (in seconds)
     */
    // 'CurlConnectionTimeout' => 30,

    /**
     * Set the cURL response timeout limit (in seconds)
     */
    // 'CurlResponseTimeout' => 80,

    /**
     * Set the storage class.
     *
     * This class name is instantiated and then passed to
     * MangoPay\MangoPayApi()->OAuthTokenManager->RegisterCustomStorageStrategy()
     */
    // 'StorageClass' => null,

];
