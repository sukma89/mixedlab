#!/bin/bash
PASSWD=132456
PASSWD2=654321
for f in *.7z
do
	echo "$f"
	7za x -y -p"$PASSWD" $f
	if [ $? -gt 0 ]
	then
		echo "Retry $f"
		7za x -y -p"$PASSWD2" $f
	fi	
done
