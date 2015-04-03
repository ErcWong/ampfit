while :
do 
	git ls-files -m | sudo xargs -i cp {} /var/lib/tomcat7/webapps/ampfit/
	sleep 1
done
