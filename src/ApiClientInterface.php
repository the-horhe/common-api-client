<?php declare(strict_types=1);

namespace TheHorhe\ApiClient;

interface ApiClientInterface
{
    public function executeMethod(MethodInterface $method);
}