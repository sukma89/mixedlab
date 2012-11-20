use ezdemo;

-- 
-- NOTE: in fact, ez build-in search engine does not take care of 
-- language of current siteaccess.
-- e.g.
-- 'Java2' is contained in English verion of object 'test article',
-- I try to search 'Java2' in French siteaccess, it also return the
-- object 'test article' in French version, although does NOT contain
-- the 'Java2' keywords. 
-- 

-- `ezsearch_search_phrase` stores user search statistical records
SELECT * FROM `ezsearch_search_phrase`;

-- `ezsearch_word stores` words index
SELECT * FROM `ezsearch_word` WHERE word='java2';

-- `ezsearch_return_count` stores every user search records, 
SELECT *, FROM_UNIXTIME(`time`, '%Y-%m-%d %H:%I:%S') as t 
FROM `ezsearch_return_count`
WHERE phrase_id=14
ORDER BY `time` DESC;

-- `ezsearch_object_word_link` stores relation of index words and object, attribute, etc.
SELECT * FROM ezsearch_object_word_link WHERE contentobject_id=1300;