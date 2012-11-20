#!/bin/bash
# validate the format xmllint --noout XMLFILE
# validate against DTD xmllint --noout --valid XMLFILE
# validate against  XML Schema xmllint --noout --schema SCHEMAFILE XMLFILE;

if [ $# -lt 2 ]
then
	echo "Argument missing: SCHEMA.xsd DATA.xml"
else
    if [ -f $1 ] && [ -f $2 ]
	then
		xmllint --noout --schema $1 $2 
	else
		echo "Invalid files."
	fi
fi
