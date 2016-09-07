#Requirements

- Install all requirements for laravel 5.3 : https://laravel.com/docs/5.3
- Install nodejs, may follow : https://github.com/tj/n
- mysql version >= 5.5
- Apache2 : https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu

#Git work-flow

- Before coding, "git fetch" and "git merge origin/master", then code and add and commit.
- If forgot to fetch and merge, do not commit, "git stash" then "git fetch" and "git merge origin/master". Then "git stash apply" and "git stash clear".
- If you already commit without fetch and merge, "git reset HEAD~", then stash, fetch, merge, ... like step 2.

#Server side

- Follow https://laravel.com/docs/5.3

#Client side

- Follow https://github.com/yeoman/generator-angular
