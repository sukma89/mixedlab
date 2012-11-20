#include <stdio.h>

void _print_r(int *arr, int len) {
	int i;
	for (i = 0; i < len; i++) {
		printf("%-5d ", arr[i]);
	}
	printf("\n");
}

void _swap(int *left, int *right) {
	//prevent same pointers or same values swap
	if (*left == *right) return;
	*left ^= *right;
	*right ^= *left;	
	*left ^= *right;
}
