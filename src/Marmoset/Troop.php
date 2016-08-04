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

class Troop extends \Pool
{
    public $children = [];

    public function process()
    {
        // Run this loop as long as we have jobs in the pool
        while ($this->collect(function (Job $job) {
                // If a job was marked as done collect its results
                if ($job->isGarbage()) {
                    $this->children[] = $job->child1;
                    $this->children[] = $job->child2;
                }

                return $job->isGarbage();
            }))continue;

        // All jobs are done, so we can shutdown the pool
        $this->shutdown();

        return $this->children;
    }
}