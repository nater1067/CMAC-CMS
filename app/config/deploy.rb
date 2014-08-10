set :application, "CMAC"
set :domain,      "digitalocean"
set :deploy_to,   "/var/www/cmac"
# set :app_path,    "app"

set :repository,  "https://github.com/nater1067/CMAC-CMS.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

# set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server
set :user,                  "root"  # The server's user for deploys

set  :keep_releases,  3
`
set :use_composer, true
set :copy_vendors, true

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true

# Controllers to clear
set :clear_controllers,     true
set :controllers_to_clear, ['app_*.php']