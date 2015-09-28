<?php

namespace AeroGear;

class Message {
    private $alert;
    private $sound;
    private $badge;
    private $data;

    public function __construct($msg) {
        $this->alert = $msg;
        return $this;
    }

    /**
     * Set message
     * @param string $value
     */
    public function setAlert ($value) {
        $this->alert = $value;
        return $this;
    }

    /**
     * Set notification sound
     * @param string $value Song file path
     */
    public function setSound ($value) {
        $this->sound = $value;
        return $this;
    }

    /**
     * Set badge number
     * @param integer $value
     */
    public function setBadge ($value) {
        $this->badge = $value;
        return $this;
    }


    /**
     * Set extra data
     * @param array $value
     */
    public function setData ($value) {
        $this->data = $value;
        return $this;
    }

    /**
     * Exports object as array
     * @return array
     */
    public function toArray () {
        $out = [];

        if ($this->alert) { $out['alert'] = $this->alert;}
        if ($this->sound) { $out['sound'] = $this->sound;}
        if ($this->badge) { $out['badge'] = $this->badge;}
        if ($this->data) { $out['data'] = $this->data;}

        return $out;
    }
}


