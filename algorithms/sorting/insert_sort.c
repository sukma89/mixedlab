#include <stdio.h>
#include "algorithm.h"

#define LEN 10

void insert_sort(int *list, int len) {
	int p, j, t;
	for (p = 1; p < len; p++) {
		t = list[p];
		for (j = p; j > 0 && t < list[j-1]; j--) {
			list[j] = list[j-1];
		}
		list[j] = t;
	}
}

int main(void) {
	int list[] = {34, 3, 93, 15, 9, 77, -1, 133, -39, 17};
	_print_r(list, LEN);
	insert_sort(list, LEN);
	_print_r(list, LEN);	
	return 0;
}
