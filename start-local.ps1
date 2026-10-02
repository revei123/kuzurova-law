# Local WordPress — http://localhost:8081
# Uses Docker when it is installed. On this PC virtualization is off, so Docker
# cannot run; the fallback starts the already prepared PHP + MariaDB copy.

$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

$docker = Get-Command docker -ErrorAction SilentlyContinue
if ($docker) {
  Write-Host "Starting containers..."
  docker compose up -d
  Write-Host ""
  Write-Host "Site: http://localhost:8081"
  Write-Host "After WP install: Permalinks -> Post name, install ACF plugin, activate theme Kuzurova Law"
  Write-Host "Stop: docker compose down"
  exit 0
}

$native = "C:\kuzurova-local\start.ps1"
if (Test-Path $native) {
  Write-Host "Docker is not available. Starting the local PHP + MariaDB site."
  & $native
  exit $LASTEXITCODE
}

Write-Host "Docker is not installed, and C:\kuzurova-local was not found."
Write-Host "Install Docker Desktop only if virtualization is enabled in BIOS."
exit 1
