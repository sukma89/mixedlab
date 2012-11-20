#include "algorithm.h"

int max_product_2(int *arr, int len, int *a, int *b) {
	int negative[2] = {0, 0}, positive[2] = {0, 0}, i;

	for (i = 0; i < len; i++) {

		if (arr[i] > 0) {
			if (positive[0] < arr[i]) {
				_swap(positive, positive + 1);
				positive[0] = arr[i];
			} else if(positive[1] < arr[i]) {
				positive[1] = arr[i];
			}
		} else if (arr[i] < 0) {
			if (negative[0] > arr[i]) {
				_swap(negative, negative + 1);
				negative[0] = arr[i];
			} else if(negative[1] > arr[i]) {
				negative[1] = arr[i];
			}
		}
	}

	if (positive[0] * positive[1] > negative[0] * negative[1]) {
		*a = positive[0];
		*b = positive[1];
	} else {
		*a = negative[1];
		*b = negative[0];
	}
}
