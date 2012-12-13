#include <stdio.h>

//void max_heapify(int arr[], int arr_len, int root);
//void build_max_heap(int arr[], int arr_len);

static void max_heapify(int arr[], int arr_len, int root)
{
    int left = 2 * root + 1, right = 2 * root + 2, largest, t;

    if (left < arr_len && arr[root] < arr[left]) {
        largest = left;
    } else {
        largest = root;
    }

    if (right < arr_len && arr[largest] < arr[right]) {
        largest = right;
    }

    if (largest != root) {
        t = arr[root];
        arr[root] = arr[largest];
        arr[largest] = t;
        max_heapify(arr, arr_len, largest);
    }
}

static void build_max_heap(int arr[], int arr_len)
{
    int i = (int) arr_len/2 - 1;
    
    while (i >= 0) {
        max_heapify(arr, arr_len, i--);
    }
}

void heapsort(int arr[], int arr_len)
{
    int i, t, len = arr_len;
    build_max_heap(arr, arr_len);
    for (i = arr_len - 1; i > 0; i--) {
        t = arr[i];
        arr[i] = arr[0];
        arr[0] = t;
        len--;
        max_heapify(arr, len, 0);
    }
}
