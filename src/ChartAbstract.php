<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 14:59
 */

namespace mrcnpdlk\Api\ImageChart;


use mrcnpdlk\Api\ImageChart\Model\Data;
use mrcnpdlk\Api\ImageChart\Model\PropertyInterface;
use mrcnpdlk\Api\ImageChart\Model\Size;
use mrcnpdlk\Api\ImageChart\Model\Title;

/**
 * Class ChartAbstract
 *
 * @package mrcnpdlk\Api\ImageChart
 */
abstract class ChartAbstract
{
    /**
     * @var \mrcnpdlk\Api\ImageChart\Client
     */
    protected $oClient;
    /**
     * @var string
     */
    protected $sCht;
    /**
     * @var \mrcnpdlk\Api\ImageChart\Model\PropertyInterface[]
     */
    private $tProperties;
    /**
     * @var string
     */
    private $sUrl = 'https://image-charts.com/chart';

    /**
     * Chart constructor.
     *
     * @param \mrcnpdlk\Api\ImageChart\Client|null $oClient
     */
    public function __construct(Client $oClient = null)
    {
        $this->oClient = $oClient ?? new Client();
    }

    /**
     * @param \mrcnpdlk\Api\ImageChart\Model\PropertyInterface $oProperty
     *
     * @return $this
     */
    protected function addProperty(PropertyInterface $oProperty)
    {
        $this->tProperties[] = $oProperty;

        return $this;
    }

    /**
     * @param bool $asStream
     *
     * @return string
     */
    public function asGif(bool $asStream = false)
    {
        $sUrl = $this->sUrl . '?' . $this->getProperties(false, true);

        if ($asStream) {
            header('Content-Type: image/gif');
            echo file_get_contents($sUrl);

            return '';
        }

        return $sUrl;
    }

    /**
     * @param bool $asStream
     *
     * @return string
     */
    public function asPng(bool $asStream = false)
    {
        $sUrl = $this->sUrl . '?' . $this->getProperties(false, false);

        if ($asStream) {
            header('Content-Type: image/png');
            echo file_get_contents($sUrl);

            return '';
        }

        return $sUrl;
    }

    /**
     * @param bool $asArray
     * @param bool $asGif
     *
     * @return array|string
     */
    public function getProperties(bool $asArray = true, bool $asGif = false)
    {
        $tArrays = [];
        foreach ($this->tProperties as $property) {
            $tArrays[] = $property->getPostArray();
        }

        $tProps = array_merge(
            ['cht' => $this->sCht],
            array_merge(...$tArrays),
            ['chof' => $asGif ? '.gif' : '.png']);

        if ($asArray) {
            return $tProps;
        }

        $tQuery = [];
        foreach ($tProps as $key => $prop) {
            $tQuery[] = sprintf('%s=%s', $key, $prop);
        }

        return implode($tQuery, '&');

    }

    /**
     * @param \mrcnpdlk\Api\ImageChart\Model\Data $oData
     *
     * @return $this
     */
    public function setData(Data $oData)
    {
        $this->tProperties[] = $oData;

        return $this;
    }

    /**
     * @param \mrcnpdlk\Api\ImageChart\Model\Size $oSize
     *
     * @return $this
     */
    public function setSize(Size $oSize)
    {
        $this->tProperties[] = $oSize;

        return $this;
    }

    /**
     * @param \mrcnpdlk\Api\ImageChart\Model\Title $oTitle
     *
     * @return $this
     */
    public function setTitle(Title $oTitle)
    {
        $this->tProperties[] = $oTitle;

        return $this;
    }


}
