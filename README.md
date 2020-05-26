git init
git remote add origin git@reiig
.gitignore
git add .
git commit -m "ergreeeg"
git push -u origin master

git checkout -b branch
git checkout branch

git push -u origin HEAD:branch
git push -u origin branch

git pull --rebase origin master

git diff

git rebase -i HEAD~10




