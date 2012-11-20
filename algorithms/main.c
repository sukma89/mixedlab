#include <stdio.h>
#include <stdlib.h>
#include "algorithm.h"

int main(int argc, char *args[]) 
{
	//int arr[10] = {10, 8, 7, 5, 4, 3, 1, -10, -20, -30};	
	//int arr[10] = {3, 19, 93, 39, 1, 55, -10, 4, 399, -101};	
	int *arr, input=1;	
	int len = argc - 1;
	int i, a, b;

	if (len < 3) {
		printf("You need to input at least 3 integers.\n");
		exit(0);
	}

	arr = malloc(len * sizeof(int));

	for (i = 0; i < len; i++) {
		arr[i] = atoi(args[i+1]);
	}

	_print_r(arr, len);

	max_product_2(arr, len, &a, &b);
	printf("%d * %d is the max product.\n", a, b);

	jqsort(arr, 0, len - 1);
	_print_r(arr, len);

	if (input == 1) {
		free(arr);
	}
	return 0;
}

