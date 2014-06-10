<?php
/**
 * File containing the RichText Gateway abstract class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */

namespace eZ\Publish\Core\FieldType\RichText\RichTextStorage;

use eZ\Publish\Core\FieldType\StorageGateway;

/**
 * Abstract gateway class for RichText type.
 * Handles data that is not directly included in raw XML value from the field (i.e. URLs)
 */
abstract class Gateway extends StorageGateway
{
    /**
     * For given array of URL ids returns a hash of corresponding URLs,
     * with URL ids as keys.
     *
     * Non-existent ids are ignored.
     *
     * @param array $linkIds Array of link Ids
     *
     * @return array
     */
    abstract public function getLinkUrls( array $linkIds );

    /**
     * For given array of URLs returns a hash of corresponding ids,
     * with URLs as keys.
     *
     * Non-existent URLs are ignored.
     *
     * @param array $linksUrls
     *
     * @return array
     */
    abstract public function getLinkIds( array $linksUrls );

    /**
     * For given array of Content remote ids returns a hash of corresponding
     * Content ids, with remote ids as keys.
     *
     * Non-existent ids are ignored.
     *
     * @param array $linksRemoteIds
     *
     * @return array
     */
    abstract public function getContentIds( array $linksRemoteIds );

    /**
     * Inserts a new $url for given $fieldId and $versionNo and returns its id.
     *
     * @param string $url The URL to insert in the database
     * @param int|string $fieldId
     * @param int $versionNo
     *
     * @return mixed
     */
    abstract public function insertLink( $url, $fieldId, $versionNo );
}
