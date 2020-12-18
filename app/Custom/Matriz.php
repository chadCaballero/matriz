<?php namespace App\Custom;

class Matriz
{
    private $data = [];

    public function __construct($data)
        // accepts an array with matrix data and stores it
    {
        $this->data = $data;
    }

    public function isValid()
    {
        if (!is_array($this->data)) return FALSE;
        foreach ($this->data as $row)
        {
            if (!is_array($row)) return FALSE;
        }
        return TRUE;
    }

    public function rotateClockwise() {

        if ($this->isValid()) {
            // check that the matrix contains data
            if (isset($this->data[0]) && is_array($this->data[0]))
            {
                // perform the actual rotation
                $rotated = [];
                foreach (array_keys($this->data[0]) as $columnKey)
                {
                    $rotated[] = array_reverse(array_reverse(array_column($this->data,$columnKey)));
                }
                $this->data = array_reverse($rotated);

            }
            // return this class so this method can be chained
        }
        return $this;
    }

    public function getData()
        // returns the stored matrix
    {
        return $this->isValid() ? $this->data : FALSE;
    }
}
