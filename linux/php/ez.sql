SELECT * FROM ezcontentobject_version WHERE contentobject_id=90;
SELECT * FROM ezcontentobject_tree WHERE contentobject_id=90;
SELECT * FROM ezcontentobject_name WHERE contentobject_id=90;
SELECT * FROM ezcontentobject_link;
SELECT * FROM ezcontentobject_attribute WHERE contentobject_id=107;
SELECT * FROM ezcontentobject_attribute WHERE contentobject_id=461 AND  data_type_string='countrylist';
SELECT * FROM ezcontentobject_attribute WHERE data_type_string='ezgmaplocation' AND contentobject_id=90 AND version=6;
SELECT * FROM ezgmaplocation;

SELECT * FROM ezcontentobject WHERE id >=455 AND id <=461;

SELECT * FROM ezcountrytranslation;

