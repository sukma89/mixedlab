#include <stdio.h>
#include <stdlib.h>
#include "hash.h"

int main(int argc, char *argv[]) {
	//unsigned long hash;
	jhash_t hash;
	char *str;
	if (argc < 2) {
		printf("No string input\n");
		exit(0);
	}

	str = argv[1];
	printf("Input: %s\n", str);
	hash = hash_djb2(str);
	printf("djb2 Hash: %lu\n", hash);
	hash = hash_sdbm(str);
	printf("sdbm Hash: %lu\n", hash);
	hash = hash_lose(str);
	printf("lose Hash: %lu\n", hash);
	return 0;
}

