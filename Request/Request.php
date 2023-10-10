<?php
class Request
{
    protected $input;

    public function __construct()
    {
        $this->input = $_REQUEST;
    }

    public function get($key, $default = null)
    {
        return $this->input[$key] ?? $default;
    }

    public function all()
    {
        return $this->input;
    }

    public function has($key)
    {
        return isset($this->input[$key]);
    }

    public function only($keys)
    {
        $values = [];
        foreach ((array)$keys as $key) {
            if (isset($this->input[$key])) {
                $values[$key] = $this->input[$key];
            }
        }
        return $values;
    }

    public function except($keys)
    {
        $values = $this->input;
        foreach ((array)$keys as $key) {
            unset($values[$key]);
        }
        return $values;
    }
}
