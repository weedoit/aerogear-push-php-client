<?php

namespace AeroGear;

class Client {
    /**
     * Your application ID
     * @var string
     */
    private $applicationId;

    /**
     * Your application secret
     * @var string
     */
    private $masterSecret;

    /**
     * REST resource
     * @var string
     */
    private $resourceURL;

    /**
     * Constructor
     * @param string $url Your server url
     */
    public function __construct ($url) {
        $joint = ($url[strlen($url) - 1] !== '/') ? '/' : '';
        $this->resourceURL .= "{$url}{$joint}rest/sender/";
    }

    /**
     * Set application Id
     * @param string $value Application ID
     */
    public function setApplicationId ($value) {
        $this->applicationId = $value;
        return $this;
    }

    /**
     * Set application secret
     * @param string $value Application secret
     */
    public function setMasterSecret ($value) {
        $this->masterSecret = $value;
        return $this;
    }

    /**
     * Generate headers for request
     * @return array
     */
    private function getHeaders () {
        $credentials = base64_encode("{$this->applicationId}:{$this->masterSecret}");
        return [
            "Authorization: Basic {$credentials}",
            'Content-Type: application/json',
            'Accept: application/json'
        ];
    }

    /**
     * Send message
     * @param  Message $msg                 Message class instance
     * @param  array   $options             Message options
     * @param  array   $options[alias]      Target alias
     * @param  array   $options[deviceType] Device type
     * @param  array   $options[categories] Some categories
     * @param  array   $options[variants]   Some variant IDs
     * @return string
     */
    public function send (Message $msg, $options = []) {
        $con = curl_init($this->resourceURL);
        $payload = (is_array($options)) ? $options : [];
        $payload['message'] = $msg->toArray();

        curl_setopt($con, CURLOPT_HEADER, 0);
        curl_setopt($con, CURLOPT_POST, true);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($con, CURLOPT_POSTFIELDS, json_encode($payload));

        if(!$result = curl_exec($con)) {
            throw new \Exception("A connection could not be made to the server.");
        } else {
            curl_close($con);
            return $result;
        }
    }
}