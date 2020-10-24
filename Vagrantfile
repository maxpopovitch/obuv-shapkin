require 'fileutils'

#required_plugins = %w( vagrant-hostmaster vagrant-vbguest )
#required_plugins.each do |plugin|
#    exec "vagrant plugin install #{plugin}" unless Vagrant.has_plugin? plugin
#end

vagrant_dir = File.expand_path(File.dirname(__FILE__))

domains = {
  frontend: 'obuv.local',
}

config = {
  local: './vagrant/config/vagrant-local.yml',
  example: './vagrant/config/vagrant-local.example.yml'
}

# copy config from example if local config not exists
FileUtils.cp config[:example], config[:local] unless File.exist?(config[:local])
# read config
options = YAML.load_file config[:local]

# check github token
if options['github_token'].nil? || options['github_token'].to_s.length != 40
  puts "You must place REAL GitHub token into configuration:\n/project/vagrant/config/vagrant-local.yml"
  exit
end

# vagrant configurate
Vagrant.configure(2) do |config|
  # select the box
  config.vm.box = 'bento/ubuntu-16.04'
  config.vm.boot_timeout = 3600

  # should we ask about box updates?
  config.vm.box_check_update = options['box_check_update']

  config.vm.provider 'virtualbox' do |vb|
    # machine cpus count
    vb.cpus = options['cpus']
    # machine memory size
    vb.memory = options['memory']
    # machine name (for VirtualBox UI)
    vb.name = options['machine_name']
  end

  # machine name (for vagrant console)
  config.vm.define options['machine_name']

  # machine name (for guest machine console)
  config.vm.hostname = options['machine_name']

  # network settings
  config.vm.network 'private_network', ip: options['ip']

  # sync: folder 'project' (host machine) -> folder '/app' (guest machine)
  config.vm.synced_folder './', '/opt', owner: 'vagrant', group: 'vagrant'

  # disable folder '/vagrant' (guest machine)
  config.vm.synced_folder '.', '/vagrant', disabled: true

  #if File.exists?(File.join(vagrant_dir,'./vagrant/database/data/postgresql_upgrade_info')) then
  #  if vagrant_version >= "1.3.0"
  #    config.vm.synced_folder "./vagrant/database/data/", "/var/lib/postgresql", :mount_options => [ "dmode=777", "fmode=777" ]
  #  else
  #    config.vm.synced_folder "./vagrant/database/data/", "/var/lib/postgresql", :extra => 'dmode=777,fmode=777'
  #  end

    # The Parallels Provider does not understand "dmode"/"fmode" in the "mount_options" as
    # those are specific to Virtualbox. The folder is therefore overridden with one that
    # uses corresponding Parallels mount options.
  #  config.vm.provider :parallels do |v, override|
  #    override.vm.synced_folder "./vagrant/database/data/", "/var/lib/postgresql", :mount_options => []
  #  end
  #end

  # hosts settings (host machine)
  config.vm.provision :hostmanager
  config.hostmanager.enabled            = true
  config.hostmanager.manage_host        = true
  config.hostmanager.ignore_private_ip  = false
  config.hostmanager.include_offline    = true
  config.hostmanager.aliases            = domains.values

  # provisioners
  config.vm.provision 'shell', path: './vagrant/provision/once-as-root.sh', args: [options['timezone']]
  config.vm.provision 'shell', path: './vagrant/provision/once-as-vagrant.sh', args: [options['github_token']], privileged: false
  config.vm.provision 'shell', path: './vagrant/provision/always-as-root.sh', run: 'always'
  config.vm.provision 'shell', path: './vagrant/provision/always-as-vagrant.sh', run: 'always'

  # post-install message (vagrant console)
  config.vm.post_up_message = "Frontend URL: http://#{domains[:frontend]}\n"
end
