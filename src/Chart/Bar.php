<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 18:54
 */

namespace mrcnpdlk\Api\ImageChart\Chart;


use mrcnpdlk\Api\ImageChart\ChartAbstract;
use mrcnpdlk\Api\ImageChart\Model\Axis;
use mrcnpdlk\Api\ImageChart\Model\Type;

class Bar extends ChartAbstract
{
    protected $sCht = Type::TYPE_BVS;

    public function setAxis(Axis $oAxis)
    {
        $this->addProperty($oAxis);

        return $this;
    }
}
