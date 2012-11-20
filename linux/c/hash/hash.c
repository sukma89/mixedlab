/*
 * http://www.cse.yorku.ca/~oz/hash.html 
 * this algorithm (k=33) was first reported by 
 * dan bernstein many years ago in comp.lang.c. 
 * another version of this algorithm (now favored by bernstein) 
 * uses xor: hash(i) = hash(i - 1) * 33 ^ str[i]; 
 * the magic of number 33 (why it works better than 
 * many other constants, prime or not) has never been 
 * adequately explained.
 */
#include "hash.h"

//unsigned long hash_djb2(unsigned char *str) {
jhash_t hash_djb2(jhash_string *str) {
	//unsigned long hash = 5381;
	jhash_t hash = 5381;
	int c;

	while (c = *str++) {
		hash = ((hash << 5) + hash) + c;
	}
	
	return hash;
}


jhash_t hash_sdbm(jhash_string *str) {
	jhash_t hash = 0;
	int c;

	while (c = *str++) {
		hash = (hash << 6) + (hash << 16) - hash + c;
	}
	
	return hash;
}

jhash_t hash_lose(jhash_string *str) {
	jhash_t hash = 0;
	int c;

	while (c = *str++) {
		hash += c;
	}
	
	return hash;
}

