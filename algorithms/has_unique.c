#include <stdio.h>
#include "algorithm.h"
#define TRUE 1
#define FALSE 0

int has_unique(int *list, int len) {
	int i;
	jqsort(list, 0, len-1);	
	_print_r(list, len);
	len = len - 1;

	if (list[0] != list[1] || list[len-1] != list[len]) {
		return TRUE;
	}

	i = 1;
	while (i < len) {
		if (list[i] != list[i-1] && list[i] != list[i+1]) {
			return TRUE;
		}
		i++;
	}
	return FALSE;
}

int main(void) {
	//int list[] = {1, 9, 19, 9, 19, 16, 15, 9, 19, 8, 7, 7, 8, 16, 15};	
	//int len = 15;
	
	//int list[] = {9, 19, 9, 19, 16, 15, 9, 19, 8, 7, 7, 8, 16, 99, 15};	
	//int len = 15;
	
	//int list[] = {9, 19, 9, 19, 16, 15, 9, 19, 8, 7, 7, 8, 16, 99, 15, 99};	
	//int len = 16;
	
	int list[] = {7, 7, 8, 9, 9, 10, 10};
	int len = 7;

	//int list[] = {1, 9, 19, 39, 9, 19, 11, 16, 15, 1, 9, 19, 8, 7, 7, 1, 8, 16, 15};	
	//int len = 19;
	//int list[] = {1, 9, 19, 39, 9, 19, 11, 16, 15, 1, 9, 19, 8, 7, 7, 1, 8, 16, 15, 11, 39};	
	//int len = 21;
	_print_r(list, len);
	if (has_unique(list, len)) {
		printf("Has unique element.\n");
	} else {
		printf("Has NO unique element.\n");
	}
	return 0;
}
