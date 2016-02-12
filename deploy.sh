while :
do 
	#git ls-files | sudo xargs -i cp {} /var/lib/tomcat7/webapps/ampfit/{}
	#sudo cp -r * /var/lib/tomcat7/webapps/ampfit/ && sudo chmod 777 -R /var/lib/tomcat7/webapps/ampfit/
	cp -r * /usr/local/Cellar/tomcat/8.0.21/libexec/webapps/ampfit/
	sleep 1
done
