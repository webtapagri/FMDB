<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use GuzzleHttp\Client;
use Redirect;
use Alert;

class Guz extends Model
{
	// protected $public_key = 'B8C1FB623AA3CE4FCBAABC2CBCD18';
	// protected $secret_key = 'B4B18358EEF2E9AEDE1FACE2E8A8A';
	public $result;

	public function __construct($method, $url, $param=null)
	{
        $token = Session::get('token');

		$client = new Client();
		switch ($method)
		{
			case 'GET':
				$string = '?token=' . $token;
				if($param)
				{
					foreach($param as $key => $value)
					{
						$string .= '&' . $key . '=' . $value;
					}
				}

				// $string .= '&public_key=' . $this->public_key . '&secret_key=' . $this->secret_key;
				$res = $client->request('GET', $url . $string);
			break;

			case 'POST':
				$params = [
					'form_params' => $param
				];
                // dd($params);

				// $params['form_params']['public_key'] = $this->public_key;
				// $params['form_params']['secret_key'] = $this->secret_key;

                //$string = '?token=' . $token;

				$res = $client->request('POST', $url, $params);
                // $res = $client->request('POST', $url.$string);
                // dd($url.$string);
			break;
		}

		$this->result = json_decode($res->getBody(), true);
		// dd($this->result);
		// return $this->result->error;
		if(array_has($this->result, 'response.message') && $this->test['response']['message'] == 'Token Invalid')
		{
			Session::flush();
			Alert::error('Your session has expired');
			return Redirect::to('');
		}elseif(array_has($this->result, 'error') && $this->test['response']['error'] == 'user_not_found')
		{
			Session::flush();
			Alert::error('Your session has expired');
			return Redirect::to('');
		}elseif(array_has($this->result, 'error') && $this->test['response']['error'] == 'token_expired')
		{
			Session::flush();
			Alert::error('Your session has expired');
			return Redirect::to('');
		}elseif(array_has($this->result, 'error') && $this->result->error == 'token_expired')
		{
			Session::flush();
			Alert::error('Your session has expired');
			return Redirect::to('');
		}

		return $this;
	}
}
