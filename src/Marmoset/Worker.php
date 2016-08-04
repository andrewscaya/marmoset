<?php
/*
 * This file is part of the Marmoset project.
 *
 * (c) Eric Mann <eric@eamann.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EAMann\Marmoset;

class Worker extends \Worker
{
    public function __construct($population, $sum, $max)
    {
        $this->population = $population;
        $this->sum = $sum;
        $this->max = $max;
    }
}