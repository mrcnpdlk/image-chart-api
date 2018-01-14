<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 22:38
 */

namespace mrcnpdlk\Api\ImageChart\Model;


class Axis implements PropertyInterface
{

    public function getPostArray(): array
    {
        return [
            'chxt' => 'x,y',
            'chxr' => '1,0,100|0,-2,2',
        ];
    }
}
