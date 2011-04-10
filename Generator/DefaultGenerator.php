<?php
/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\MediaBundle\Generator;

use Sonata\MediaBundle\Model\MediaInterface;

class DefaultGenerator implements GeneratorInterface
{

    protected $firstLevel;

    protected $secondLevel;

    public function __construct($firstLevel = 100000, $secondLevel = 1000)
    {
        $this->firstLevel = $firstLevel;
        $this->secondLevel = $secondLevel;
    }

    /**
     * @abstract
     * @param \Sonata\MediaBundle\Model\MediaInterface $media
     * @return string
     */
    public function generatePath(MediaInterface $media)
    {
        $rep_first_level = (int) ($media->getId() / $this->firstLevel);
        $rep_second_level = (int) (($media->getId() - ($rep_first_level * $this->firstLevel)) / $this->secondLevel);

        return sprintf('%04s/%02s', $rep_first_level + 1, $rep_second_level + 1);
    }
}