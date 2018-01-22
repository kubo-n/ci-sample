Vagrant.configure("2") do |config|
    config.vm.box = "bento/centos-7.2"
    config.ssh.insert_key = false
    config.vm.synced_folder "./app", "/var/www/html", owner: "vagrant", group: "vagrant"
    config.vm.network "private_network", ip: "192.168.33.10"
end