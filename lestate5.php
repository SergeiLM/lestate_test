<?php
// Lestate test

/*

Необходимо модифицировать класс \Bitrix\Main\Security\Mfa\TotpAlgorithm или класс CAllUser.
Используйте наследование или полиморфизм.
Суть задачи:
Необходимо чтобы клиент получал 4-х значный код по смс, для подтверждения.
Сейчас отправляется 6-ти значный код.
Метод отправки кода подтверждения: CAllUser::SendPhoneCode
Метод для проверки кода подтверждения: CAllUser::VerifyPhoneCode


 **/


class NewTotpAlgorithm extends TotpAlgorithm
{
    /**
     * Main method, generate OTP value for provided counter
     *
     * @param string|int $counter Counter.
     * @return string
     */
   public function generateOTP($counter)
    {
        $hash = hash_hmac(parent::getDigest(), parent::toByte($counter), parent::getSecret());
        $hmac = array();
        foreach (str_split($hash, 2) as $hex)
        {
            $hmac[] = hexdec($hex);
        }

        $offset = $hmac[count($hmac)  - 1] & 0xf;
        $code = ($hmac[$offset + 0] & 0x7F) << 24;
        $code |= ($hmac[$offset + 1] & 0xFF) << 16;
        $code |= ($hmac[$offset + 2] & 0xFF) << 8;
        $code |= ($hmac[$offset + 3] & 0xFF);

        $otp = $code % pow(10, 4); // заменяем на 4
        return str_pad($otp, 4, '0', STR_PAD_LEFT);
    }

}


?>