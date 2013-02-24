#!/bin/bash

COUNT=0

while [ $COUNT -lt 100000 ]
do
    COUNT=`expr $COUNT + 1`
    echo "Hello, world! - $COUNT" >> simulate_timeout.txt
done
echo "Done"
