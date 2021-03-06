<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command;

/**
 * @link http://redis.io/commands/zadd
 * @author Daniele Alessandri <suppakilla@gmail.com>
 */
class ZSetAdd extends PrefixableCommand
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'ZADD';
    }

    /**
     * {@inheritdoc}
     */
    protected function filterArguments(Array $arguments)
    {
        if (count($arguments) === 2 && is_array($arguments[1])) {
            $flattened = array($arguments[0]);

            foreach($arguments[1] as $member => $score) {
                $flattened[] = $score;
                $flattened[] = $member;
            }

            return $flattened;
        }

        return $arguments;
    }
}
