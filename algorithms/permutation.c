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

int permutation(int *list, int k, int len) {
	int i;
	static int n = 0;
	if (k == len) {
		implode(list, len);
		n++;
	} else {
		for (i = k; i < len; i++) {
			_swap(list+i, list+k);	
			permutation(list, k+1, len);
			_swap(list+i, list+k);	
		}			
	}
	return n;
}

int main(void) {
	int list[] = {1, 2, 3, 4, 5};
	printf("Total: %d\n", permutation(list, 0, 5));
	return 0;
}
