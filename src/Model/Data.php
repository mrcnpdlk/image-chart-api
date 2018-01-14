<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 18:39
 */

namespace mrcnpdlk\Api\ImageChart\Model;


class Data implements PropertyInterface
{

    /**
     * @var \mrcnpdlk\Api\ImageChart\Model\Serie[]
     */
    public $tSeries = [];
    /**
     * @var boolean
     */
    private $extendedMode;


    public function __construct(bool $extendedMode = false)
    {
        $this->extendedMode = $extendedMode;
    }

    public function addSerie(array $tSerie, int $minValue = null, int $maxValue = null)
    {
        $this->tSeries[] = new Serie($tSerie, $minValue, $maxValue);
    }

    /**
     * @return array
     */
    public function getPostArray(): array
    {
        $parserSeries = [];
        foreach ($this->tSeries as $serie) {
            $parserSeries[] = $serie->getSerieFormatted($this->extendedMode);
        }

        if ($this->extendedMode) {
            return [
                'chd' => sprintf('e:%s', implode(',', $parserSeries)),
                //'chds' => 'a',
            ];
        }

        return [
            'chd'  => sprintf('t:%s', implode('|', $parserSeries)),
            'chds' => 'a',
        ];
    }
}
