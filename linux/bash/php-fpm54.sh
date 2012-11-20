#!/bin/bash

COLS=$(tput cols)
STOPPING="Stopping php-fpm 5.4"
STARTING="Starting php-fpm 5.4"
#printf  "\E[34;47mThis prints in blue."
#tput sgr0
#exit
#echo $COLS
STOPBLANK=$(($COLS - ${#STOPPING} - 4))
STARTBLANK=$(($COLS - ${#STARTING} - 4))

if [ $# -lt 1 ]
then
   echo "Usage: php-fpm54.sh start|restart|stop"
   exit 1
fi

if [ "$1" == "restart" -o "$1" == "stop" ]
then
    echo -n "$STOPPING"
    #echo -n "Stoping php-fpm 5.4"
    kill `cat /usr/local/php54/var/run/php-fpm.pid `
    #echo -e "\t[OK]"
    printf "%${STOPBLANK}s" " "
    echo -e "\E[00;31m[OK]\E[00m"
fi

if [ "$1" == "restart" -o "$1" == "start" ]
then
    echo -n "$STARTING"
    /usr/local/php54/sbin/php-fpm
    printf "%${STARTBLANK}s" " "
    echo -e "\E[00;31m[OK]\E[00m"
fi
exit
