<?php

namespace Claudusd\SecuredChat\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 * @version 1.0
 * @since 1.0
 */
/** @MongoDB\EmbeddedDocument */
class MessageText
{
	/** @MongoDB\String */
	private $message;

	/** */
	private $encryptedFor;

	/**
	 * The constructor of the message text and encrypte the message an save it.
	 *
	 * @param The message plain
	 * @param The user who can decrypt the message.
	 */
	public function __construct($message, User $encryptedFor)
	{
		$this->encryptedFor = $encryptedFor;
		$publicKey = openssl_pkey_get_public($this->encryptedFor->getPublicKey());
		openssl_public_encrypt($message, $this->message, $publicKey);
	}

	public function isOwner(User $user)
	{
		return $encryptedFor->equals($user);
	}

	/**
	 * 
	 *
	 * @param
	 * @param
	 * @return The message decrypted.
	 */
	public function getDecryptedMessage($privateKey)
	{

	}
}