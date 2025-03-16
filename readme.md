I use this to avoid tracking unrelevant files (.gitignore is managed by ddev, so I'm ussing .git\info\exclude) :

```txt title=".git\info\exclude"
# git ls-files --others --exclude-from=.git/info/exclude
# Lines that start with '#' are comments.
# For a project mostly in C, the following would be a good set of
# exclude patterns (uncomment them if you want to use them):
# *.[oa]
# *~
# Wordpress - ignore core, configuration, examples, uploads and logs.
# https://github.com/github/gitignore/blob/main/WordPress.gitignore

# Core
#
# Note: if you want to stage/commit WP core files
# you can delete this whole section/until Configuration.

/wp-admin/
/wp-content/index.php
/wp-content/languages
/wp-content/plugins/index.php
/wp-content/themes/index.php
/wp-includes/
/index.php
/license.txt
/readme.html
/wp-*.php
/xmlrpc.php

# Configuration
wp-config.php

# Example themes
/wp-content/themes/twenty*/

# Example plugin
/wp-content/plugins/hello.php

# Uploads
/wp-content/uploads/

# Log files
*.log

# htaccess
/.htaccess

# All plugins
#
# Note: If you wish to whitelist plugins,
# uncomment the next line
/wp-content/plugins

# All themes
#
# Note: If you wish to whitelist themes,
# uncomment the next line
#/wp-content/themes
```