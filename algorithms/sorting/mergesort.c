#include <stdlib.h>
#include <stdio.h>

static void _merge(int *arr, int *tmparr, int left, int center, int right)
{
    int i, l, r = center + 1;
    i = l = left;
    
    while (l <= center && r <= right) {
        if (arr[l] < arr[r]) {
            tmparr[i++] = arr[l++];
        } else {
            tmparr[i++] = arr[r++];
        }
    }

    while (l <= center) {
        tmparr[i++] = arr[l++];
    }

    while (r <= right) {
        tmparr[i++] = arr[r++];
    }

    for (i = left; i <= right; i++) {
        arr[i] = tmparr[i];
    }
}

static void _mergesort(int *arr, int *tmparr, int left, int right)
{
    int center;
    if (left < right) {
        center = (left + right) / 2;
        _mergesort(arr, tmparr, left, center);
        _mergesort(arr, tmparr, center + 1, right);
        _merge(arr, tmparr, left, center, right);
    }
}

void mergesort(int arr[], int len)
{
    int *tmparr;

    tmparr = malloc(sizeof(int) * len);

    if (tmparr == NULL) {
        printf("Failed to allocate memmory for temporary array.");
        exit(1);
    }

    _mergesort(arr, tmparr, 0, len - 1);
}
