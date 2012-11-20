<?php

class User implements JsonSerializable {
	private $id;
	private $name;
	private $email;

	/**
	 * Timestamp
	 * @var registerTime
	 */
	private $registerTime;

	public function __construct($id, $name, $email, $regtime) {
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->registerTime = $regtime;
	}

	public function jsonSerialize() {
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email,
			'regtime' => date('Y-m-d', $this->registerTime),		
		);
	}

}

$user = new User(1, '李四', 'james@fwso.cn', 1320125658);
$json = json_encode($user, JSON_UNESCAPED_UNICODE);
echo  $json, "\n";

