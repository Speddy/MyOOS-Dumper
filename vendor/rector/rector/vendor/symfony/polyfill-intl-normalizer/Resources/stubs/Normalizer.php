<?php

class Normalizer extends Symfony\Polyfill\Intl\Normalizer\Normalizer
{
    /**
     * @deprecated since ICU 56 and removed in PHP 8
     */
    final public const NONE = 2;
    final public const FORM_D = 4;
    final public const FORM_KD = 8;
    final public const FORM_C = 16;
    final public const FORM_KC = 32;
    final public const NFD = 4;
    final public const NFKD = 8;
    final public const NFC = 16;
    final public const NFKC = 32;
}
