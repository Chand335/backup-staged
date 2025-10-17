# backup-staged

A Laravel 12-compatible package that provides an Artisan command to back up Git staged files by copying their content (with full folder structure) into a configurable directory, using a customizable timestamp format.

## Installation

```bash
composer require backup-staged/laravel-backup-staged
```

After installing, publish the configuration file to customise the backup root directory and timestamp format:

```bash
php artisan vendor:publish --provider="BackupStaged\\BackupStagedServiceProvider" --tag=config
```

This creates a `config/backup-staged.php` file with the following options:

- `root` &mdash; Directory where backups are stored (defaults to `storage/app/backup-staged`).
- `timestamp_format` &mdash; PHP `date()` compatible format string used to name backup folders (defaults to `Ymd-His`).

## Usage

Back up the currently staged files:

```bash
php artisan git:backup-staged
```

The command will:

1. Retrieve staged files using the Git CLI.
2. Copy their current content from the working directory.
3. Preserve the original folder structure within a timestamped subdirectory.
4. Store the backup under the configured root directory (defaults to `storage/app/backup-staged`).

### Automating via Git pre-commit hook

To automatically back up staged files on each commit, install the optional Git hook:

```bash
php artisan git:backup-staged --install-hook
```

This writes a `.git/hooks/pre-commit` script that executes the command before every commit. If a hook already exists, the command will warn so you can integrate the backup step manually.

## Testing locally

While the package does not ship with automated tests, you can verify the command manually by staging a few files and running `php artisan git:backup-staged`. Confirm that the files are copied into `storage/app/backup-staged/<timestamp>` (or your configured directory).
