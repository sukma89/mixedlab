#!/bin/bash

sed -n 's/^.*<option\s\+value="\([a-z]\+\)"\s*>\([^<]\+\)<\/option>.*/\1,\2/gp' place.html > place.txt

echo 'Done'
