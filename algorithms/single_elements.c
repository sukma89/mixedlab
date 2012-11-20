#include <stdio.h>
#include <stdlib.h>

void _print_r(int *arr, int len) {
	int i;
	for (i = 0; i < len; i++) {
		printf("%-5d ", arr[i]);
	}
	printf("\n");
}

int findOdd(int *input, int len) {
	int i, j, z, *buff, blen = (int) (len / 2 + 1);

	buff = (int *) malloc(sizeof(int) * blen);
	
	for (i = 0; i < len; i++) {
		z = -1;
		for(j = 0; j < blen; j++) {
			if (buff[j] == 0) {
				if (z == -1) {
					z = j;
				}
				continue;
			}
			if (buff[j] == input[i]) {
				buff[j] = 0;
				z = -1;
				break;
			}
		}
				
		if (z >= 0) {
			buff[z] = input[i];
		}

	}

	j = 0;
	
	for (i = 0; i < blen; i++) {
		if (buff[i] != 0) {
			j = buff[i];
			break;
		}
	}

	free(buff);
	return j;
}

int compare (const void * a, const void * b) {
	return ( *(int*)a - *(int*)b );
}

int findOdd2(int *input, int len) {
	int i = 0;
	
	qsort(input, len, sizeof(int), compare);	

	while (i < len) {
		if (input[i] != input[i+1]) {
			break;
		}
		i = i + 2;
	}
	return input[i];
}

int main(void) {
	int arr[] = {1, 2, 3, 4, 3, 2, 4, 1, 5};
	int len = 9;
	//int arr[] = {1, 2, 3, 4, 3, 2, 4, 1, 5, 6, 7, 10, 6, 15, 7, 5, 11, 13, 13, 11, 15};
	//int len = 21;
	_print_r(arr, len);
	//printf("Single One = %d\n", findOdd(arr, len));
	printf("Single One = %d\n", findOdd2(arr, len));
	return 0;
}

