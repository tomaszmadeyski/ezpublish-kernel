<?php

/**
 * File containing the eZ\Publish\Core\Base\Exceptions\ContentTypeValidationException class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 *
 * @version //autogentag//
 */
namespace eZ\Publish\Core\Base\Exceptions;

use eZ\Publish\API\Repository\Exceptions\ContentTypeValidationException as APIContentTypeValidationException;

/**
 * This Exception is thrown on create or update content type when content type is not valid.
 */
class ContentTypeValidationException extends APIContentTypeValidationException implements TranslatableExceptionInterface
{
    use TranslatableException;

    /**
     * @param string $messageTemplate The message template, with placeholders for parameters.
     *                                E.g. "Content with ID %contentId% could not be found".
     * @param array $parameters Hash map with param placeholder as key and its corresponding value.
     *                          E.g. array('%contentId%' => 123).
     */
    public function __construct($messageTemplate, array $parameters = [])
    {
        $this->setMessageTemplate($messageTemplate);
        $this->setParameters($parameters);

        parent::__construct($this->getBaseTranslation());
    }
}
