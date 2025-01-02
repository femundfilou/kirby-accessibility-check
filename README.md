# Kirby Accessibility Check

This plugin adds accessibility checking capabilities to your Kirby CMS powered website. With the panel button, editors can enable an accessibility overlay to easily spot issues in the frontend of your website. By default, the Accessibility quality assurance tool [Sa11y](https://github.com/ryersondmp/sa11y) is used and added via CDN.

> [!IMPORTANT]
> This plugin is compatible with Kirby 5 and up.


## Features

- Adds accessibility check button to panel
- Only active when editor chooses to enable it (uses session)
- Automatically includes required assets when active

![Plugin in action](kirby-accessibility-check.gif)

## Installation

There are three options to install the plugin.

### Download

Download and copy this repository to `/site/plugins/kirby-accessibility-check`.

### Git submodule

```bash
git submodule add https://github.com/femundfilou/kirby-accessibility-check.git site/plugins/kirby-accessibility-check
```

### Composer

```bash
composer require femundfilou/kirby-accessibility-check
```

## Setup

This plugin registers a new panel view button you can use in your page blueprints.

```yaml
# site/blueprints/pages/default.yml

buttons:
 # new button
 - accessibility-check
 # default buttons
 - preview
 - languages
 - settings
 - status

```

### Customize

You can overwrite each provider by creating a snippet to your `site/snippets` folder. For example, you would create the file `site/snippets/kirby-accessibility-check/providers/sa11y.php` to add your own Sa11y implementation or configuration, e.g. if you don't want to use the CDN or stick to a specific version.

## License
MIT

## Credits
- [Justus Kraft](https://femundfilou.de)
- Accessibility quality assurance tool [Sa11y](https://github.com/ryersondmp/sa11y)
