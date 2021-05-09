deploy-staging:
	@ansible-playbook playbook.yml -t deploy --limit=staging --key-file=${SSH_KEY} -e "app_env=staging" --ask-vault-pass

install-staging:
	@SSH_KEY=/home/vayn/code_practice/vagrant_deployer/.vagrant/machines/default/virtualbox/private_key
	@ansible-playbook playbook.yml -t install --limit=staging --key-file=${SSH_KEY} -e "app_env=staging"
	#@ansible-playbook playbook.yml -t install --limit=staging --key-file=${SSH_KEY} --ask-vault-pass  -e "app_env=staging"

copy-key-to-staging:
	@cat ~/.ssh/id_rsa.pub | ssh vagrant@secret.test -i /home/vayn/code_practice/vagrant_deployer/.vagrant/machines/default/virtualbox/private_key "cat - >> ~/.ssh/authorized_keys"

deploy-prod:
	@ansible-playbook playbook.yml -t deploy --limit=prod --key-file=${SSH_KEY} --ask-vault-pass

install-prod:
	@ansible-playbook playbook.yml -t install --limit=prod --key-file=${SSH_KEY}  --ask-vault-pass

