
void insert_sort(int arr[], int len) {
	int p, j, t;
	for (p = 1; p < len; p++) {
		t = arr[p];
		for (j = p; j > 0 && t < arr[j-1]; j--) {
			arr[j] = arr[j-1];
		}
		arr[j] = t;
	}
}

