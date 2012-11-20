#include "list.h"

int main(void) {
	Node list, pos;
	int i;
	list = init_list();
	if (list == NULL) {
		perror("Failed to initialize list");
		exit(1);
	}

	list->e = 1;
	
	pos = list;
	for (i = 2; i <= 10; i++) {
		pos = insert(pos, i);
		if (pos == NULL) {
			break;
		}
	}
	print_r(list);

	//pos = find(list, 17);
	pos = find(list, 7);

	if (pos != NULL) {
		printf("Element is found.\n");
	} else {
		printf("Can NOT find the element.\n");
	}

	return 0;
}
