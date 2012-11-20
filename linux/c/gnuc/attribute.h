#ifndef JATTR
#define JATTR

#if defined(__GNUC__) && __GNUC__ >= 4 
#	define ALIGNED __attribute__ ((aligned)) 
#else
#	define ALIGNED
#endif

typedef struct ALIGNED {
	int id;
	char name[20];
} User;

typedef struct {
	int id;
	char name[20];
} User2;

#endif
