Vagrant.configure("2") do |config|

    config.vm.box = "CentOS67"
    config.vm.box_url = "https://github.com/CommanderK5/packer-centos-template/releases/download/0.6.7/vagrant-centos-6.7.box"
  
    config.vm.network :private_network, ip: "192.168.33.10"
    config.vm.network :forwarded_port, host: 10080, guest: 80
  
    config.vm.synced_folder "./app", "/app", :nfs => true
    config.vm.synced_folder "./httpd", "/vagrant/httpd", :nfs => true
  
    config.vm.provider "virtualbox" do |vb|
      vb.memory = "1024"
    end
  
    config.vm.provision :shell, :path => "scripts/bootstrap.sh",:privileged   => true
  
  end
  