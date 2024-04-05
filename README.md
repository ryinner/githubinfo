# Info

This is a simple package for get information from git.

Informer uses local command invocation to get information about the repository. It just run shell scripts and clean messages by regexp.

---

Functions:

- `(new Informer)->getConfigUsername` - `git config user.name`, return string;
- `(new Informer)->getCurrentBranch` - `git branch` + regexp, return string;
- `(new Informer)->getLastCommitHashByOriginBranch` - `git ls-remote --heads origin` + regexp, return string;