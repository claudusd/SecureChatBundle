<?php

namespace Claudusd\SecuredChat\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @author Claude Dioudonnat <claude.dioudonnat@gmail.com>
 * @version 1.0
 * @since 1.0
 */
/** @MongoDB\Document */
class User
{
	/** @MongoDB\Id */
	private $id;

	/** @MongoDB\String */
	private $email

	/** @MongoDB\String */
	private $password;

	/** @MongoDB\String */
	private $encryptedPrivateKey;

	/** @MongoDB\String */
	private $publicKey;

	/** @MongoDB\Date */
	private $lastTimeKeysGenerated;

	/**
	 *
	 * @return
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 *
	 * @return 
	 */
	public function getPublicKey()
	{
		return $this->publicKey;
	}

	/**
	 * 
	 * @param
	 * @return
	 */
	public function getDescryptedPrivateKey($plainPassword)
	{
		$this->encryptedPrivateKey;
	}

	/**
	 * Change the password has for result to generate a new private key and a new public key.
	 * @param The new passwaord
	 */
	public function setPassword($newPassword)
	{
		$this->generateNewKey($newPassword);
		$this->password = sha1($password);
	}

	/**
	 * 
	 * @param
	 */
	private function generateNewKey($password)
	{
		$config = array(
    		"digest_alg" => "sha512",
    		"private_key_bits" => 4096,
    		"private_key_type" => OPENSSL_KEYTYPE_RSA,
		);
		$res = openssl_pkey_new($config);
		openssl_pkey_export($res, $privKey);
		$this->encryptedPrivateKey = openssl_encrypt($privKey, 'aes256', $password);
		$pubKey = openssl_pkey_get_details($res);
		$this->publicKey = $pubKey["key"];
		$this->lastTimeKeysGenerated = new \DateTime();
	}

	/**
	 *
	 * @return
	 */
	public function getLastTimeKeyGenerated()
	{
		return $this->lastTimeKeysGenerated;
	}

	/**
	 * 
	 * @param
	 * @return
	 */
	public function equals($anotherUser)
	{
		if($anotherUser instanceof User)
			return $this->id == $anotherUser->getId();
		return false;
	}
}