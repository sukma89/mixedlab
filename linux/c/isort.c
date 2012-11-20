/**
 * Insertion Sort
 */
#include <stdio.h>
#define arrlen(arr) (sizeof(arr) == 0 ? 0 : sizeof(arr) / sizeof((arr)[0]))

void shift_element (int arr[], int i) {
	int ivalue;
	for (ivalue=arr[i]; i && arr[i-1] > ivalue; i--) {
		arr[i] = arr[i-1];
	}	
	arr[i] = ivalue;
}

void isort (int arr[], int len) {
	int i;
	for (i=1; i < len; i++) {
		if (arr[i] < arr[i-1]) {
			shift_element(arr, i);
		}
	}
}

int main(int argc, char *argv[]) {

	int arr[10] = {99, 7, 19, 23, 55, 32, 20, 3, 1, 18};
	int i, len = arrlen(arr);

	for (i = 0; i < len; i++) { 
		printf("arr[%d] = %d\n", i, arr[i]);
	}

	printf("===============\n");
	isort(arr, len);

	for (i = 0; i < len; i++) { 
		printf("arr[%d] = %d\n", i, arr[i]);
	}

	return 0;
}
