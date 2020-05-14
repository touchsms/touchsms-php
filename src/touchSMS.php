<?php

namespace TouchSMS\TouchSMS;

/**
 * touchSMS API class
 *
 * API Documentation: http://support.touchsms.com.au/hc/en-us/categories/200093809-APIs
 * TouchSMS Information: http://touchsms.com.au
 *
 * @author touchSMS <https://github.com/touchsms>
 * @version 1.3
 */
class touchSMS {

    /**
     * The API base URL
     */
    const API_URL = 'https://platform.touchsms.com.au/rest/v1/';
    const SANDBOX_API_URL = 'http://www.mocky.io/v2/';

    /**
     * The API Unique Id
     *
     * @var string
     */
    private $_unqiueId;

    /**
     * The API Unique Password
     *
     * @var string
     */
    private $_uniquePassword;

    private $_sandbox;
    private $_obj;
    private $_response;
    private $_notice;

    /**
     * API Keys can be generated at https://platform.touchsms.com.au/apis/
     *
     * @param string $uniqueId          touchSMS unique id API key
     * @param string $uniquePassword    touchSMS unique password API key
     *
     * @return void
     */
    public function __construct($uniqueId, $uniquePassword, $sandbox = false) {
        $this->_unqiueId = $uniqueId;
        $this->_uniquePassword = $uniquePassword;
        $this->_sandbox = $sandbox;
    }

    /**
     * Send an SMS to a mobile handset.
     *
     * @param string  $message              Non-Unicode message to be sent to the handset
     * @param integer $mobileNumber         Mobile number in international format. To send
     *                                      to the mobile 0491 570 110, submit 61491570110
     * @param string [optional]  $reference If sending a two way message replies will be pushed
     *                                      back to your system with your reference id.
     * @param string [optional]  $senderId  When null the system will send a two
     *                                      way message from our shared-pool of mobile
     *                                      numbers. Optional to send from a valid Alpha/Numeric
     *                                      source.
     *
     * @return mixed
     */

    public function sendMessage($message, $mobileNumber, $reference = null, $senderId = null) {
        return $this->_makeRequest('messages', 'POST', array('message' => $message, 'number' => $mobileNumber, 'reference' => $reference, 'senderid' => $senderId));
    }

    /**
     * Check the balance and get other information about the authenticated user.
     *
     * @return mixed
     */

    public function checkBalance() {
        return $this->_makeRequest('users', 'GET');
    }

    /**
     * Get human readable responses from the last API call
     *
     * @return string
     */

    public function getCleanResponse() {
        return $this->_notice;
    }

    /**
     * Make API curl request.
     *
     * @param string  $function             API resouce path
     * @param string  $method               Request type GET|POST
     * @param array [optional] $params      Additional request parameters
     *
     * @return mixed
     */

    private function _makeRequest($function, $method, $params = array()) {
        if (is_array($params)) {
            $paramString = http_build_query($params);
        }

        if ($this->_sandbox) {
            $apiUrl = self::SANDBOX_API_URL;
            
            if ($function === 'messages') {
              if (
                $this->_uniqueId === 'RGyrznuKkTYa-'
              ) {
                $function = '5ebdd9813100007800c5cd82';
              } else if (
                isset($params['number'])
                && empty($params['number'])
              ) {
                $function = '5ebdd8d13100008400c5cd7e';
              } else if (
                isset($params['senderid'])
                && $params['senderid'] === 'touch+SMS'
              ) {
                $function = '5ebdd8b53100006800c5cd7c';
              } else if (
                isset($params['message'])
                && empty($params['message'])
              ) {
                $function = '5ebdd9003100006300c5cd80';
              } else {
                $function = '5ebdd6833100007800c5cd74';
              }
            } else if ($function === 'users') {
              $function = '5ebdd7913100006300c5cd78';
            }
        } else {
            $apiUrl = self::API_URL;
        }

        $apiCall = $apiUrl . $function . (('GET' === $method) ? $paramString : null);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiCall);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->_unqiueId.':'.$this->_uniquePassword);

        if ('POST' === $method) {
          curl_setopt($ch, CURLOPT_POST, count($params));
          curl_setopt($ch, CURLOPT_POSTFIELDS, $paramString);
        }

        $jsonData = curl_exec($ch);

        if (false === $jsonData) {
          throw new \Exception("Error: _makeRequest() - cURL error: " . curl_error($ch));
        }

        curl_close($ch);

        $this->_decodeResponse($jsonData);

        return json_decode( $jsonData );
    }

    /**
     * Decode JSON response
     *
     * @param json  $jsonData   JSON encoded string returned from the API
     *
     * @return null
     */

    private function _decodeResponse($jsonData) {
        $this->_obj = json_decode( $jsonData );

        $response = '';

        switch ($this->_obj->code) {
            case 200:
                $this->_response = 'Success';
                $this->_notice = $this->_response;
                break;
            case 400:
                $this->_response = 'Bad Request';

                foreach($this->_obj->errors->children as $errors) {
                    foreach($errors as $error) {
                        $response.= join($error, ', ').'. ';
                    }
                }

                $this->_notice = rtrim(trim($response), '.').'.';
                break;
            case 402:
                $this->_response = 'Payment Required';
                $this->_notice = $this->_response;
                break;
            case 403:
                $this->_response = 'Forbidden';

                foreach($this->_obj->errors as $error) {
                    $response.= $error.'. ';
                }

                $this->_notice = rtrim(trim($response), '.').'.';
                break;
            case 405:
                $this->_response = 'Method Not Allowed';
                $this->_notice = $this->_response;
                break;
            case 406:
                $this->_response = 'Not Acceptable';
                $this->_notice = $this->_response;
                break;
            case 409:
                $this->_response = 'Conflict';
                $this->_notice = $this->_response;
                break;
            default:
                $this->_response = 'Unhandled Response';
                $this->_notice = $this->_response;
                break;
        }
    }
}
