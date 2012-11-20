/**
 * @see Data structure and algorithm analysis in C, 
 * by Mark Allen Weiss
 */
#include <stdio.h>
#include "algorithm.h"

int MaxSubSequenceSum(int *list, int len) {
	int i, j, max = 0, tmp;

	for (i = 0; i < len; i++) {
		tmp = 0;
		for (j = i; j < len; j++) {
			tmp += list[j];
			if (tmp > max) {
				max = tmp;
			}
		}	
	}
	
	return max;
}

int MaxSubSequenceSum2(int *list, int len) {
	int i, tmp = 0, max = 0;
	
	for (i = 0; i < len; i++) {
		tmp += list[i];
		if (tmp > max) {
			max = tmp;
		} else if (tmp < 0) {
			tmp = 0;
		}
	}

	return max;
}

int max(int a, int b, int c) {
	if (a > b && a > c) return a;
	if (b > a && b > c) return b;
	if (c > a && c > b) return c;
}

int MaxSubSum(int *list, int left, int right) {
	int center, tleft, tright, maxleft, maxright, maxleftb, maxrightb, i, tmp;

	if (left == right) {
		if (list[left] > 0) {
			return list[left];
		} else {
			return 0;
		}
	}

	center = (right + left) / 2;	
	maxleft = MaxSubSum(list, left, center);
	maxright = MaxSubSum(list, center+1, right);

	maxleftb = 0;
	maxrightb = 0;

	tmp = 0;
	for (i = center; i >= left; i--) {
		tmp += list[i];
		if (tmp > maxleftb) {
			maxleftb = tmp;
		}	
	}

	tmp = 0;
	for (i = center + 1; i < right; i++) {
		tmp += list[i];
		if (tmp > maxrightb) {
			maxrightb = tmp;
		}
	}

	return max(maxleft, maxright, maxleftb+maxrightb);
}

int MaxSubSequenceSum3(int *list, int len) {
	return MaxSubSum(list, 0, len - 1);
}

int main(void) {
	//int list[] = {-2, 11, -4, 13, -5, -2}; // 20
	int list[] = {13, -19, 77, -99, 29, -4, 113, -50, -2, 99, -101};

	_print_r(list, 11);
	printf("Max sub sequence sum 1: %d\n", MaxSubSequenceSum(list, 11));
	printf("Max sub sequence sum 2: %d\n", MaxSubSequenceSum2(list, 11));
	printf("Max sub sequence sum 3: %d\n", MaxSubSequenceSum3(list, 11));

	return 0;
}
