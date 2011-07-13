<?php
/**
 * File contains Collection interface
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Base\Interfaces;
use Countable,
    ArrayAccess,
    Serializable;

/**
 * Collection interface
 *
 * Note: Does not extend IteratorAggregate / Iterator to let implementers extend ArrayObject or splFixedArray
 *
 */
interface Collection extends Countable, ArrayAccess, Serializable
{
}
