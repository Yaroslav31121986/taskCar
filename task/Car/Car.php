<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.02.2021
 * Time: 22:39
 */

namespace Task\Car;

use Task\Park\Park;

abstract class Car
{
    public function __construct($size)
    {
        $this->size = $size;
    }

    protected $size;

    public function toPark(Park $park)
    {
        $data = $park->getPark();
        $coordinates = $this->xAndY($data);

        $result = [];

        for ($y = 0; $y < $coordinates['y']; $y++) {
            for ($x = 0; $x < $coordinates['x']; $x++) {
                if (count($result) == $this->size || count($result) == $this->size) {
                    break 2;
                }
                if (in_array('*', $data[$y][$x])) {
                    if ($x <= $coordinates['limit_x']) {
                        $result = [];
                        $copyData = $data;
                        $result[] = key($data[$y][$x]);
                        $copyData[$y][$x][key($data[$y][$x])] = '#';
                        $this->searchX($y, $x, $data, $result, $this->size, $park);
                    }
                    if ($y <= $coordinates['limit_y']) {
                        $result = [];
                        $copyData = $data;
                        $result[] = key($data[$y][$x]);
                        $copyData[$y][$x][key($data[$y][$x])] = '#';
                        $this->searchY($y, $x, $copyData, $result, $this->size, $park);
                    }
                }
            }
        }
    }

    protected function xAndY(array $data)
    {
        $result = [];

        $result['y'] = count($data);
        $result['x'] = count(array_shift($data));
        $result['limit_x'] = $result['x'] - $this->size;
        $result['limit_y'] = $result['y'] - $this->size;

        return $result;
    }

    protected function searchX($y, $x, $copyData, &$result, $size, Park $park)
    {
        if (count($result) != $size && in_array('*', $copyData[$y][++$x])) {
            $result[] = key($copyData[$y][$x]);
            $copyData[$y][$x][key($copyData[$y][$x])] = '#';
            $this->searchX($y, $x, $copyData, $result, $size, $park);
        } elseif (count($result) == $size) {
            $this->ticket = $result;
            $park->setPark($copyData);
        }
    }

    protected function searchY($y, $x, $copyData, &$result, $size, Park $park)
    {
        if (count($result) != $size && in_array('*', $copyData[++$y][$x])) {
            $result[] = key($copyData[$y][$x]);
            $copyData[$y][$x][key($copyData[$y][$x])] = '#';
            $this->searchY($y, $x, $copyData, $result, $size, $park);
        } elseif (count($result) == $size) {
            $this->ticket = $result;
            $park->setPark($copyData);
        }
    }
}