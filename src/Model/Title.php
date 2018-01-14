<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 17:20
 */

namespace mrcnpdlk\Api\ImageChart\Model;


use Spatie\Color\Hex;
use Spatie\Color\Rgba;

class Title implements PropertyInterface
{
    /**
     * @var string
     */
    private $sTitle;
    /**
     * @var Rgba
     */
    private $oRgba;
    /**
     * @var integer
     */
    private $iFontSize;

    public function __construct(string $title, Rgba $oRgba = null, int $fontSize = null)
    {
        $this->sTitle    = $title;
        $this->oRgba     = $oRgba ?? Hex::fromString('#000000')->toRgba();
        $this->iFontSize = $fontSize ?? 10;
    }

    /**
     * @return array
     */
    public function getPostArray(): array
    {
        return [
            'chtt' => $this->sTitle,
            'chts' => sprintf('%s,%s', ltrim($this->oRgba->toHex(), '#'), $this->iFontSize),
        ];
    }

}
