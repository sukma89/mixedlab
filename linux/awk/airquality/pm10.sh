#!/bin/bash

sed 's/<center>.*<\/thead>//ig' pm10.html  | sed 's/<\/table><\/center>/\n/ig' | sed 's/\(<tr>\)\(<td[^>]*>\)\([^<]\+\)/\n\3/ig' | sed 's/<\/td><td>/,/ig' | sed 's/<\/td>//ig' | sed 's/日//g' | awk -F , 'length($1) > 0 { print $1 "," ($2 * 1000) "," ($3 * 1000) "," ($4 * 1000) }' > pm10.txt
