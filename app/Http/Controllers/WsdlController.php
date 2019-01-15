<?php

namespace App\Http\Controllers;
//use nusoap_client;


class WsdlController extends Controller
{
  
    public function index()
    {
        require_once('../app/Lib/nusoap/lib/nusoap.php');

        $proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
        $proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
        $proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
        $proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
        $client = new \NuSoapClient(
            'http://10.20.1.140:8000/sap/bc/soap/wsdl11?services=ZFMDB_GROUPMATERIAL&sap-client=700',
            'wsdl'
        );

        $err = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
        }
// Doc/lit parameters get wrapped
        $param = array('Symbol' => 'it_group');
        $result = $client->call('ZFMDB_GROUPMATERIAL', array('parameters' => $param), '', '', false, true);
// Check for a fault
        if ($client->fault) {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
        } else {
	// Check for errors
            $err = $client->getError();
            if ($err) {
		// Display the error
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } else {
		// Display the result
                echo '<h2>Result</h2><pre>';
                print_r($result);
                echo '</pre>';
            }
        }
        echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
        echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
        echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
  	}
 }