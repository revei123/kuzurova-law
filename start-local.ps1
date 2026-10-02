# Local WordPress via Docker — http://localhost:8081

$ErrorActionPreference = "Stop"
Set-Location $PSScriptRoot

docker --version | Out-Null
if ($LASTEXITCODE -ne 0) {
  Write-Host "Docker not found. Install Docker Desktop: https://www.docker.com/products/docker-desktop/"
  exit 1
}

Write-Host "Starting containers (first run may take a few minutes)..."
docker compose up -d

Write-Host ""
Write-Host "Site: http://localhost:8081"
Write-Host "After WP install: Permalinks -> Post name, install ACF plugin, activate theme Kuzurova Law"
Write-Host "Stop: docker compose down"
