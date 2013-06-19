<?php

namespace Claudusd\SecuredChat\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 * @version 1.0
 * @since 1.0
 */
/** @MongoDB\Document */
class Conversation
{
    /** @MongoDB\Id */
    private $id;

    /**
    * @MongoDB\ReferenceMany(
    *     strategy="set",
    *     targetDocument="Claudusd\SecuredChat\Entity\User",
    *     cascade="all",
    * )
    */
    private $participants;

    /**
    * @MongoDB\ReferenceMany(
    *     strategy="set",
    *     targetDocument="Claudusd\SecuredChat\Entity\Message",
    *     cascade="all",
    *     sort={"sendDate": "asc"}
    * )
    */
    private $messages;
}