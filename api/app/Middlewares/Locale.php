<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Psr\Http\Message\UriInterface;
use Symfony\Component\Translation\TranslatorInterface;

use Illuminate\Translation\Translator;

class Locale
{
    private $translator;
    private $allowedLocales;
    private $defaultLocale;

    public function __construct(Translator $translator, array $allowedLocales, string $defaultLocale)
    {
        $this->translator = $translator;
        $this->allowedLocales = $allowedLocales;
        $this->defaultLocale = $defaultLocale;
    }

    public function __invoke(Request $request, Response $response, $next)
    {
        $locale = $this->getLocaleFromUri($request->getUri());

        if ($locale === null) {
            $locale = array_key_exists('locale', $_SESSION) ? $_SESSION['locale'] : $this->defaultLocale;
        }
        
        // Set response
        $response = $response->setLocation($locale);

        // Set translator object
        $this->translator->setLocale($locale);
        $this->translator->setFallback($locale);

        return $next($request->withAttribute('locale', $locale), $response);
    }

    private function getLocaleFromUri(UriInterface $uri)
    {
        $escapedLocales = array_map(function ($locale) {
            return preg_quote($locale);
        }, $this->allowedLocales);

        $pattern = sprintf('#(%s)#', implode('|', $escapedLocales));

        if (preg_match($pattern, $uri->getPath(), $matches)) {
            return $matches[1];
        }

        return null;
    }
}