/**
 * Lexicographic order permutation
 */
#include <stdio.h>

void _swap(int *left, int *right) {
	if (*left == *right) return;
	*left ^= *right;
	*right ^= *left;	
	*left ^= *right;
}

void implode(int *list, int len) {
	int i = 0;
	for (i = 0; i < len; i++) {
		printf("%d", list[i]);
	}
	printf("\n");
}

void rotate_left(int *list, const int start, const int len) {
	int i, t = list[start];
	for (i = start; i < len-1; i++) {
		list[i] = list[i+1];
	}
	list[len-1] = t;
}

void lexico_permutation(int *list, const int start, const int len) {
	int i, j;
	implode(list, len);
	if (start < len) {
		for (i = len-2; i >= start; i--) {
			for (j = i+1; j < len; j++) {
				_swap(list+i, list+j);
				lexico_permutation(list, i+1, len);			
			}
			rotate_left(list, i, len);
		}
	}
}

int main(void) {
	//int list[] = {1, 2, 3};
	int list[] = {1, 2, 3, 4};
	lexico_permutation(list, 0, 4);	
	return 0;
}

