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
    public function getConfigUsername(): string
    {
        $user = (new CliCommandRunner())('git config user.name');

        return trim($user);
    }

    public function getCurrentBranch(): string
    {
        $branches = (new CliCommandRunner())('git branch');
        
        preg_match('/\* [\w]{0,}/mi', $branches, $matches);

        if (count($matches) === 0) {
            throw new \Exception('Current branch does not exist');
        }

        $currentBranch = trim(str_replace('*', '', $matches[0]));

        return $currentBranch;
    }
}