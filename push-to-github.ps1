# Upload project to GitHub (revei123/kuzurova-law)
# Create empty repo first: https://github.com/new  name: kuzurova-law

$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

$remote = "https://github.com/revei123/kuzurova-law.git"

if (-not (Test-Path ".git")) {
  git init
  git branch -M main
}

git add .
$status = git status --porcelain
if ($status) {
  git commit -m "Update: Kuzurova Law WordPress theme prototype"
} else {
  Write-Host "No changes to commit."
}

$remotes = git remote 2>$null
if ($remotes -notcontains "origin") {
  git remote add origin $remote
} else {
  git remote set-url origin $remote
}

git push -u origin main
Write-Host "Done. Repo: https://github.com/revei123/kuzurova-law"
