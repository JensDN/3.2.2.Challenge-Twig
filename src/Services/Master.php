<?php


namespace App\Services;


class Master
{

    private object $master;

    /**
     * @return UpperLower|object
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Master constructor.
     * @param SpaceToDashes $spaceToDashes
     * @param UpperLower $upperLower
     */
    public function __construct(SpaceToDashes $spaceToDashes, UpperLower $upperLower)
    {
        if (isset($_POST['type'])){
            if($_POST['type'] === 'spaceToDashes'){
                 $this->master = $spaceToDashes;
            }
            else{
                 $this->master = $upperLower;
            }
        }
    }
}