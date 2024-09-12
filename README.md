# Sanitization Antivirus Plugin for Moodle

This plugin provides a connection from Moodle file uploads to sanitization system, allowing it to copy uploaded files to a directory and if these files appear in the target directory within a timout - it means that files are clean.
otherwise it assumes that there is a virus.

It is not the sanitization system - just the connection from Moodle to it.

## Installation

1. Download the latest version of the Sanitization Plugin from the Moodle plugins directory.
2. Extract the plugin files to the `lib/antivirus/sanitization/` directory.
3. Log in to your Moodle site as an administrator.
4. Navigate to **Site administration** > **Plugins** > **Antivirus plugins**.
5. Enable the Sanitization Plugin by clicking on the toggle switch.
6. Configure the plugin settings according to your requirements.
7. Save the changes and the plugin will be ready to use.

## Usage

Once the Sanitization Plugin is enabled, it will automatically scan files that you upload to the system and will let you get the files only if they appear in the target directory (meaning that no virus is detected). The plugin runs in the background and ensures that the files are safe for use within your Moodle site.

## Configuration

The Sanitization Plugin provides several configuration options to customize its behavior. These options can be accessed through the Moodle administration interface:

1. **Source Directory**: Specify the directory where the plugin will scan for files.
2. **Target Directory**: Define the directory where the sanitized files will be written.
3. **Timeout**: Define how much time to wait till asumming that there's a virus.

## Troubleshooting

If you encounter any issues or have questions regarding the Sanitization Plugin, please open issues at : https://github.com/yedidiaklein/moodle-antivirus_sanitization/issues

