<?php

namespace Claudusd\SecuredChat\Entity;

use Claudusd\SecuredChat\Exception\DecryptionException;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document */
class Message
{
    /** @MongoDB\Id */
    private $id;

    /** @MongoDB\Date */
    private $sendDate;

    /** @MongoDB\EmbedMany(targetDocument="MessageText") */
    private $messages = array();

    /** */
    private $writer;

    /**
     *
     *
     * @param
     * @param
     * @param
     */
    public function __construct($message, $writer, $receivers)
    {
        if(is_array($receivers))
        {

        } else {

        }
        $this->writer = $writer;
        $this->sendDate = new \DateTime();
    }

    /**
     * Encrypt the message.
     * @param Message to encrypt.
     * @param The Message's receiver.
     * @return Encrypted message.
     */
    private function encryptedMessage($message, for)
    {
        $messgeText = new MessageText();
    }

    /**
     * To check if we can decrypt the message.
     * @return True if we can decrypt the message else false.
     */
    private function isDescryptable(User $user)
    {
        if($user->getLastTimeKeyGenerated()->getTimestamp() < $sendDate->getTimestamp())
            return true;
        return false;
    }

    private function getMessageForUser(User $user)
    {
        foreach ($messages as $message) {
            if($message->isOwner($user))
                return $message;
        }
        throw new DecryptionException();
    }

    /**
     *
     *
     * @param User
     * @param string 
     * @return string
     * @throws DescryptionException
     * @see getMessageForUser()
     */
    public function decryptMessage(User $user, $plainPassword)
    {
        if($this->isDescryptable($user)) {
            $message =  $this->getMessageForUser($user)->getDecryptedMessage($plainPassword);
        }
        throw new DecryptionException();
    }
}