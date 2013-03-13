#!/bin/bash

if [ $# -lt 3 ]
then
    echo "Usage: $0 source_file output_file size_in_bytes"
    exit 1
fi

SOURCE_FILE=$1
OUTPUT_FILE=$2
SIZE_LIMIT=$(($3+0))

if [ $SIZE_LIMIT -lt 1024 ]
then
    echo "$SIZE_LIMIT is too small"
    exit 2 
fi

STR=`cat $SOURCE_FILE`

echo $STR >> $OUTPUT_FILE 

while true
do
    FILE_SIZE=`stat -c "%s" $OUTPUT_FILE`
    if [ $FILE_SIZE -ge $SIZE_LIMIT ]
    then
        break;
    else
        echo $STR >> $OUTPUT_FILE
    fi
done

ls -l $OUTPUT_FILE
echo "Done"
