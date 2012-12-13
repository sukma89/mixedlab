#include "algorithm.h"

void _print_r(int *arr, int len) {
    print_array(arr, len);
}

void print_array(const int arr[], int arr_len)
{
    int i;

    for (i = 0; i < arr_len; i++) {
        printf("%d\t", arr[i]);
    }
    
    printf("\n");
}

void _swap(int *left, int *right) {
	//prevent same pointers or same values swap
	if (*left == *right) return;
	*left ^= *right;
	*right ^= *left;	
	*left ^= *right;
}
