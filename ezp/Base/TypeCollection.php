<?php
/**
 * File contains Type Collection class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Base;
use ezp\Base\Interfaces\Collection,
    ezp\Base\Exception\InvalidArgumentType,
    ArrayObject;

/**
 * Type Collection class, collection only accepts new elements of a certain type
 *
 */
class TypeCollection extends ArrayObject implements Collection
{
    /**
     * @var string The class name (including namespace) to accept as input
     */
    private $type;

    /**
     * Construct object and assign internal array values
     *
     * A type strict collection that throws exception if type is wrong when appended to.
     *
     * @throws InvalidArgumentType If elements contains item of wrong type
     * @param string $type
     * @param array $elements
     */
    public function __construct( $type, array $elements = array() )
    {
        $this->type = $type;
        foreach ( $elements as $item )
        {
            if ( !$item instanceof $type )
                throw new InvalidArgumentType( 'elements', $type, $item );
        }
        parent::__construct( $elements );
    }

    /**
     * Overrides offsetSet to check type and allow if correct
     *
     * @internal
     * @throws InvalidArgumentType On wrong type
     * @param string|int $offset
     * @param mixed $value
     */
    public function offsetSet( $offset, $value )
    {
        // throw if wrong type
        if ( !$value instanceof $this->type )
            throw new InvalidArgumentType( 'value', $this->type, $value );

        // stop if value is already in array
        if ( in_array( $value, $this->getArrayCopy(), true ) )
            return;

        parent::offsetSet( $offset, $value );
    }

    /**
     * Overloads exchangeArray() to do type checks on input.
     *
     * @throws InvalidArgumentType
     * @param array $input
     * @return array
     */
    public function exchangeArray( $input )
    {
        foreach ( $input as $item )
        {
            if ( !$item instanceof $this->type )
                throw new InvalidArgumentType( 'input', $this->type, $item );
        }
        return parent::exchangeArray( $input );
    }
}

?>
