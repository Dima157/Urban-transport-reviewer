<?php

$receiver = new \App\RabbitService\MailReceiver();
$receiver->listen();
