#ifndef J_HASH
#define J_HASH 1

typedef unsigned long jhash_t;
typedef unsigned char jhash_string;

jhash_t hash_djb2(jhash_string *str);
jhash_t hash_sdbm(jhash_string *str);
jhash_t hash_lose(jhash_string *str);

#endif
