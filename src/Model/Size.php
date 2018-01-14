<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 16:54
 */

namespace mrcnpdlk\Api\ImageChart\Model;

/**
 * Class Size
 *
 * @package mrcnpdlk\Api\ImageChart\Model
 */
class Size implements PropertyInterface
{
    /**
     * @var integer
     */
    public $width;
    /**
     * @var integer
     */
    public $height;

    /**
     * Size constructor.
     *
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $width  = $width > 999 ? 999 : $width;
        $height = $height > 999 ? 999 : $height;

        $this->width  = $width;
        $this->height = $height;
    }

    /**
     * @return array
     */
    public function getPostArray(): array
    {
        return [
            'chs' => sprintf('%sx%s', $this->width, $this->height),
        ];
    }

}
