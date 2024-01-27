<?php
//encryption class
class Encryption
{
    private string $encryptMethod = 'AES-256-CBC';
    private string $key;
    private string $iv;

    // This function contains generic variables
    public function __construct()
    {
        $mykey = 'ThisIsASecuredKey';
        $myiv = 'ThisIsASecuredBlock';
        $this->key = substr(hash('sha256', $mykey), 0, 32);
        $this->iv = substr(hash('sha256', $myiv), 0, 16);
    }

    // This function for encrypt function
    public function encrypt(string $value): string
    {
        return openssl_encrypt(
            $value,
            $this->encryptMethod,
            $this->key,
            0,
            $this->iv
        );
    }

    // This function for decrypt function
    public function decrypt(string $base64Value): string
    {
        return openssl_decrypt(
            $base64Value,
            $this->encryptMethod,
            $this->key,
            0,
            $this->iv
        );
    }
}
?>