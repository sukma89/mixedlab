#ifndef _LIST
#include <stdio.h>
#include <stdlib.h>
#define _LIST 1

struct node {
	int e;
	struct node *next;
};

typedef struct node *Node;

void print_r(Node list);
Node init_list(); 
Node insert(Node pos, int element); 
Node find(Node list, int element);

#endif
