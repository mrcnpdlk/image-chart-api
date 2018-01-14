<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 20:16
 */

namespace mrcnpdlk\Api\ImageChart\Model;


class Serie
{
    /**
     * @var float|null
     */
    private $minValue;
    /**
     * @var float|null
     */
    private $maxValue;
    /**
     * @var array
     */
    private $dataSerie;

    /**
     * Serie constructor.
     *
     * @param array      $tSerie
     * @param float|null $minValue
     * @param float|null $maxValue
     */
    public function __construct(array $tSerie, float $minValue = null, float $maxValue = null)
    {
        if (null !== $minValue && null !== $maxValue) {
            $this->minValue = $minValue;
            $this->maxValue = $maxValue;
        }
        $this->dataSerie = $tSerie;

    }

    /**
     * @param int|null $maxVal
     *
     * @return string
     */
    private function extendedEncode(int $maxVal = null): string
    {
        $answer     = '';
        $codes      = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-.';
        $codeLength = strlen($codes);
        $minValue   = 0;
        $maxValue   = $codeLength ** 2 - 1;

        foreach ($this->dataSerie as $point) {
            $numericVal = (int)$point;
            $scaledVal  = $maxVal ? ($codeLength ** 2 * $numericVal / $maxVal) : $numericVal;
            if ($scaledVal > $maxValue) {
                $answer .= '..';
            } elseif ($scaledVal < $minValue) {
                $answer .= '__';
            } else {
                $quotient  = (int)($scaledVal / $codeLength);
                $remainder = $scaledVal - $codeLength * $quotient;
                $answer    .= $codes[$quotient] . $codes[$remainder];
            }
        }

        return $answer;
    }

    /**
     * @return null|string
     */
    public function getRangeFormatted()
    {
        if (null !== $this->minValue && null !== $this->maxValue) {
            return sprintf('%s,%s', $this->minValue, $this->maxValue);
        }

        return null;
    }

    public function getSerieFormatted(bool $extendedMode = true)
    {
        return $extendedMode ? $this->extendedEncode() : $this->textEncode();
    }

    /**
     * @return string
     */
    private function textEncode()
    {
        $fixedValues = [];
        foreach ($this->dataSerie as $point) {
            $fixedValues[] = $point ?? '_';
        }

        return implode(',', $fixedValues);
    }
}
