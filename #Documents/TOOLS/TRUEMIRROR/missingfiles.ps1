$source = "C:\xampp\htdocs\pmway.hopto.org"
$dest = "E:\pmway"

$sourceFiles = Get-ChildItem $source -Recurse -File -Force -ErrorAction SilentlyContinue | ForEach-Object { $_.FullName.Substring($source.Length) }
$destFiles = Get-ChildItem $dest -Recurse -File -Force -ErrorAction SilentlyContinue | ForEach-Object { $_.FullName.Substring($dest.Length) }

$missing = $sourceFiles | Where-Object { $_ -notin $destFiles }
Write-Host "Missing in destination:" -ForegroundColor Yellow
$missing