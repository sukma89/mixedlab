-- 添加分类
INSERT INTO `catalog_category_entity` (
`entity_id` ,
`entity_type_id` ,
`attribute_set_id` ,
`parent_id` ,
`created_at` ,
`updated_at` ,
`path` ,
`position` ,
`level` ,
`children_count` 
) VALUES (NULL , '3', '3', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1/2', '6', '2', '0');

INSERT INTO `catalog_category_entity_varchar` (
`value_id` ,
`entity_type_id` ,
`attribute_id` , -- 36-name
`store_id` ,
`entity_id` ,
`value`
) VALUES (NULL , '3', '36','0', '8', 'New Category');

INSERT INTO `catalog_category_entity_int` (
`value_id` ,
`entity_type_id` ,
`attribute_id` ,
`store_id` ,
`entity_id` ,
`value`
) VALUES (NULL , '3', '37','0', '8', '1') --is_active
,(NULL , '3', '45','0', '8', NULL) --landing_page
,(NULL , '3', '46','0', '8', '1') --is_anchor
,(NULL , '3', '54','0', '8', '1'); --custom_design_apply

-- 添加分类的自定义属性
INSERT INTO `eav_attribute` (
`attribute_id`, 
`entity_type_id`, 
`attribute_code`, 
`attribute_model`, 
`backend_model`, 
`backend_type`, 
`backend_table`, 
`frontend_model`, 
`frontend_input`, 
`frontend_label`, 
`frontend_class`, 
`source_model`, 
`is_required`, 
`is_user_defined`, 
`default_value`, 
`is_unique`, 
`note`) 
VALUES (NULL, 3, 'cnumber', NULL, '', 'varchar', NULL, NULL, 'text', '分类编号', NULL, NULL, 1, 0, NULL, 1, '对应分类ID');

INSERT INTO eav_entity_attribute
( entity_type_id, attribute_set_id, attribute_group_id, attribute_id, sort_order )
VALUES ( 3, 3, 3, 530, 61 );
