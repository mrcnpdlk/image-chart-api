<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 18:54
 */

namespace mrcnpdlk\Api\ImageChart\Chart;


use mrcnpdlk\Api\ImageChart\ChartAbstract;
use mrcnpdlk\Api\ImageChart\Model\Type;

class Line extends ChartAbstract
{
    public function getQuery()
    {
        $tParams = [
            [
                'cht' => Type::TYPE_LS,
            ],
            $this->oTitle ? $this->oTitle->getPostArray() : [],
            $this->oSize ? $this->oSize->getPostArray() : [],
            $this->oData ? $this->oData->getPostArray() : [],
            [
                'chxt' => 'x,y',
                'chdl'  => urlencode('20°|20°|30°|40°|50°'),
                'chl'  => urlencode('A|B||D|E'),
            ],
            [
                'chof' => '.gif',
            ],
        ];

        $tParams = array_merge(...$tParams);
        $tQuery  = [];
        foreach ($tParams as $key => $param) {
            $tQuery[] = sprintf('%s=%s', $key, $param);
        }

        return 'https://image-charts.com/chart?' . implode($tQuery, '&');
    }
}
