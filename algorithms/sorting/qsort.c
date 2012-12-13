#include "../algorithm.h"

static int _partition(int *arr, int left, int right, int pivot) {
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
        
        if (arr[left] > arr[right]) {
            if (arr[pivot] > arr[left]) {
                pivot = left;
            }
        } else {
            if (arr[pivot] > arr[right]) {
                pivot = right;
            }
        }

		newPivot = _partition(arr, left, right, pivot);
		jqsort(arr, left, newPivot-1);
		jqsort(arr, newPivot+1, right);
	}
}

