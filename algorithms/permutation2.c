/**
 * permutation with duplicate elements
 * @see http://phoebuslv.blog.163.com/blog/static/122266087201043093524772/ 
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

int permutation(int *list, int k, int len) {
	int i, r, flag = 0;
	static int n = 0;
	if (k == len) {
		implode(list, len);
		n++;
	} else {
		for (i = k; i < len; i++) {
			flag = 0;
			if (i != k) {
				for (r = k; r < i; r++) {
					if (list[r] == list[i]) {
						flag = 1;
						break;
					}	
				}
			}

			if (flag == 1) {
				continue;
			}

			_swap(list+i, list+k);	
			permutation(list, k+1, len);
			_swap(list+i, list+k);	
		}			
	}
	return n;
}

int main(void) {
	//int list[] = {1, 2, 3, 4, 5};
	//int list[] = {1, 2, 2, 4, 2}; //total = 5!/3!=20
	int list[] = {1, 2, 2, 3, 4}; //total = 5!/2! = 60
	//int list[] = {1, 2, 2, 2, 2};
	//int list[] = {2, 2, 2, 2, 2};
	printf("Total: %d\n", permutation(list, 0, 5));
	
	//int list[] = {1, 2, 2, 3, 4, 5};
	//printf("Total: %d\n", permutation(list, 0, 6));
	return 0;
}

