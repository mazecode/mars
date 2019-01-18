<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Psr\Http\Message\UriInterface;
use Symfony\Component\Translation\TranslatorInterface;

use Illuminate\Translation\Translator;

class Locale
{
    /**
     * TranslatorInterface
     */
    private $translator;
    /**
     * @var string []
     */
    private $allowedLocales;
    /**
     * @var string
     */
    private $defaultLocale;
    /**
     * @param TranslatorInterface $translator
     * @param string[] $allowedLocales list of allowed locales that can be set
     * @param string $defaultLocale the default locale if a current locale is not set
     */
    public function __construct(Translator $translator, array $allowedLocales, string $defaultLocale)
    {
        $this->translator = $translator;
        $this->allowedLocales = $allowedLocales;
        $this->defaultLocale = $defaultLocale;
    }
    /**
     * Retrieves the current locale from (in the given order):
     *
     * - the current URL path
     * - the locale stored in the session
     * - the default locale
     *
     * The translator is set to the current locale and the locale is passed
     * as a request attribute.
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        $locale = $this->getLocaleFromUri($request->getUri());

        if ($locale === null) {
            $locale = array_key_exists('locale', $_SESSION) ? $_SESSION['locale'] : $this->defaultLocale;
        }

        var_dump($this->translator->locale());

        $this->translator->setLocale($locale);
        $this->translator->setFallback($locale);

        var_dump($this->translator->locale());

        return $next($request->withAttribute('locale', $locale), $response);
    }
    /**
     * Tries to retrieve the locale from the URI.
     *
     * The locale is assumed to be the first part in the path, e.g. "/en/home" yields "en" as result.
     *
     * @param UriInterface $uri
     * @return string|null the locale if found in the url and one of the allowed locales, othwerwise null
     */
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