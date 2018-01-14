<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 14:13
 */

namespace mrcnpdlk\Api\ImageChart;


use mrcnpdlk\Api\ClientAbstract;

/**
 * Class Client
 *
 * @package mrcnpdlk\Api\ImageChart
 */
class Client extends ClientAbstract
{
    /**
     * @var string
     */
    private $sApiUrl = 'https://image-charts.com/chart';


    /**
     * Client constructor.
     */
    public function __construct(string $sApiUrl = null)
    {
        parent::__construct();
        if ($sApiUrl) {
            $this->sApiUrl = $sApiUrl;
        }
    }

}
