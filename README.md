#Requirements

- Install all requirements for laravel 5.3 : https://laravel.com/docs/5.3
- Install nodejs, may follow : https://github.com/tj/n
- mysql version >= 5.5
- Apache2 : https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu

#Git work-flow

- Before coding, "git fetch" and "git merge origin/master", then code and add and commit.
- If forgot to fetch and merge, do not commit, "git stash" then "git fetch" and "git merge origin/master". Then "git stash apply" and "git stash clear".
- If you already commit without fetch and merge, "git reset HEAD~", then stash, fetch, merge, ... like step 2.
- Copy this text to .gitconfig at home (~) : 

```
[alias]
  a = add
  amend = commit --amend -CHEAD
  c = commit -m
  co = checkout
  d = diff
  f = fetch
  l = log --oneline
  p = push
  s = status -sb -unormal
  v = log --graph --all --format=\"%C(auto)%h%C(reset) %C(auto)%d%C(reset) %s %C(yellow)- %cn, %cd%C(reset)\" --date=relative
  visual = log --graph --all --format=format:'%C(yellow)%h%C(reset)%C(auto)%d%C(reset) %s %C(yellow)- %an, %ad%C(reset)' --decorate=short --date=relative
```

#Server side

- Follow https://laravel.com/docs/5.3
- Source sql file in /sql

#Client side

- Follow https://github.com/yeoman/generator-angular
