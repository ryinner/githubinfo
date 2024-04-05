<?php

declare(strict_types=1);

namespace Ryinner\Githubinfo;

use Ryinner\Githubinfo\Helpers\CliCommandRunner;

class Informer
{
    /**
     * equivalent git config user.name
     *
     * @return string
     */
    public function getConfigUser(): string
    {
        $user = (new CliCommandRunner())('git config user.name');

        return trim($user);
    }
}