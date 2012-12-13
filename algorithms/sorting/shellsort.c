/**
 * gcc -Wall sorting/sort_main.c sorting/sorting.h sorting/shellsort.c  algorithm.h algorithm.c -lm
 */
#include <math.h>

void shellsort(int arr[], int arr_len)
{
    int i, k, t, x;
    int h;

    //for (i = arr_len / 2; i >= 1; i /= 2) {
    for (h = (int) log2(arr_len); h >= 1; h--) {
        i = (int) pow(2, h) - 1;
        for (k = i; k < arr_len; k++) {
            t = arr[k];
            for (x = k; x >= i; x -= i) {
                if (t < arr[x-i]) {
                    arr[x] = arr[x-i];
                } else {
                    break;
                }
            }
            arr[x] = t;
        }
    }
}
