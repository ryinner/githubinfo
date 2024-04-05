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

    /**
     * equivalent git branch with regexp search active branch
     *
     * @return string
     */
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

    /**
     * equivalent git ls-remote --heads origin with regexp search commit hash
     *
     * @return string
     */
    public function getLastCommitByOriginBranch(string $branchName): string
    {
        $allLastCommitsByBranches = (new CliCommandRunner())('git ls-remote --heads origin');

        preg_match("/[^\s]{1,}\s{1,}(refs\/heads\/{$branchName})/mi", $allLastCommitsByBranches, $lastDevelopCommit);

        [$commitText] = $lastDevelopCommit;

        $commitHash = preg_replace("/\s{1,}(refs\/heads\/{$branchName})/mi", '', $commitText);

        return trim ($commitHash);
    }
}