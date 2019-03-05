<?php namespace App\Models\WS;

use Eloquent\Enumeration\AbstractEnumeration;

final class Tipo extends AbstractEnumeration
{
    const TERM = 'TERM';
    const SIM = 'SIM';
    const PACK = 'PACK';
    const ZIOT = 'ZIOT';
    const ACCT = 'ACCT';
}
