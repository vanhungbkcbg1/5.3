<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class WCFController extends Controller
{
    //

    public function callService(){
        $client = new SoapClient("http://localhost:19969/Service1.svc?wsdl");

        /* Fill your Contact Object */

        /* Set your parameters for the request */
        $params = array(
            "value" => '232',
        );

        /* Invoke webservice method with your parameters, in this case: Function1 */
        $response = $client->__soapCall("GetData", array($params));

        /* Print webservice response */
        var_dump($response->{"GetDataResult"});
    }
}
