#include "list.h"

void print_r(Node list) {
	if (list == NULL) {
		perror("NULL list");
	} else {
		printf("%d", list->e);
		while ((list = list->next) != NULL) {
			printf(", %d", list->e);
		}
		printf("\n");
	}
}

Node init_list() {
	Node head;
	head = malloc(sizeof(struct node));	
	if (head == NULL) {
		perror("Failed to allocate memory.");
	} else {
		head->next = NULL;
	}
	return head;
}

Node insert(Node pos, int element) {
	Node n;
	n = malloc(sizeof(struct node));
	if (n == NULL) {
		perror("Failed to allocate memory for new element.");
	} else {
		n->e = element;
		n->next = pos->next;	
		pos->next = n;
	}
	return n;
}

Node find(Node list, int element) {
	Node pos = NULL;

	while (list != NULL) {
		if (list->e == element) {
			pos = list;
			break;
		}
		list = list->next;
	}

	return pos;
}

