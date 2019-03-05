<?php namespace App\Models\WS;

if (!extension_loaded("soap")) {
    dl("php_soap.dll");
}

use Zend\Soap\Client;


class WebService
{
    private $ws;
    private $wsdl;
    private $options;
    private $certificate;
    private $passphrase;

    public function __construct($wsdl, array $options = [])
    {
        $this->wsdl = $wsdl;
        $this->certificate = null;
        $this->passphrase = null;

        try {
            $this->ws = new Client();
            $this->ws->setWsdl($wsdl);

            $this->options = $this->generateOptions($options) ?: $options;
            $this->ws->setOptions($this->options);
        } catch (SoapFault $e) {
            throw $e;
        }
    }

    public static function test()
    {
        $wsdl = "http://fx.cloanto.com/webservices/CloantoCurrencyServer.asmx?wsdl";
        $local_cert = "C:\\SoapCerts\ClientKeyAndCer.pem";

        $method = 'InformationCopyright';

        $soapClient =  new self($wsdl, array('local_cert' => $local_cert, 'classmap' => [
            'ConsultaStock' => Material::class,
            'ConsultaStockRespuesta' => WSResponse::class
        ]));

        $theResponse = $soapClient->ws->{$method}();
        $theResponse = $soapClient->callFunction($method, [], true);

        // dd($theResponse->{"{$method}Result"});
        dd($theResponse);
    }

    private function generateOptions(array $options = null)
    {
        $dummy = array(
            'location' => $this->wsdl,
            'keep_alive' => isset($options['keep_alive']) ? $options['keep_alive'] : true,
            'trace' => isset($options['trace']) ? $options['trace'] : true,
            'local_cert' => $this->certificate,
            'passphrase' => $this->passphrase,
            'cache_wsdl' => WSDL_CACHE_NONE,
            "trace" => 1,
            "exceptions" => true,
            "style" => SOAP_RPC,
            "use" => SOAP_ENCODED,
            "encoding" => 'UTF-8',
            "soap_version"  => SOAP_1_2,
            "compression" => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 5,
            'classmap' => isset($options['classmap']) ? $options['classmap'] : []
        );
        $out = [];

        foreach ($options as $key => $value) {
            if (array_key_exists($key, $dummy)) {
                $out = array_add($out, $key, $value);
            }
        }

        return $out;
    }

    public function getResponse($method)
    {
        $theResponse = $this->ws->{$method}();

        return $theResponse->{"{$method}Result"};
        // return new WSResponse;
    }

    public function callFunction($method, array $params = [], $watchResult = false)
    {
        $methodResult = "{$method}Result";

        $result = (!isset($params)) ? $this->ws->call($method, $params) : $this->ws->call($method);

        return ($watchResult && (array_key_exists($methodResult, $result) || method_exists($result, $methodResult))) ?
            $result = $result->{$methodResult} : $result;
    }
}
