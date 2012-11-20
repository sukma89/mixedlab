<?php
function _is_right_ctype($type) {
	//TODO just for testing.
	return true;
}

/**
 * Implementation of hook_nodeapi().
 */
function MODULE_NAME_nodeapi(&$node, $op, $teaser, $page) {

	if (_is_right_ctype($node->type)) {
		switch ($op) {
			case 'insert':
				$savenode = false;
				
				if (!isset($node->created) || $node->created < 1) {
					$node->created = time();
					$savenode = true;
				}
				
				if (!isset($node->field_publish_date[0]['value'])
					|| strlen($node->field_publish_date[0]['value']) < 1) {
					$node->field_publish_date[0]['value'] = 
								date('Y-m-d', $node->created) . 
								'T' . date('H:i:s', $node->created);
					$savenode = true;
				}
				
				if (!isset($node->status)) {
					$node->status = 1;
					$savenode = true;
				}
				
				if (is_array($node->field_flexi_field) 
					&& count($node->field_flexi_field) > 0) {
					$inode = new stdClass();
					$inode->type = 'newctype';
					$inode->status = 1;
					$inode->uid = $node->uid;
					$inode->language = $node->language;
					$inode->title = $node->title;
					$inode->body = $node->title;
					$inode->comment = $node->comment;
					
					$inode->field_publish_date = $node->field_publish_date;
					$inode->field_discussion = array(
							array('nid' => $node->nid)
					);
					
					if (isset($node->taxonomy['tags'])) {
						$inode->taxonomy = array(
							'tags' => $node->taxonomy['tags'],
						);
					}
					
					foreach ($node->field_flexi_field as $fd) {
						$_inode = clone $inode;

						if (isset($fd['value']['field_image_file'])) {
							$_inode->field_image_file = $fd['value']['field_image_file'];
							if (isset($fd['value']['field_image_description'])) {
								$_inode->field_image_description = $fd['value']['field_image_description'];
							}
							$savenode = true;
							node_save($_inode);
							if ($_inode->nid > 0) {
								watchdog('debug', '[' . $_inode->nid . ']'.
									'Node created: <a href="' . 
									url('node/' . $_inode->nid) . '">' . 
									$_inode->title . '</a>');
							} else {
								watchdog('error', '[' . $_inode->nid . ']' .
									'Failed to create node: <a href="' . 
									url('node/' . $node->nid) . '">' . 
									$node->title . '</a>.');
							}
							unset($_inode);
						}
					}
					
					unset($node->field_flexi_field);
				}
				
				if ($savenode === true) {
					node_save($node);
				}
				break;
		}
	}
}

