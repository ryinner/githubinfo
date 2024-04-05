<?php

declare(strict_types=1);

namespace Ryinner\Githubinfo\Helpers;

use Exception;

class CliCommandRunner
{
    public function __invoke(string $command): string | false
    {
        $result = shell_exec($command);

        if ($result === false) {
            throw new \Exception('Failed to execute command');
        }

        return $result;
    }
}