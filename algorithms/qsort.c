#include <stdio.h>
#include "algorithm.h"

int _partition(int *arr, int left, int right, int pivot) {
	int storedIndex = left;
	int pivotValue = arr[pivot];
	int i;

	_swap(arr+right, arr+pivot);

	for (i = left; i < right; i++) {
		if (arr[i] < pivotValue) {
			_swap(arr+i, arr+storedIndex);
			++storedIndex;
		}
	}

	_swap(arr+storedIndex, arr+right);
	return storedIndex;
}

void jqsort(int *arr, int left, int right) {
	int pivot, newPivot;
	if (left < right) {
		pivot = left + ((int) (right-left) / 2);	
		newPivot = _partition(arr, left, right, pivot);
		jqsort(arr, left, newPivot-1);
		jqsort(arr, newPivot+1, right);
	}
}

/*
int main(void) {
	int arr[] = {19, 3, 77, 5, 39, 45, 11, -1, 7, 395, -38, 133, 32};
	_print_r(arr, 13);
	jqsort(arr, 0, 12);
	_print_r(arr, 13);
}
*/
