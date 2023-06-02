<?php

namespace App\Service;

class AppRedirectService
{
    public static function noResultsForParams()
    {
        abort(422, 'Não há produtos para as condições estipuladas');
    }
}
